<?php
class BindController extends Controller
{

    /**
     * 会员绑定逻辑
     */
    public function actionMain ()
    {
        $req = Yii::app()->request;
        $wechatid = $req->getParam('fromuser');
        $WechatAccount = WechatAccount::model();
        $WechatAccount->wechatid = $wechatid;
        if (isset($_POST['bind'])) {
            // authentic logic
            $bind = $req->getParam('bind');
            $vcert = $bind['vcert'];
            $WechatAccount->vcert = $vcert;
            $cde = $bind['cde'];
            if (in_array($vcert, array(
                1, 
                2
            ))) {
                $cde = mysql_real_escape_string($cde);
                if ($cde) {
                    if (! $WechatAccount->isBind($wechatid)) {
                        switch ($vcert) {
                            case 1:
                                // 1 成功 2 失败
                                $error_cde = $WechatAccount->bindByMemberID($wechatid, $cde);
                                if ($error_cde == 2) {
                                    $msg = '没有找到相关的会员号，请核对后重新输入。';
                                } elseif ($error_cde == 3) {
                                    $msg = '会员卡号已被绑定。请更换卡号。';
                                }
                                break;
                            case 2:
                                $error_cde = $WechatAccount->bindIDCard($wechatid, $cde);
                                if ($error_cde == 4) {
                                    $msg = '没有找到相关的证件号，请核对后重新输入。';
                                } elseif ($error_cde == 5) {
                                    $msg = '证件号已被绑定。请更换证件号。';
                                }
                                break;
                            default:
                                break;
                        }
                    } else {
                        $WechatAccount ->login();
                        
                        $WechatSurveyList = new WechatSurveyList();
                        $criteria = new CDbCriteria();
                        $criteria -> condition ="wechatid='$wechatid'";
                        $models = $WechatSurveyList->findAll($criteria);
                        $level = false;
                        foreach ($models as $model) {
                            $model -> id = Yii::app() -> user -> id;
                            $model -> update();
                            $level = $model->level;
                        }
                        if($level){
                            $this -> redirect($this -> createUrl('/boee/survey/getMyApple',array('fromuser'=>$wechatid,'step'=>$level)));
                        }
                        //$wechatid
                        
                        $this->renderPartial('success', 
                                array(
                                    'model' => $WechatAccount
                                ));
                        
                        Yii::app()->end();
                    }
                    if ($error_cde != 1) {
                        $this->renderPartial('main', 
                                array(
                                    'model' => $WechatAccount, 
                                    'error_msg' => $msg
                                ));
                    } else {
                        $WechatAccount ->login();
                        $this->renderPartial('success', 
                                array(
                                    'model' => $WechatAccount
                                ));
                    }
                } else {
                    $this->renderPartial('main', 
                            array(
                                'model' => $WechatAccount
                            ));
                }
            }
            // authentic
       } else {
            if($WechatAccount -> isBind($wechatid)){
                $WechatAccount ->login();
                $this->renderPartial('success',
                        array(
                                'model' => $WechatAccount
                        ));
            }else{
                $ary_data = array(
                        'wechatid' => $wechatid
                );
                $this->renderPartial('main',
                        array(
                                'model' => $WechatAccount
                        ));
            }
        }
    }
} 