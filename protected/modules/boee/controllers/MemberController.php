<?php
class MemberController extends Controller
{

    public $layout = '//layouts/boeeadmin';

    public function actionAdd ()
    {
        $this->render('add');
    }

    public function actionDelete ()
    {
        $this->render('delete');
    }

    public function actionList ()
    {
        $WechatAccountInfo = WechatAccountInfo::model();
        $dataProvider = $WechatAccountInfo->search();
        $this->render('list', 
                array(
                    'dataProvider' => $dataProvider, 
                    'model' => $WechatAccountInfo
                ));
    }
    


    public function actionMain ()
    {
        $this->render('main');
    }

    public function actionUpdate ()
    {
        $this->render('update');
    }

    public function actionApply ()
    {
        $this->renderPartial('apply');
    }
}