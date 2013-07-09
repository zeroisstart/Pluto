<?php
class StringController extends Controller
{

    public function actionParse ()
    {
        $req = Yii::app()->request;
        $text = $req->getParam('text');
        $ary_param = explode(',', $text);
        var_export($ary_param);
    }
}