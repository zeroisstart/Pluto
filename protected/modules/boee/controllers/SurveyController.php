<?php
class SurveyController extends Controller
{

    public $layout = '//layouts/boeeadmin';

    public function actionMain ()
    {
        $req = Yii::app()->request;
        $fromuser = $req->getParam('fromuser');
        
        //没有登录跳转到登录页面
        /*
        if (Yii::app()->user->isGuest) {
            if ($fromuser) {
                if ($this->_setLogin($fromuser)) {
                } else {
                    $this->redirect(
                            $this->createUrl('/wechat/bind/main', 
                                    array(
                                        'fromuser' => $fromuser
                                    )));
                    Yii::app()->end();
                }
            } else {
                echo "without wechatid";
            }
        }*/
        
        $WechatSurveyList = WechatSurveyList::model();
        $canPlay = $WechatSurveyList->canPlay(Yii::app()->user->id,$fromuser);
        
        $ary_survey_info = array(
            'fromuser' => $fromuser, 
            'ids' => array()
        );
        
        if ($canPlay === true) {
            $canPlay = 4;
        }
        if (! $canPlay) {
            $this->renderPartial('failed',array('fromuser'=>$fromuser));
        } elseif ($canPlay == '1') {
            $ary_survey_info['step'] = 1;
            $this->renderPartial('binggo', $ary_survey_info);
        } elseif ($canPlay == '2') {
            $ary_survey_info['step'] = 2;
            $this->renderPartial('binggo', $ary_survey_info);
        } elseif ($canPlay == '3') {
            $this->renderPartial('wait');
        } else {
            $this->renderPartial('main', 
                    array(
                        'fromuser' => $fromuser
                    ));
        }
    }
    // step one
    public function actionGo ()
    {
        
        $req = Yii::app()->request;
        $fromuser = $req->getParam('fromuser');
        
        $WechatSurveyList = WechatSurveyList::model();
        $canPlay = $WechatSurveyList->canPlay(Yii::app()->user->id,$fromuser);
        $WechatBoeeSurvey = WechatBoeeSurvey::model();
        if (isset($_POST['survey'])) {
            $survey = $req->getParam('survey');
            $ids = array_keys($survey);
            $questions = $WechatBoeeSurvey->getProblemByIDS($ids);
            $ary_model = array();
            foreach ($questions as $_model) {
                $ary_model[$_model->id] = $_model;
            }
            $pass = true;
            foreach ($survey as $key => $answer) {
                if ($answer != $ary_model[$key]->answer) {
                    $pass = false;
                }
            }
            
            if ($pass) {
                $WechatBoeeSurvey->pass(1, $survey, Yii::app()->user->id,$fromuser);
                $this->renderPartial('success', 
                        array(
                            'title' => '第一关', 
                            'step' => 2, 
                            'ids' => $ids, 
                            'fromuser' => $fromuser
                        ));
            } else {
                $WechatBoeeSurvey->failed(1, $survey, Yii::app()->user->id,$fromuser);
                $this->renderPartial('failed',array('fromuser'=>$fromuser));
            }
            
        } else {
            $questions = $WechatBoeeSurvey->getRandQuestion(3);
            $this->renderPartial('go', 
                    array(
                        'fromuser' => $fromuser, 
                        'questions' => $questions
                    ));
        }
    }
    // setp two
    public function actionGo2 ()
    {
        $req = Yii::app()->request;
        $fromuser = $req->getParam('fromuser');
        $WechatSurveyList = WechatSurveyList::model();
        $canPlay = $WechatSurveyList->canPlay(Yii::app()->user->id,$fromuser,$fromuser);
        $WechatBoeeSurvey = WechatBoeeSurvey::model();
        if (isset($_POST['survey'])) {
            $survey = $req->getParam('survey');
            $ids = array_keys($survey);
            $questions = $WechatBoeeSurvey->getProblemByIDS($ids);
            $ary_model = array();
            foreach ($questions as $_model) {
                $ary_model[$_model->id] = $_model;
            }
            $pass = true;
            foreach ($survey as $key => $answer) {
                if ($answer != $ary_model[$key]->answer) {
                    $pass = false;
                }
            }
            if ($pass) {
                $WechatBoeeSurvey->pass(1, $survey, Yii::app()->user->id,$fromuser);
                $this->renderPartial('success', 
                        array(
                            'title' => '第二关', 
                            'step' => 3, 
                            'fromuser' => $fromuser
                        ));
            } else {
                $WechatBoeeSurvey->failed(2, $survey, Yii::app()->user->id,$fromuser);
                $this->renderPartial('failed',array('fromuser'=>$fromuser));
            }
        } else {
            $uid = Yii::app()->user->id;
            $WechatBoeeSurvey = WechatBoeeSurvey::model();
            $ids = $WechatBoeeSurvey->getQuestionids($uid);
            $questions = $WechatBoeeSurvey->getRandQuestion(5, $ids);
            $this->renderPartial('go2', 
                    array(
                        'fromuser' => $fromuser, 
                        'questions' => $questions
                    ));
        }
    }
    // step three
    public function actionGo3 ()
    {
        $WechatSurveyList = WechatSurveyList::model();
        $uid = Yii::app()->user->id;
        
        $req = Yii::app()->request;
        $fromuser = $req->getParam('fromuser');
        $canPlay = $WechatSurveyList->canPlay($uid,$fromuser);
        $WechatBoeeSurvey = WechatBoeeSurvey::model();
        if (isset($_POST['survey'])) {
            $survey = $req->getParam('survey');
            $ids = array_keys($survey);
            $questions = $WechatBoeeSurvey->getProblemByIDS($ids);
            $ary_model = array();
            foreach ($questions as $_model) {
                $ary_model[$_model->id] = $_model;
            }
            $pass = true;
            foreach ($survey as $key => $answer) {
                if ($answer != $ary_model[$key]->answer) {
                    $pass = false;
                }
            }
            if ($pass) {
                $WechatBoeeSurvey->pass(3, $survey, Yii::app()->user->id,$fromuser);
                $this->redirect(
                        $this->createUrl('/boee/survey/getMyApple', 
                                array(
                                    'step' => 3
                                )));
            } else {
                $WechatBoeeSurvey->failed(1, $survey, Yii::app()->user->id,$fromuser);
                $this->renderPartial('failed',array('fromuser'=>$fromuser));
            }
        } else {
            $WechatBoeeSurvey = WechatBoeeSurvey::model();
            $ids = $WechatBoeeSurvey->getQuestionids($uid);
            $questions = $WechatBoeeSurvey->getRandQuestion(10, $ids);
            $this->renderPartial('go3', 
                    array(
                        'fromuser' => $fromuser, 
                        'questions' => $questions
                    ));
        }
    }

