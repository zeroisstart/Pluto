<?php

class MainController extends Controller
{
	public function actionIndex()
	{
		#var_dump(Yii::app());
		#die;
		$this->render('main'); 
	}
}