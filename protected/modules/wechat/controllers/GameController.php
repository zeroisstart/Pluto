<?php
class GameController extends Controller
{

    public function actionMain ()
    {
        $this->render('main');
    }
    
    public function actionRollDraw(){
       // echo '{"IsThank":true,"IsError":false,"IsWin":false,"WindId":"3964","SN":null,"PrizeId":"113","ErrorId":"-100"}';
       echo '{"IsThank":true,"IsError":false,"IsWin":false,"WindId":"3964","SN":null,"PrizeId":"113","ErrorId":"-100"}';
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