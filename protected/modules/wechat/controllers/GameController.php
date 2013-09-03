<?php
class GameController extends Controller
{

    public function actionMain ()
    {
        $this->render('main');
    }

    public function actionRoll ()
    {
        $this->renderPartial('roll');
    }

    public function actionScratch ()
    {
        $this->renderPartial('scratch');
    }
}