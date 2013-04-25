<?php

/**
 * 
 * @author Top
 *
 */
class CommitLogController extends Controller {
	/**
	 * 删除提交记录
	 */
	public function actionDelete($id) {
		$model = CommitLog::model ()->findByPk ( $id );
		if ($model) {
			$model->delete ();
		}
	}
	/**
	 * 显示列表
	 */
	public function actionList() {
		$model = CommitLog::model ();
		
		$dataProvider = $model->search ();
		
		$this->render ( '/core/frame', array (
				'model' => $model,
				'dataProvider' => $dataProvider,
				'h1' => 'CommitLog',
				'small' => 'list' 
		) );
	}
	public function actionMain() {
		$this->render ( 'main' );
	}
	
	/**
	 */
	public function actionView($type) {
		$this->render ( 'view' );
	}
}