<?php
/**
 * 生成MD5 序列值
 * @author Top
 *
 */
class Md5Controller extends Controller
{

    public function actionGenerate ()
    {
        $req = Yii::app()->request;
        $text = $req->getParam('text');
        echo md5(trim($text));
    }

}