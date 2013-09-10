<?php

class StaticController extends Controller
{
	public function actionHyzc()
	{
		$this->renderPartial('hyzc');
	}

	public function actionMain()
	{
		$this->render('main');
	}
}