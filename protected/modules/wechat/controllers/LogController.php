<?php
class LogController extends Controller
{

    public $defailtAction = 'list';

    /**
     * 日志列表页面
     */
    public function actionList ()
    {
        $WechatRequestLog = WechatRequestLog::model();
        $dataProvider = $WechatRequestLog->search();
        $ary_param = array(
            'h1' => 'LOG', 
            'small' => 'list', 
            'dataProvider' => $dataProvider
        );
        $this->render('frame',$ary_param);
    }

    public function actionMain ()
    {
        $this->render('main');
    }
}