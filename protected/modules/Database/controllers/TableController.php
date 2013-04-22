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
	 */
	public function actionList() {
		
		// data = $dbCommand -> queryAll();
		$dbCommand = Yii::app ()->db->createCommand ( "show tables" );
		$tables = $dbCommand->queryAll ();
		
		$dbCommand = Yii::app ()->db->createCommand ( "show databases" );
		$dbs = $dbCommand->queryAll ();
		
		$ary_db = array ();
		foreach ( $dbs as $key => $val ) {
			$ary_db [reset ( $val )] = reset ( $val );
		}
		
		$Model = MysqlAccount::model ();
		$connections = $Model->getAllConnections ();
		
		$this->render ( '/core/frame', array (
				'h1' => 'Table',
				'small' => 'list',
				'args' => array (
						'tables' => $tables,
						'connections' => $connections,
						'dbs' => $ary_db 
				) 
		) );
	}
	public function actionMain() {
		$this->render ( 'main' );
	}
	public function actionView() {
		$this->render ( 'view' );
	}
}