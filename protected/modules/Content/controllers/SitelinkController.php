<?php
/**
 * 
 * @author Top
 *
 */
class SitelinkController extends Controller {
	public function actionAdd() {
		$this->render ( 'add' );
	}
	
	public function actionDelete() {
		$this->render ( 'delete' );
	}
	
	public function actionList() {
		$this->render ( '/core/frame', array ('h1' => 'Sites', 'small' => 'list' ) );
	}
	
	public function actionMain() {
		$this->render ( 'main' );
	}
}