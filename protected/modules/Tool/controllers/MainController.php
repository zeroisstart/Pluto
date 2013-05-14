<?php

/**
 * 
 * @author Top
 *
 */
class MainController extends Controller
{

    public function actionMain ()
    {
        $this->render('/core/frame', array('h1' => 'Tools', 'small' => 'list'));
    }

}