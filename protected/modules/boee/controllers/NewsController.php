<?php
class NewsController extends Controller
{

    /**
     * 显示静态内容
     */
    public function actionView ()
    {
        $req = Yii::app()->request;
        $id = $req->getParam('id');
        $ary_rule = array(
            1 => '_rule', 
            2 => '_detail'
        );
        $formuser = $req->getParam('fromuser');
        $template = $ary_rule[$id]; // '_rule';
        $this->renderPartial('view', 
                array(
                    'template' => $template, 
                    'fromuser' => $formuser
                ));
    }
}