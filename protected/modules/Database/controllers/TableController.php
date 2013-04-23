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
		
		/*
		$ary_db = array ();
		foreach ( $dbs as $key => $val ) {
			$ary_db [reset ( $val )] = reset ( $val );
		}*/
		
		$Model = MysqlAccount::model ();
		$connections = $Model->getAllConnections ();
		
		$this->render ( '/core/frame', array (
				'h1' => 'Table',
				'small' => 'list',
				'args' => array (
						'tables' => $tables,
						'connections' => $connections,
						#'dbs' => $ary_db 
				) 
		) );
	}
	public function actionAjaxTable() {
		$req = Yii::app ()->request;
		$id = $req->getParam ( 'id' );
		$database = false;
		if ($id) {
			$model = MysqlAccount::model ()->findByPk ( $id );
			if ($model) {
				Yii::app ()->switchDB->swByModel ( $model );
				// database = Yii::app ()->database->getDatabases ();
				$tables = Yii::app ()->database->getTables ();
			}
		}
		if ($tables) {
			$count = count($tables);
			for($i = 0;$i<$count;$i++){
				if($i%3 ==0){
					echo "</tr><tr>";
				}
				echo "<td>".$tables[$i]."</td>";
			}
			#echo CHtml::dropDownList ( 'database', reset ( $database ), $database );
		}
	}
	public function actionMain() {
		$this->render ( 'main' );
	}
	public function actionView() {
		$this->render ( 'view' );
	}
}