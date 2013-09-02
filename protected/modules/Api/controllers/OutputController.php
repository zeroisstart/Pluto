<?php
class OutputController extends Controller
{

    public function actionOutput ()
    {
        $this->render('output');
    }

    public function actionString ()
    {
        $req = Yii::app()->request;
        $c = $req->getParam('c');
        $sql = "SELECT * FROM strip_string";
        $cdb = Yii::app()->db->createCommand($sql);
        $data = $cdb->query();
        $ary_string = array();
        foreach ($data as $key => $val) {
            $ary_string[] = $val['txt'];
        }
        echo CJSON::encode($ary_string);
    }
}