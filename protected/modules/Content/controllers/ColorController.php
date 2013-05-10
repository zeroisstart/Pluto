<?php
/**
 * 颜色的填充
 * @author Top
 *
 */
class ColorController extends Controller {
	
	public function actionCreate() {
		$this->render ( 'create' );
	}
	
	public function actionAdd() {
		$req = Yii::app ()->request;
		$txt = $req->getParam ( 'text' );
		
		if ($txt && strlen ( $txt ) % 3 == 0 && strlen ( $txt )<7) {
			if (strlen ( $txt ) == 3) {
				$_txt = $txt [0] . $txt [0];
				$_txt .= $txt [1] . $txt [1];
				$_txt .= $txt [2] . $txt [2];
				$txt = $_txt;
			}
			$model = new Color ();
			if (! $model->checkIsExists ( $txt )) {
				$r = hexdec ( substr ( $txt, 0, 2 ) );
				$g = hexdec ( substr ( $txt, 0, 2 ) );
				$b = hexdec ( substr ( $txt, 0, 2 ) );
				$model->color = $txt;
				$model->R = $r;
				$model->G = $g;
				$model->B = $b;
				$model->create_time = date ( 'Y-m-d H:i:s' );
				if ($model->validate ()) {
					$model->save ();
				} else {
					YII_DEBUG && var_dump ( $model->errors );
				}
			}
		}
		$this->redirect ( $this->createUrl ( '/Content/color/list' ) );
	}
	
	public function actionDelete() {
		$this->render ( 'delete' );
	}
	
	public function actionList() {
		
		
		$model = Color::model ();
		$criteria = new CDbCriteria ();
		$criteria->order = "color desc";
		$data = $model->findAll ( $criteria );
		echo "test";
		die;
		$this->render ( '/core/frame', array ('small' => 'list', 'h1' => "Color", 'data' => $data ) );
	
	}
	
	public function actionMain() {
		$this->render ( 'main' );
	}

}