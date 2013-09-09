<?php
class SurveyController extends Controller {
	public $layout = '//layouts/boeeadmin';
	public function actionMain() {
		$req = Yii::app ()->request;
		$fromuser = $req->getParam ( 'fromuser' );
		$this->renderPartial ( 'main', array (
				'fromuser' => $fromuser 
		) );
	}
	
	// step one
	public function actionGo() {
		$req = Yii::app ()->request;
		$fromuser = $req->getParam ( 'fromuser' );
		
		$WechatBoeeSurvey = WechatBoeeSurvey::model ();
		
		if (isset ( $_POST ['survey'] )) {
			
			$survey = $req->getParam ( 'survey' );
			$ids = array_keys ( $survey );
			
			$questions = $WechatBoeeSurvey->getProblemByIDS ( $ids );
			$ary_model = array ();
			foreach ( $questions as $_model ) {
				$ary_model [$_model->id] = $_model;
			}
			
			$pass = true;
			foreach ( $survey as $key => $answer ) {
				var_dump ( $answer );
				var_dump ( $ary_model [$key]->answer );
				if ($answer != $ary_model [$key]->answer) {
					$pass = false;
				}
			}
			if ($pass) {
				$WechatBoeeSurvey->pass ( 1, $survey );
				$this->renderPartial ( 'success', array (
						'title' => '第一关',
						'step' => 2,
						'ids' => $ids,
						'fromuser' => $fromuser 
				) );
			} else {
				$WechatBoeeSurvey->failed ( 1, $survey );
				$this->renderPartial ( 'failed' );
			}
		} else {
			$questions = $WechatBoeeSurvey->getRandQuestion ( 3 );
			$this->renderPartial ( 'go', array (
					'fromuser' => $fromuser,
					'questions' => $questions 
			) );
		}
	}
	
	// setp two
	public function actionGo2() {
		$req = Yii::app ()->request;
		$fromuser = $req->getParam ( 'fromuser' );
		if (0) {
			$this->renderPartial ( 'success', array (
					'title' => '第二关',
					'step' => 3,
					'fromuser' => $fromuser 
			) );
		} else {
			$ids = $req->getParam ( 'ids' );
			$ids = explode ( ',', $ids );
			$WechatBoeeSurvey = WechatBoeeSurvey::model ();
			$questions = $WechatBoeeSurvey->getRandQuestion ( 5, $ids );
			$this->renderPartial ( 'go2', array (
					'fromuser' => $fromuser,
					'questions' => $questions 
			) );
		}
	}
	
	// step three
	public function actionGo3() {
		$req = Yii::app ()->request;
		$fromuser = $req->getParam ( 'fromuser' );
		$WechatBoeeSurvey = WechatBoeeSurvey::model ();
		$questions = $WechatBoeeSurvey->getRandQuestion ( 10, array () );
		$this->renderPartial ( 'go3', array (
				'fromuser' => $fromuser,
				'questions' => $questions 
		) );
	}
	public function actionList() {
		$this->render ( 'list' );
	}
}