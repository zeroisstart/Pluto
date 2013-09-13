<?php
define("TOKEN", "weixin");
class MainController extends Controller
{

    public $FromUserName;

    public $ToUserName;

    public function actionMain ()
    {
        // this -> run('test');
        #var_dump(Yii::app() -> wxResponse);
        #die; 
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
            $postObj = simplexml_load_string($postStr, 'SimpleXMLElement', 
                    LIBXML_NOCDATA);
            // log logic start
            $WechatRequestLog = new WechatRequestLog();
            $WechatRequestLog->dateline = date('Y-m-d H:i:s', time());
            $WechatRequestLog->txt = htmlspecialchars($postStr);
            $WechatRequestLog->save();
            // end log logic
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
        // 新闻关键字回复
        
        /*
 入会服务:rhfw:click
我的会员卡:wdhyk:click
社区活动:sjhd:click
联盟商家:lmsj:click
投诉受理:tssl:click
物业公告:wygg:click
在线缴费:zxjf:click
预约维修:yywx:click
连线物业:lxwy:click
生活导航:shdh:click
关注保亿:gzby:click
预约看房:yykf:click
联系我们:lxwm:click
了解保亿:ljby:click
         */
        $news_keywords = array(
            'rhfw', 
            'wdhyk', 
            'sjhd', 
            'lmsj', 
            'tssl', 
            'wygg', 
            'zxjf', 
            'yywx', 
            'lxwy', 
            'shdh', 
            'gzby',
            'yykf',
            'lxwm',
            'ljby'
        );
        if (in_array($keyword, $news_keywords)) {
            $this -> outOutNews();
        } else {
            if (! empty($keyword)) {
                $WechatAutoReply = WechatAutoReply::model();
                $txt = $WechatAutoReply->findReplyByKeyword($keyword);
                if ($txt) {
                    $contentStr = $txt;
                } else {
                    $WechatRecordPresend = WechatRecordPresend::model();
                    $txt = $WechatRecordPresend->getTxt();
                    if ($txt) {
                        $contentStr = $txt;
                    } else {
                        $contentStr = "Welcome to wechat world!" . $keyword;
                    }
                }
                $contentStr = str_replace('{fromuser}', $fromUsername, 
                        $contentStr);
                $msgType = "text";
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
                echo $resultStr;
            } else {
                echo "Input something...";
            }
        }
    }
    
    public function outOutNews(){
        $post = $GLOBALS["HTTP_RAW_POST_DATA"];
        $xml = simplexml_load_string($post, 'SimpleXMLElement', LIBXML_NOCDATA);
        $content = trim($xml->EventKey); // 获取消息内容 $type =
        strtolower($xml->MsgType);
        $openid = $xml->FromUserName;
        $content = strtolower($content);
        
        // log logic start
        $WechatRequestLog = new WechatRequestLog();
        $WechatRequestLog->dateline = date('Y-m-d H:i:s', time());
        $WechatRequestLog->txt = htmlspecialchars($post);
        $WechatRequestLog->save();
        // end log logic
        
        switch ($content){
            case 'rhfw':
                $data = array(
                        array(
                                'title' => '入会服务',
                                'note' => '您的满意，是我们一直的追求！',
                                'cover' => 'http://pluto.zeroisstart.com/images/please_wait.png',
                                'link' => $this -> createAbsoluteUrl('/wechat/static/hyzc',array('fromuser'=>$openid))
                        ),
                        array(
                                'title' => 'A 入会章程',
                                'note' => 'A 入会章程',
                                'cover' => 'http://pluto.zeroisstart.com/images/join.jpg',
                                'link' => $this -> createAbsoluteUrl('/wechat/static/hyzc',array('fromuser'=>$openid))
                        ),
                        array(
                                'title' => 'B 会员申请',
                                'note' => 'B 会员申请',
                                'cover' => 'http://pluto.zeroisstart.com/images/wechat/membership.png',
                                'link' =>  $this->createUrl('/boee/member/apply',array('fromuser'=>$openid)),
                        ),
                );
               break;
            default:
                $data = array(
                        array(
                                'title' => '敬请期待',
                                'note' => '我们还在努力开发中敬请期待',
                                'cover' => 'http://pluto.zeroisstart.com/images/please_wait.png',
                                'link' => $this -> createAbsoluteUrl('/wechat/static/hyzc')
                        ),
                );
                break;
        }
        echo Yii::app() -> wxResponse->response($xml, $data, 'news');
        Yii::app() -> end();
    }

    public function handleEvent ($object)
    {
        $contentStr = "";
        switch (strtolower($object->Event)) {
            case "subscribe":
                $fromUsername = $object->FromUserName;
                $toUsername = $object->ToUserName;
                $WechatRecordPresend = WechatRecordPresend::model();
                $txt = $WechatRecordPresend->getTxt();
                $txt = str_replace('{fromuser}', $fromUsername, $txt);
                if ($txt) {
                    $contentStr = $txt;
                } else {
                    $contentStr = "谢谢关注!";
                }
                break;
            case "click":
                $this -> outOutNews();
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