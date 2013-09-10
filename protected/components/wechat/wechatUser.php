<?php
class wechatUser extends CComponent
{

    public function init ()
    {
    }

    /**
     * 微信登录
     *
     * @param $wechatid string           
     * @return boolean
     */
    public function login ($wechatid)
    {
        $WechatLoginForm = new WechatLoginForm();
        $WechatLoginForm->wechatid = $wechatid;
        return $WechatLoginForm->login();
    }
}