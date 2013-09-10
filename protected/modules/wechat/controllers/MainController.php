<?php
define("TOKEN", "weixin");
class MainController extends Controller
{

    public function actionMain ()
    {
        // this -> run('test');
        $this->responseMsg();
    }

    /**
     * 测试的操作
     */
    public function actionTest ()
    {
        if (isset($_GET["echostr"])) {
            $echoStr = $_GET["echostr"];
            // valid signature , option
            if ($this->_checkSignature()) {
                echo $echoStr;
                exit();
            }
        }
    }

    public function responseMsg ()
    {
        // get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        // extract post data
        if (! empty($postStr)) {
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            
            //log logic start
            $WechatRequestLog = new WechatRequestLog();
            $WechatRequestLog -> dateline = date('Y-m-d H:i:s',time());
            $WechatRequestLog -> txt =htmlspecialchars($postStr);
            $WechatRequestLog -> save();
            //end log logic
            
            $RX_TYPE = trim($postObj->MsgType);
            switch ($RX_TYPE) {
                case "text":
                    $resultStr = $this->handleText($postObj);
                    break;
                case "event":
                    $resultStr = $this->handleEvent($postObj);
                    break;
                default:
                    $resultStr = "Unknow msg type: " . $RX_TYPE;
                    break;
            }
            echo $resultStr;
        } else {
            echo "";
            exit();
        }
    }

    public function handleText ($postObj)
    {
        $fromUsername = $postObj->FromUserName;
        $toUsername = $postObj->ToUserName;
        $keyword = trim($postObj->Content);
        $time = time();
        $textTpl = "<xml>
        <ToUserName><![CDATA[%s]]></ToUserName>
        <FromUserName><![CDATA[%s]]></FromUserName>
        <CreateTime>%s</CreateTime>
        <MsgType><![CDATA[%s]]></MsgType>
        <Content><![CDATA[%s]]></Content>
        <FuncFlag>0</FuncFlag>
        </xml>";
        if (! empty($keyword)) {
            $WechatAutoReply =WechatAutoReply::model();
            $txt = $WechatAutoReply ->findReplyByKeyword($keyword);
            if($txt){
                $contentStr = $txt;
            } else{
                $WechatRecordPresend =  WechatRecordPresend::model();
                $txt = $WechatRecordPresend -> getTxt();
                if($txt){
                    $contentStr = $txt;
                }else{
                    $contentStr = "Welcome to wechat world!".$keyword;
                }
            }
            $contentStr = str_replace('{fromuser}', $fromUsername, $contentStr);
            $msgType = "text";
            $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
            echo $resultStr;
        } else {
            echo "Input something...";
        }
    }

    public function handleEvent ($object)
    {
        $contentStr = "";
        switch ($object->Event) {
            case "subscribe":
                
                $fromUsername = $object->FromUserName;
                $toUsername = $object->ToUserName;
                
                $WechatRecordPresend =  WechatRecordPresend::model();
                $txt = $WechatRecordPresend -> getTxt();
                $txt = str_replace('{fromuser}', $fromUsername, $txt);
                
                if($txt){
                    $contentStr = $txt;
                }else{
                    $contentStr = "谢谢关注!";
                }
                break;
            default:
                $contentStr = "Unknow Event: " . $object->Event;
                break;
        }
        $resultStr = $this->responseText($object, $contentStr);
        return $resultStr;
    }

    public function responseText ($object, $content, $flag = 0)
    {
        $textTpl = "<xml>
        <ToUserName><![CDATA[%s]]></ToUserName>
        <FromUserName><![CDATA[%s]]></FromUserName>
        <CreateTime>%s</CreateTime>
        <MsgType><![CDATA[text]]></MsgType>
        <Content><![CDATA[%s]]></Content>
        <FuncFlag>%d</FuncFlag>
        </xml>";
        $resultStr = sprintf($textTpl, $object->FromUserName, 
                $object->ToUserName, time(), $content, $flag);
        return $resultStr;
    }

    /**
     * 返回微信数据结构
     */
    public function _responseMsg ()
    {
        // get post data, May be due to the different environments
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        // extract post data
        if (! empty($postStr)) {
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', 
                    LIBXML_NOCDATA);
            $fromUsername = $postObj->FromUserName;
            $toUsername = $postObj->ToUserName;
            $keyword = trim($postObj->Content);
            $time = time();
            $textTpl = "<xml>
                <ToUserName><![CDATA[%s]]></ToUserName>
                <FromUserName><![CDATA[%s]]></FromUserName>
                <CreateTime>%s</CreateTime>
                <MsgType><![CDATA[%s]]></MsgType>
                <Content><![CDATA[%s]]></Content>
                <FuncFlag>0</FuncFlag>
                </xml>";
            if (! empty($keyword)) {
                $msgType = "text";
                $contentStr = "Welcome to wechat world!";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, 
                        $time, $msgType, $contentStr);
                echo $resultStr;
            } else {
                echo "Input something...";
            }
        } else {
            echo "";
            exit();
        }
    }

    /**
     * 验证签名
     *
     * @return boolean
     */
    private function _checkSignature ()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token = TOKEN;
        $tmpArr = array(
            $token, 
            $timestamp, 
            $nonce
        );
        sort($tmpArr);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);
        if ($tmpStr == $signature) {
            return true;
        } else {
            return false;
        }
    }
}