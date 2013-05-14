<?php

/**
 * 
 * @author Top
 *
 */
class CommandsController extends Controller
{

    public function actionAdd ()
    {
        $this->render('add');
    }

    public function actionDelete ()
    {
        $this->render('delete');
    }

    public function actionList ()
    {
        $this->render('/core/frame',array('h1'=>'Commands','small'=>'list'));
    }

    public function actionView ()
    {
        $this->render('view');
    }

}