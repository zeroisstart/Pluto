<?php
class MainController extends Controller {
	public $defaultAction = 'main';
	public $layout = '//layouts/boee';
	public function actionMain() {
		$this->render ( 'main' );
	}
	public function actionLeftframe() {
		$this->renderPartial ( 'leftframe' );
	}
	public function actionTopframe() {
		$this->renderPartial ( 'topframe' );
	}
	public function actionSwitchframe() {
		$this->renderPartial ( 'switchframe' );
	}
	public function actionMainframe() {
		$this->renderPartial ( 'mainframe' );
	}
	public function actionUntitledframe() {
		$this->renderPartial ( 'untitledframe' );
	}
}