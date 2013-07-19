<?php
class StringController extends Controller
{

    /**
     * 字符串解析
     */
    public function actionParse ()
    {
        $req = Yii::app()->request;
        $text = $req->getParam('text');
        $ary_param = explode(',', $text);
        var_export($ary_param);
    }

    /**
     * 字符串编码检测
     */
    public function actionDetect ()
    {
        $req = Yii::app()->request;
        $text = $req->getParam('text');
        $ary_param = mb_detect_encoding($text);
        var_dump($ary_param);
    }

    /**
     * 字符串空格解析
     */
    public function actionSpace ()
    {
        $req = Yii::app()->request;
        $text = $req->getParam('text');
        $pre_text = $req->getParam('pre_text');
        $ary_param = explode(' ', $text);
        foreach ($ary_param as $k => $v) {
            if (! $v) {
                unset($ary_param[$k]);
            } else {
                $ary_param[$k] = $pre_text . $v;
            }
        }
        echo implode("<br />", $ary_param);
    }
} 