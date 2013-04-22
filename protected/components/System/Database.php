<?php
/**
 * 
 * @author Top
 *
 */
class Database extends CComponent {
	
	public function init(){
		
	}
	
	/**
	 * 返回当前所有的数据库
	 * 
	 * @return multitype:mixed
	 */
	public function getDatabases() {
		$sql = "show databases";
		$cdbCommand = Yii::app ()->db->createCommand ( $sql );
		$data = $cdbCommand->queryAll ();
		$ary_db = array ();
		foreach ( $data as $key => $val ) {
			$item = reset ( $val );
			$ary_db [$item] = $item;
		}
		return $ary_db;
	}
}