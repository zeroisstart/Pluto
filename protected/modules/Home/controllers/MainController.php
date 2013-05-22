<?php

class MainController extends Controller
{

    public function actionIndex ()
    {
        $taskModel = Tasklist::model();
        $taskDataProvider = $taskModel -> search();
        
        
        Yii::import('ext.sinaWeibo.SinaWeibo',false);
        $weiboService=new SinaWeibo(WB_AKEY, WB_SKEY);
        //weibo 数据
        $c = new SaeTClientV2( WB_AKEY , WB_SKEY , $_SESSION['token']['access_token'] );
        $ms  = $c->home_timeline(); // done;
        $weiboData =  $ms;
        $this->render('main',array('taskModel'=>$taskModel,'taskDataProvider'=>$taskDataProvider,'weiboData'=>$weiboData));
        
    }

    public function actionAddTask ()
    {

    }

    public function actionDelTask ()
    {

    }
}