<?php
class ContentController extends Controller
{

    public function actionMain ()
    {
        $req = Yii::app()->request;
        $fromuser = $req->getParam('fromuser');
        $this->renderPartial('main', array(
            'fromuser' => $fromuser
        ));
    }

    public function actionList ()
    {
        $this->renderPartial('list');
    }
    public function actionMemberlist(){
        $this -> renderPartial('memberlist');
    }
    
    public function actionMemberView($id){
        $this -> renderPartial('memberView');
    }
}