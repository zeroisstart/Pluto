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
        // 新闻关键字回复
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
            'gzby'
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
                $resultStr = sprintf($textTpl, $fromUsername, $toUsername, 
                        $time, $msgType, $contentStr);
                echo $resultStr;
            } else {
                echo "Input something...";
            }
        }
    }
    
    public function outOutNews(){
        $post = $GLOBALS["HTTP_RAW_POST_DATA"];
        $xml = simplexml_load_string($post, 'SimpleXMLElement', LIBXML_NOCDATA);
        $content = trim($xml->Content); // 获取消息内容 $type =
        strtolower($xml->MsgType);
        $openid = $xml->FromUserName;
        $data = array(
                array(
                        'title' => '标题',
                        'note' => '描述',
                        'cover' => 'http://www.google.me/images/srpr/logo4w.png',
                        'link' => 'http://www.baidu.com'
                ),
                array(
                        'title' => '标题',
                        'note' => '描述',
                        'cover' => 'http://www.google.me/images/srpr/logo4w.png',
                        'link' => 'http://www.baidu.com'
                ),
                array(
                        'title' => '标题',
                        'note' => '描述',
                        'cover' => 'http://www.google.me/images/srpr/logo4w.png',
                        'link' => 'http://www.baidu.com'
                ),
                array(
                        'title' => '更多信息',
                        'note' => '描述',
                        'cover' => 'http://www.google.me/images/srpr/logo4w.png',
                        'link' => 'http://www.baidu.com'
                )
        );
        exit(W::response($xml, $data, 'news'));
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
        $resultStr = sprintf($textTpl, $object->FromUserName, 
                $object->ToUserName, time(), $content, $flag);
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
        $funcFlag = 0; // $this->setFlag ? 1 : 0;
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
         * array( array('title','description','picurl','url') )
         */
        // 微信公众平台图文回复的消息一次最多10条
        $itemsCount = $itemsCount < 10 ? $itemsCount : 10;
        if ($itemsCount) {
            foreach ($newsData['items'] as $key => $item) {
                if ($key <= 9) {
                    $content .= sprintf($newTplItem, $item['title'], 
                            $item['description'], $item['picurl'], $item['url']);
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
class w
{

    static function valid ($token)
    {
        $echoStr = $_GET["echostr"];
        if (self::signature($token)) {
            exit($echoStr);
        }
        return false;
    }

    static function signature ($token)
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
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

    /**
     * 响应请求
     */
    static function response ($xml, $data, $type = 'text')
    {
        $time = time();
        $xmltpl['text'] = '<xml><ToUserName><![CDATA[%s]]></ToUserName><FromUserName><![CDATA[%s]]></FromUserName>';
        $xmltpl['text'] .= '<CreateTime>%s</CreateTime><MsgType><![CDATA[text]]></MsgType><Content><![CDATA[%s]]></Content><FuncFlag>0</FuncFlag></xml>';
        $xmltpl['item'] = '<item><Title><![CDATA[%s]]></Title><Description><![CDATA[%s]]></Description><PicUrl><![CDATA[%s]]></PicUrl><Url><![CDATA[%s]]></Url></item>';
        $xmltpl['news'] = '<xml><ToUserName><![CDATA[%s]]></ToUserName><FromUserName><![CDATA[%s]]></FromUserName><CreateTime>%s</CreateTime><MsgType><![CDATA[news]]></MsgType>';
        $xmltpl['news'] .= '<ArticleCount>%s</ArticleCount><Articles>%s</Articles><FuncFlag>1</FuncFlag></xml>';
        if ($type == 'text') {
            return sprintf($xmltpl['text'], $xml->FromUserName, 
                    $xml->ToUserName, $time, $data);
        } elseif ($type == 'news') {
            if (is_array($data)) {
                $items = '';
                if (count($data) > 1) {
                    foreach ($data as $e) {
                        $title = trim($e['title'] . "\n" . $e['note'], "\n");
                        $items .= sprintf($xmltpl['item'], $title, '', 
                                $e['cover'], $e['link']);
                    }
                } elseif (count($data) == 1) {
                    foreach ($data as $e) {
                        $items = sprintf($xmltpl['item'], $e['title'], 
                                $e['note'], $e['cover'], $e['link']);
                    }
                } else {
                    return self::response($xml, '没有数据');
                }
                return sprintf($xmltpl['news'], $xml->FromUserName, 
                        $xml->ToUserName, $time, count($data), $items);
            }
            return self::response($xml, '没有数据');
        }
        return self::response($xml, '类型不正确');
    }

    /**
     * 已知两点的经纬度，计算两点间的距离(公里)
     */
    static function getDistance ($lat1, $lng1, $lat2, $lng2)
    {
        $lat1 = (double) $lat1;
        $lat2 = (double) $lat2;
        $lng1 = (double) $lng1;
        $lng2 = (double) $lng2;
        $EARTH_RADIUS = 6378.137;
        $radLat1 = $lat1 * pi() / 180.0;
        $radLat2 = $lat2 * pi() / 180.0;
        $a = $radLat1 - $radLat2;
        $b = $lng1 * pi() / 180.0 - $lng2 * pi() / 180.0;
        $s = 2 * asin(
                sqrt(
                        pow(sin($a / 2), 2) + cos($radLat1) * cos($radLat2) * pow(
                                sin($b / 2), 2)));
        $s = $s * $EARTH_RADIUS;
        $s = round($s * 10000) / 10000;
        return number_format($s, 2, '.', '');
    }

    static function requestMethod ()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    static function isGET ()
    {
        return self::requestMethod() == 'GET';
    }

    static function isPOST ()
    {
        return self::requestMethod() == 'POST';
    }

    /**
     * POST 请求指定URL
     */
    static function fpost ($url, $post = '', $limit = 0, $cookie = '', $ip = '', 
            $timeout = 15, $block = TRUE)
    {
        $return = '';
        $matches = parse_url($url);
        ! isset($matches['host']) && $matches['host'] = '';
        ! isset($matches['path']) && $matches['path'] = '';
        ! isset($matches['query']) && $matches['query'] = '';
        ! isset($matches['port']) && $matches['port'] = '';
        $host = $matches['host'];
        $path = $matches['path'] ? $matches['path'] .
                 ($matches['query'] ? '?' . $matches['query'] : '') : '/';
                $port = ! empty($matches['port']) ? $matches['port'] : 80;
                if ($post) {
                    $out = "POST $path HTTP/1.0\r\n";
                    $out .= "Accept: */*\r\n";
                    $out .= "Accept-Language: zh-cn\r\n";
                    $out .= "Content-Type: application/x-www-form-urlencoded\r\n";
                    $out .= "User-Agent: $_SERVER[HTTP_USER_AGENT]\r\n";
                    $out .= "Host: $host\r\n";
                    $out .= 'Content-Length: ' . strlen($post) . "\r\n";
                    $out .= "Connection: Close\r\n";
                    $out .= "Cache-Control: no-cache\r\n";
                    $out .= "Cookie: $cookie\r\n\r\n";
                    $out .= $post;
                } else {
                    $out = "GET $path HTTP/1.0\r\n";
                    $out .= "Accept: */*\r\n";
                    $out .= "Accept-Language: zh-cn\r\n";
                    $out .= "User-Agent: $_SERVER[HTTP_USER_AGENT]\r\n";
                    $out .= "Host: $host\r\n";
                    $out .= "Connection: Close\r\n";
                    $out .= "Cookie: $cookie\r\n\r\n";
                }
                if (function_exists('fsockopen')) {
                    $fp = @fsockopen(($ip ? $ip : $host), $port, $errno, 
                            $errstr, $timeout);
                } elseif (function_exists('pfsockopen')) {
                    $fp = @pfsockopen(($ip ? $ip : $host), $port, $errno, 
                            $errstr, $timeout);
                } else {
                    $fp = false;
                }
                if (! $fp) {
                    return '';
                } else {
                    stream_set_blocking($fp, $block);
                    stream_set_timeout($fp, $timeout);
                    @fwrite($fp, $out);
                    $status = stream_get_meta_data($fp);
                    if (! $status['timed_out']) {
                        while (! feof($fp)) {
                            if (($header = @fgets($fp)) &&
                                     ($header == "\r\n" || $header == "\n")) {
                                        break;
                                    }
                                }
                                $stop = false;
                                while (! feof($fp) && ! $stop) {
                                    $data = fread($fp, 
                                            ($limit == 0 || $limit > 8192 ? 8192 : $limit));
                                    $return .= $data;
                                    if ($limit) {
                                        $limit -= strlen($data);
                                        $stop = $limit <= 0;
                                    }
                                }
                            }
                            @fclose($fp);
                            return $return;
                        }
                    }
                }