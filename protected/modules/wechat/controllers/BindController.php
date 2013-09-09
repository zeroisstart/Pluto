<?php
class BindController extends Controller
{

    /**
     * 会员绑定逻辑
     */
    public function actionMain ()
    {
        $req = Yii::app()->request;
        $wechatid = '1';
        $WechatAccount = WechatAccount::model();
        if (isset($_POST['bind'])) {
            // authentic logic
            $bind = $req->getParam('bind');
            $vcert = $bind['vcert'];
            $WechatAccount->vcert = $vcert;
            $cde = $bind['cde'];
            
            if (in_array($vcert, 
                    array(
                        1, 
                        2
                    ))) {
                $cde = mysql_real_escape_string($cde);
                $cde = '';
                if ($cde) {
                    if (! $WechatAccount->isBind($wechatid)) {
                        switch ($vcert) {
                            case 1:
                                $WechatAccount->bindByMemberID($wechatid, $cde);
                                break;
                            case 2:
                                $WechatAccount->bindIDCard($wechatid, $cde);
                                break;
                            default:
                                break;
                        }
                    }
                    $this->renderPartial('success');
                } else {
                    $this->renderPartial('main', 
                            array(
                                'model' => $WechatAccount
                            ));
                }
            }
            // authentic
        } else {
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