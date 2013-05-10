<?php

/**
 * 
 * @author Top
 *
 */
class RouterParser extends CComponent {
	
	public function init() {
	
	}
	
	/**
	 * 返回需要进行操作的服务调用解析
	 *
	 * @param $router string       	
	 * @param $id interger       	
	 * @return mixed array
	 */
	public function parser($router, $id) {
		$router = strip_tags ( $router );
		$router = addslashes ( $router );
		$ary_router = explode ( '.', $router );
		$ary = array ();
		$ary ['count'] = count ( $ary_router );
		if (! $ary ['count'])
			return false;
		$ary ['data'] = $ary_router;
		$ary ['id'] = $id;
		return $ary;
	}
	
	public function getApiActionRouter() {
		
		$req = Yii::app ()->request;
		$apiRouter = $req->getParam ( 'r' );
		$id = $req->getParam ( 'id' );
		if ($apiRouter && $id)
			return $this->parser ( $apiRouter, $id );
		return false;
	}

}