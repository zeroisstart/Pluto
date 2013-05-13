<?php
/**
 * 
 * @author Top
 *
 */
class SitelinkController extends Controller {
	public function actionAdd() {
		$req = Yii::app ()->request;
		$siteLink = $req->getParam ( 'link' );
		$cate = $req->getParam ( 'c' );
		if ($siteLink) {
			$ary_params = $this->_process ( $siteLink );
			if ($ary_params) {
				$model = new Sitelink ();
				$model->title = $ary_params ['title'];
				$model->create_time = date ( 'Y-m-d H:i:s', time () );
				$model->url = $ary_params ['link'];
				$model->visable = 1;
				if ($cate) {
					$model->cate = ( int ) $cate;
				} else {
					$model->cate = 0;
				}
				if ($model->validate ()) {
					$model->save ();
					$this->redirect ( $this->createUrl ( '/Content/Sitelink/list' ) );
				} else {
					YII_DEBUG && var_dump ( $model->errors );
				}
			}
		}
	}
	
	/**
	 *
	 * @param $sitelink string       	
	 */
	private function _process($sitelink) {
		if (! strlen ( strpos ( $sitelink, 'http' ) )) {
			$sitelink = 'http://' . $sitelink;
		}
		return array ('title' => $sitelink, 'link' => $sitelink );
	}
	
	/**
	 * 删除某个链接
	 *
	 * @param $id integer       	
	 */
	public function actionDelete($id) {
		if ($id) {
			$model = new Sitelink ();
			$model = $model->findByPk ( $id );
			if ($model) {
				$model->delete ();
			}
		}
		$this->run ( 'list' );
	}
	
	public function actionList() {
		$req = Yii::app ()->request;
		$c = $req->getParam ( 'c' );
		$link = $req->getParam ( 'link' );
		if ($link) {
			$this->run ( 'add' );
		}
		$model = Sitelink::model ();
		$data = $model->search ();
		$this->render ( '/core/frame', array ('h1' => 'Sites', 'small' => 'list', 'data' => $data, 'model' => $model ) );
	
	}
	
	public function actionMain() {
		$this->render ( 'main' );
	}
}