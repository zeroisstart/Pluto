<?php
class GameController extends Controller
{

    public function actionMain ()
    {
        $this->render('main');
    }

    public function actionRollDraw ()
    {
        // echo
        // '{"IsThank":true,"IsError":false,"IsWin":false,"WindId":"3964","SN":null,"PrizeId":"113","ErrorId":"-100"}';
        echo '{"IsThank":true,"IsError":false,"IsWin":false,"WindId":"3964","SN":null,"PrizeId":"113","ErrorId":"-100"}';
    }

    /**
     * 刮刮乐后台
     */
    public function actionScratchlist ()
    {
        $ary_param = array(
            'small' => '中奖列表', 
            'h1' => '刮刮乐'
        );
        
        $this->render('frame', $ary_param);
    }

    /**
     * 大转盘后台
     */
    public function actionRolllist ()
    {
        $ary_param = array(
            'small' => '中奖列表', 
            'h1' => '大转盘'
        );
        $this->render('frame', $ary_param);
    }

    /**
     * 大转盘
     */
    public function actionRoll ()
    {
        $this->renderPartial('roll');
    }

    /**
     * 刮刮乐
     */
    public function actionScratch ()
    {
        $this->renderPartial('scratch');
    }
}