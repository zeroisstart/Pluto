<?php
/**
 * 
 * @author Top
 *
 */
class HostController extends Controller {
	public function actionCreate() {
		$this->render ( 'create' );
	}
	public function actionDelete() {
		$this->render ( 'delete' );
	}
	/**
	 * MySQL 账户列表
	 */
	public function actionList() {
		$model = MysqlAccount::model ();
		
		if (isset ( $_POST ['mysqlAccount'] )) {
			$model->attribtues = $_POST ['mysqlAccount'];
		}
		$dataProvider = $model->search ();
		
		$this->render ( '/core/frame', array (
				'small' => 'list',
				'h1' => 'Host',
				'model' => $model,
				'dataProvider' => $dataProvider 
		) );
	}
	public function actionMain() {
		$this->render ( 'main' );
	}
	public function actionView() {
		$this->render ( 'view' );
	}
}