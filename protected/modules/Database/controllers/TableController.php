<?php

/**
 * 
 * @author Top
 *
 */
class TableController extends Controller {
	public function actionCreate() {
		$this->render ( '/core/frame', array (
				'h1' => 'Table',
				'small' => 'create' 
		) );
	}
	public function actionDelete() {
		$this->render ( 'delete' );
	}
	/**
	 * 表名列表
	 */
	public function actionList() {
		$dbCommand = Yii::app ()->db->createCommand ( "show tables" );
		$tables = $dbCommand->queryAll ();
		
		$Model = MysqlAccount::model ();
		$connections = $Model->getAllConnections ();
		
		$this->render ( '/core/frame', array (
				'h1' => 'Table',
				'small' => 'list',
				'args' => array (
						'tables' => $tables,
						'connections' => $connections 
				) 
		) );
	}
	/**
	 * AJAX 获取数据库的表名
	 */
	public function actionAjaxTable() {
		// 切换数据库
		$this->_switch ();
		$tables = Yii::app ()->database->getTables ();
		if ($tables) {
			$count = count ( $tables );
			for($i = 0; $i < $count; $i ++) {
				if ($i % 3 == 0) {
					echo "</tr><tr>";
				}
				echo "<td>" . $tables [$i] . "</td>";
			}
		}
	}
	/**
	 * 切换数据库
	 * 
	 * @return boolean
	 */
	private function _switch() {
		$req = Yii::app ()->request;
		$id = $req->getParam ( 'id' );
		$database = false;
		if ($id) {
			$model = MysqlAccount::model ()->findByPk ( $id );
			if ($model) {
				Yii::app ()->switchDB->swByModel ( $model );
				// database = Yii::app ()->database->getDatabases ();
				return true;
			}
		}
		return false;
	}
	/**
	 * 向表里面添加数据
	 */
	public function actionInsert() {
		$req = Yii::app ()->request;
	}
	public function actionMain() {
		$this->render ( 'main' );
	}
	public function actionView() {
		$this->render ( 'view' );
	}
}