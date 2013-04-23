<?php
/**
 * 
 * @author Top
 *
 */
class DBController extends Controller {
	public function actionCreate() {
		$this->render ( 'create' );
	}
	public function actionDelete() {
		$this->render ( 'delete' );
	}
	public function actionList() {
		$this->render ( 'list' );
	}
	public function actionMain() {
		$this->render ( 'main' );
	}
	public function actionView() {
		$this->render ( 'view' );
	}
	public function actionAjaxDbName() {
		$req = Yii::app ()->request;
		$id = $req->getParam ( 'id' );
		$database = false;
		if ($id) {
			$model = MysqlAccount::model ()->findByPk ( $id );
			if ($model) {
				Yii::app ()->switchDB->swByModel ( $model );
				$database = Yii::app ()->database->getDatabases ();
			}
		}
		if ($database) {
			echo CHtml::dropDownList ( 'database', reset ( $database ), $database );
		}
	}
}  