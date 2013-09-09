<?php
/**
 * 
 * @author Top
 *
 */
class MainController extends Controller {
	
	/**
	 * 
	 */
	public function actionMain() {
		$this -> redirect($this -> createUrl('/Database/Host/list'));
		/*
		$this->render ( '/core/frame', array (
				'h1' => 'Database',
				'small' => 'tool' 
		) );*/
	}
}