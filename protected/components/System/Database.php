<?php
/**
 * 
 * @author Top
 *
 */
class Database extends CComponent {
	public function init() {
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
	
	/**
	 * 返回所有的表名
	 *
	 * @return multitype:mixed
	 */
	public function getTables() {
		$sql = "show tables";
		$cdbCommand = Yii::app ()->db->createCommand ( $sql );
		$data = $cdbCommand->queryAll ();
		#var_dump($data);
		$ary_tables = array ();
		foreach ( $data as $key => $val ) {
			$ary_tables [] = reset ( $val );
		}
		#var_dump($ary_tables);
		return $ary_tables;
		#var_dump ( $ary_tables );
		#die ();
	}
}