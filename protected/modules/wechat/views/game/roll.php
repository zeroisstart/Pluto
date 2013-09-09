<!DOCTYPE html>
<!-- saved from url=(0076)http://x.tourzj.gov.cn/Gamezp.aspx?FromUserName=osASjjmz9N-pIjf7xdRkIRkEUwoI -->
<html><head id="Head1"><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width,minimum-scale=1,user-scalable=no,maximum-scale=1,initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="浙江旅游微信">
    <link rel="stylesheet" href="http://x.tourzj.gov.cn/css/ZPcommon.css">
    <link rel="stylesheet" href="http://x.tourzj.gov.cn/css/ZPjquery.css">
    <link rel="stylesheet" href="http://x.tourzj.gov.cn/css/ZPalertify.css">
    <style type="text/css">
        .cover
        {
            width: 100%;
            max-width: 320px;
            margin: 0 auto;
            position: relative;
        }
        .cover img
        {
            width: 100%;
        }
        #outer-cont
        {
            position: absolute;
            width: 100%;
            top: 20px; /* -moz-transform: rotate(-5deg);
	        -webkit-transform: rotate(-5deg);
	        -o-transform: rotate(-5deg);
	        -ms-transform: rotate(-5deg);
	        transform: rotate(-5deg); */
        }
        #inner-cont
        {
            position: absolute;
            width: 100%;
            top: 90px; /* -moz-transform: rotate(-5deg);
	        -webkit-transform: rotate(-5deg);
	        -o-transform: rotate(-5deg);
	        -ms-transform: rotate(-5deg);
	        transform: rotate(-5deg); */
        }
        #outer
        {
            width: 300px;
            max-width: 300px;
            height: 300px;
            margin: 0 auto;
        }
        #inner
        {
            width: 112px;
            max-width: 112px;
            height: 142px;
            margin: 0 auto;
            cursor: pointer;
        }
        #outer img, #inner img
        {
            display: block;
            margin: 0 auto;
        }
        .content
        {
            margin-top: 20px;
            padding: 0 15px;
        }
        .content .desc
        {
            font-weight: bold;
            border-bottom: 1px dashed #000;
            padding: 12px 0px;
        }
        .loading-mask
        {
            width: 100%;
            height: 100%;
            position: fixed;
            background: rgba(0,0,0,0.6);
            z-index: 100;
            left: 0px;
            top: 0px;
        }
    </style>
    <title>幸运大转盘抽奖页面 </title>
    <script language="javascript" type="text/javascript" src="<?php echo Yii::app() -> getBaseUrl().'/js/wechat/'?>jQuery-1.6.4.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app() -> getBaseUrl().'/js/wechat/'?>ZPmobile.js"></script>
