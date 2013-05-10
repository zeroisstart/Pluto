<?php

/**
 * 控制相关的删除工作
 * @author Top
 *
 */
class DeleteController extends Controller {
	public function actionDelete() {
		$routerParser = Yii::app ()->RouterParser;
		$router = $routerParser->ApiActionRouter;
		if ($router ['count']) {
			if ($this->_process ( $router ))
				echo CJavaScript::encode ( array ('status' => '1' ) );
			else
				echo CJavaScript::encode ( array ('status' => '0' ) );
		} else {
			echo CJavaScript::encode ( array ('status' => '0' ) );
		}
	}
	
	/**
	 *
	 * @return array array
	 */
	public function rule() {
		return array ('color' => 'Color' );
	}
	
	public function _process(array $ary_args) {
		$key = reset ( $ary_args ['data'] );
		$ary_rule = $this->rule ();
		if (isset ( $ary_rule [$key] )) {
			$model = $ary_rule [$key]::model ();
			return $model->deleteByPk ( $ary_args ['id'] );
		}
		return false;
	}
	
	public function actionView() {
		$this->render ( 'view' );
	}

}