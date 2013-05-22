<?php

class QrcodeController extends Controller
{
	public function actionGenerate()
	{
	    $this -> widget('ext.phpqrcode.PHPQRcode');
		//$this->render('generate');
	}

	public function actionMian()
	{
		$this->render('mian');
	}
}