    /**
     *
     * @param $wechatid unknown_type           
     * @return boolean
     */
    public function _setLogin ($wechatid)
    {
        $model = new WechatLoginForm();
        $model->wechatid = $wechatid;
        if ($model->validate() && $model->login()) {
            return true;
        }
        return false;
    }

    public function actionList ()
    {
        $WechatSurveyList = WechatSurveyList::model();
        $dataProvider = $WechatSurveyList->search();
        $this->render('list', 
                array(
                    'model' => $WechatSurveyList, 
                    'dataProvider' => $dataProvider
                ));
    }

    /**
     * 抽奖
     */
    public function actionGetMyApple ()
    {
        $req = Yii::app()->request;
        $uid = Yii::app()->user->id;
        if(!$uid){
            $this -> redirect($this -> createUrl('/wechat/bind/main'));
        }
        $step = $req->getParam('step');
        $WechatSurveyList = WechatSurveyList::model();
        $model = WechatAppleList::model();
        $row = $model->isRecord($uid);
        
        if (! $row) {
            $row = $WechatSurveyList->findByAttributes(
                    array(
                        'userid' => $uid, 
                        'level' => $step
                    ));
            if ($row && $row->disable == 0) {
                $WechatAppleList = new WechatAppleList();
                $WechatAppleList->userid = $uid;
                $WechatAppleList->level = $step;
                $WechatAppleList->dateline = date('Y-m-d H:i:s', time());
                $WechatAppleList->save();
                $model = $WechatAppleList;
            } else {
                $this->redirect($this->createUrl('/boee/survey/main'));
                Yii::app()->end();
            }
        } else {
            $model = $row;
        }
        $this->renderPartial('apple', 
                array(
                    'model' => $model
                ));
    }
}