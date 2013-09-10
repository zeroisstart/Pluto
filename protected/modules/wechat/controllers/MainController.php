<?php
define("TOKEN", "weixin");
class MainController extends Controller
{

    public $FromUserName;
    public $ToUserName;
    
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
echo <<<EOT
 <xml>
 <ToUserName><![CDATA[$toUsername]]></ToUserName>
 <FromUserName><![CDATA[$fromUsername]]></FromUserName>
 <CreateTime>1378788754</CreateTime>
 <MsgType><![CDATA[news]]></MsgType>
 <ArticleCount>2</ArticleCount>
 <Articles>
 <item>
 <Title><![CDATA[title1]]></Title> 
 <Description><![CDATA[description1]]></Description>
 <PicUrl><![CDATA[http://www.google.me/images/srpr/logo4w.png]]></PicUrl>
 <Url><![CDATA[http://www.baidu.com]]></Url>
 </item>
 <item>
 <Title><![CDATA[title]]></Title>
 <Description><![CDATA[description]]></Description>
 <PicUrl><![CDATA[http://www.google.me/images/srpr/logo4w.png]]></PicUrl>
 <Url><![CDATA[http://www.baidu.com]]></Url>
 </item>
 </Articles>
 </xml> 
EOT;
Yii::app() -> end();
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
                $WechatRecordPresend = WechatRecordPresend::model();
                
                
                $txt = $WechatRecordPresend->getTxt();
                $txt = str_replace('{fromuser}', $fromUsername, $txt);
                
                if ($txt) {
                    $contentStr = $txt;
                } else {
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
        $resultStr = sprintf($textTpl, $object->FromUserName, $object->ToUserName, time(), $content, $flag);
        return $resultStr;
    }

    /**
     * 根据数组参数回复图文消息
     *
     * @param $newsData array           
     * @access public
     * @return void
     */
    public function makeNews ($newsData = array())
    {
        $createTime = time();
        $funcFlag = 0;//$this->setFlag ? 1 : 0;
        $newTplHeader = "<xml>
        <ToUserName><![CDATA[{$this->FromUserName}]]></ToUserName>
        <FromUserName><![CDATA[{$this->ToUserName}]]></FromUserName>
        <CreateTime>{$createTime}</CreateTime>
        <MsgType><![CDATA[news]]></MsgType>
        <ArticleCount>%s</ArticleCount><Articles>";
        $newTplItem = "<item>
        <Title><![CDATA[%s]]></Title>
        <Description><![CDATA[%s]]></Description>
        <PicUrl><![CDATA[%s]]></PicUrl>
        <Url><![CDATA[%s]]></Url>
        </item>";
        $newTplFoot = "</Articles>
        <FuncFlag>%s</FuncFlag>
        </xml>";
        $content = '';
        $itemsCount = count($newsData['items']);
        /*
        array(
            array('title','description','picurl','url')
        )*/
        
        // 微信公众平台图文回复的消息一次最多10条
        $itemsCount = $itemsCount < 10 ? $itemsCount : 10;
        if ($itemsCount) {
            foreach ($newsData['items'] as $key => $item) {
                if ($key <= 9) {
                    $content .= sprintf($newTplItem, $item['title'], $item['description'], $item['picurl'], $item['url']);
                }
            }
        }
        $header = sprintf($newTplHeader, $itemsCount);
        $footer = sprintf($newTplFoot, $funcFlag);
        return $header . $content . $footer;
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