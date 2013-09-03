<?php
/**
 * weixin 回复后台
 * @author top
 *
 */
class AutoReplyController extends Controller {
	
	/**
	 * 添加
	 */
	public function actionAdd() {
		
		if(isset($_POST['autoReply'])){
			
			$model = new WechatAutoReply();
			$model -> attributes = $_POST['autoReply'];
			if($model -> validate()){
				$model -> save();
			}else{
				var_dump($model -> errors);
			}
		}
		
		$this->render ( 'add' ,$ary_param);
		
	}
	public function actionList() {
		$this->render ( 'list' );
	}
	public function actionDelete($id) {
		$this->render ( 'delete' );
	}
	public function actionUpdate($id) {
		$this->render ( 'update' );
	}
	/**
	 * 加载单个模型
	 */
	public function loadModel() {
		if ($this->_model === null) {
			if (isset ( $_GET ['id'] ))
				$this->_model = WechatAutoReply::model ()->findByPk ( $_GET ['id'] );
			if ($this->_model === null)
				throw new CHttpException ( 404, '您请求的页面不存在.' );
		}
		return $this->_model;
	}
	
	/**
	 * 基于ajax的表单验证
	 */
	protected function performAjaxValidation($model) {
		if (isset ( $_POST ['ajax'] ) && $_POST ['ajax'] === 'autoReply-form') {
			echo CActiveForm::validate ( $model );
			Yii::app ()->end ();
		}
	}
}