</head>
<body style="min-height: 618px;" data-wssurvey="ws898">
    <div id="panelLottery">
        <div class="cover">
            <img src="<?php echo Yii::app() -> getBaseUrl().'/publish/anne/'?>ZPmobile_bg1.jpg" width="480" height="350" alt="">
        </div>
        <div id="outer-cont">
            <div id="outer">
                <img src="<?php echo Yii::app() -> getBaseUrl().'/publish/anne/'?>pan3.png" alt=""></div>
        </div>
        <div id="inner-cont">
            <div id="inner">
                <img src="<?php echo Yii::app() -> getBaseUrl().'/publish/anne/'?>ZPpan-2.png" alt=""></div>
        </div>
        <div id="msgss">
        </div>
        <div class="content">
            <p class="desc">
                兑奖说明<span style="color: red;">（亲，中奖后请务必完善您的个人信息，否可能无法领奖喔！）</span></p>
            
            <p>
                一等奖：亲子套票</p>
            <p>
                二等奖：乐清旅游纪念U盘</p>
            <p>
                三等奖：奖励3个积分</p>
        </div>
    </div>
    <!--弹出框-->
    <div id="promptMsg" class="ui-dialog-contain ui-corner-all ui-overlay-shadow" style="display: none">
        <div class="ui-corner-top ui-header ui-bar-d">
            <a title="Close" class="ui-btn-left ui-btn ui-shadow ui-btn-corner-all ui-btn-icon-notext ui-btn-up-d" href="http://x.tourzj.gov.cn/Gamezp.aspx?FromUserName=osASjjmz9N-pIjf7xdRkIRkEUwoI#"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">Close</span>
                    <span class="ui-icon ui-icon-delete ui-icon-shadow">&nbsp;</span> </span>
            </a>
            <h3 class="ui-title">
                恭喜你！中奖了</h3>
        </div>
        <div class="ui-corner-bottom ui-content ui-body-c">
            <p style="font-weight: bold;">
                你中的是<span id="prizetype"></span></p><div id="ts">为了您更好的获取奖品,请点击<a href="http://x.tourzj.gov.cn/Personal.aspx?FromUserName=osASjjmz9N-pIjf7xdRkIRkEUwoI">【个人中心】</a>完善您的个人信息!</div>
            <p></p>
        </div>
    </div>
    <section id="alertEle" class="alertify-dialog is-alertify-dialog-showing" style="display: none;">
        <div class="alertify-dialog-inner">
            <article class="alertify-inner">
                <p class="alertify-message" id="alertEleMsg"></p>
                    <nav class="alertify-buttons">
                        <button id="alertify-ok" class="alertify-button alertify-button-ok" type="button" role="button" onclick="$(&#39;alertEle&#39;).style.display=&#39;none&#39;;">确定</button>
                     </nav>
             </article><a href="http://x.tourzj.gov.cn/Gamezp.aspx?FromUserName=osASjjmz9N-pIjf7xdRkIRkEUwoI#" class="alertify-resetFocus" id="alertify-resetFocus">Reset Focus</a></div></section>
    <!--footer-->
    <div style="clear: both;">
    </div>
    <p class="page-url">
        <!-- 
        <a href="http://x.tourzj.gov.cn/Gamezp.aspx?FromUserName=osASjjmz9N-pIjf7xdRkIRkEUwoI#" target="_blank" class="page-url-link">此功能由"浙江旅游信息中心"平台提供</a>
         -->
    </p>
    <script type="text/javascript">
        var IsThank;
        var IsError;
        var IsWin;
        var PrizeId;
        var Errorid;
        var FromUserName = "osASjjmz9N-pIjf7xdRkIRkEUwoI";
        var Rotate = {};
        Rotate.init = function () {
            Rotate.speed = 6; //转速
            Rotate.prizeList = { 'i109': '一等奖', 'i110': '二等奖', 'i111': '三等奖', 'i112': '谢谢参与', 'i113': '不要灰心', 'i114': '要加油哦', 'i115': '运气先攒着', 'i116': '再接再厉', 'i117': '祝你好运' };
            Rotate.isRun = false;
            Rotate.isStop = false;
            Rotate.isFaild = false;
        };
        Rotate.getPrizeDeg = function (prizeid) {
            if (Rotate.prizeList['i' + prizeid]) {
                if (Rotate.prizeList['i' + prizeid] == '一等奖') return 8;
                if (Rotate.prizeList['i' + prizeid] == '二等奖') return 248;
                if (Rotate.prizeList['i' + prizeid] == '三等奖') return 128;
                if (Rotate.prizeList['i' + prizeid] == '谢谢参与') return 336;
                if (Rotate.prizeList['i' + prizeid] == '不要灰心') return 36;
                if (Rotate.prizeList['i' + prizeid] == '要加油哦') return 276;
                if (Rotate.prizeList['i' + prizeid] == '运气先攒着') return 216;
                if (Rotate.prizeList['i' + prizeid] == '再接再厉') return 156;
                if (Rotate.prizeList['i' + prizeid] == '祝你好运') return 96;
            }
            return 160;
        }
        Rotate.run = function () {
            Rotate.init();
            Rotate.isRun = true;
            var deg = 0;
            var deg_increment = 18;
            var runCount = 0;

            //开始旋转
            Rotate.getWinResult();
            //获取摇奖结果
            setTimeout(ratateing, Rotate.speed);

            function ratateing() {
                deg += deg_increment;
                Rotate.rotateY('outer', deg);

                if (deg == 360) {
                    deg = 0;
                    deg_increment = 12;
                    if (runCount > 3) {
                        deg_increment = 4;
                    }
                    runCount++;
                }

                if (runCount < 4 || !Rotate.isStop) {
                    setTimeout(ratateing, Rotate.speed);
                    return;
                }
                //检测中奖情况
                checkWin();
            }
            //判断中奖情况
            function checkWin() {

                if (IsWin) {//中奖
                    if (Rotate.getPrizeDeg(PrizeId) == deg) {
                        setTimeout(function () {
                            Rotate.showPrompt();
                            Rotate.isRun = false;
                        }, 2000);
                        return;
                    }
                }
                if (IsThank) {//鼓励奖
                    if (Rotate.getPrizeDeg(PrizeId) == deg) {
                        setTimeout(function () {
                            Rotate.isRun = false;
                            if (IsError) {//内部服务器错误                    
                                if (Errorid == "-100") {
                                    alert_t('您的抽奖次数已经用完');
                                }
                                else if (Errorid == "-101") {
                                    alert_t('对不起，您的活动次数已到限制');
                                }
                                else if (Errorid == "-104") {
                                    alert_t('对不起，活动已经停止');
                                }
                                else if (Errorid == "-401") {
                                    alert_t('对不起，活动已经结束');
                                }
                                else {
                                    alert_t('对不起，网络连接错误，请重试');
                                }
                                Rotate.isRun = false;
                                return;

                            }
                            else {
                                alert_t('对不起，您这次没有中奖');
                            }
                        }, 1000);
                        return;
                    }

                }
                //继续选装
                setTimeout(ratateing, Rotate.speed);
            }
        };
        Rotate.showPrompt = function () {
            $('prizetype').innerHTML = Rotate.prizeList['i' + PrizeId];
            $('promptMsg').style.display = 'block';
            $('panelLottery').style.display = 'none';
        };
        //向服务器请求抽奖
        Rotate.getWinResult = function () {
            var config = {
                method: 'get',
                url: '<?php echo $this -> createUrl("/wechat/game/rolldraw")?>?FromUserName=' + FromUserName
            };

            var request = new x.WebRequest(config);

            
            request.onSuccess = function (responseText, responseXML) {
                var jsonobj =eval('(' + responseText + ')');
                //{"IsThank":false,"IsError":false,"IsWin":true,"WindId":"3964","SN":null,"PrizeId":"111","ErrorId":"-100"};
                //{"IsThank":true,"IsError":false,"IsWin":false,"WindId":"3964","SN":null,"PrizeId":"113","ErrorId":"-100"}  不要灰心
                IsThank = jsonobj.IsThank;
                IsError = jsonobj.IsError;
                IsWin = jsonobj.IsWin;
                PrizeId = jsonobj.PrizeId;
                Errorid = jsonobj.ErrorId;
                Rotate.isFaild = false;
                Rotate.isStop = true;
            };

            request.onFailure = function () {
                Rotate.isFaild = true;
                Rotate.isStop = true;
            };

            request.onException = function () {
                Rotate.isFaild = true;
                Rotate.isStop = true;
            };

            request.send(null);
        };

        Rotate.rotateY = function (id, _deg) {
            var element = $(id);
            element.style.MozTransform = 'rotateZ(' + _deg + 'deg)';
            element.style.WebkitTransform = 'rotateZ(' + _deg + 'deg)';
            element.style.OTransform = 'rotateZ(' + _deg + 'deg)';
            element.style.MsTransform = 'rotateZ(' + _deg + 'deg)';
            element.style.Transform = 'rotateZ(' + _deg + 'deg)';
        };

        $('inner').onclick = function () {
            if (Rotate.isRun) {
                return;
            }
            Rotate.run();
        };
        function alert_t(msg) {
            $('alertEleMsg').innerHTML = msg;
            $('alertEle').style.display = 'block';
        };
    </script>


<style>.myToolbar {z-index:100000} .myToolbar .tb_btn {cursor:pointer;border:1px solid #555;padding:3px}   .tb_highlight{background-color:yellow} .tb_hide {visibility:hidden}</style><style>.tb_button {padding:2px;cursor:pointer;border-right: 1px solid #8b8b8b;border-left: 1px solid #FFF;border-bottom: 1px solid #fff;}.tb_button.hover {borer:2px outset #def; background-color: #f8f8f8 !important;}</style></body></html>