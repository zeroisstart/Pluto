<!DOCTYPE html>
<!-- saved from url=(0077)http://x.tourzj.gov.cn/GameGGl.aspx?FromUserName=osASjjmz9N-pIjf7xdRkIRkEUwoI -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width,minimum-scale=1,user-scalable=no,maximum-scale=1,initial-scale=1">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="format-detection" content="telephone=no">
    <meta name="description" content="">
    <link rel="stylesheet" href="http://x.tourzj.gov.cn/css/common2.css">
    <link rel="stylesheet" href="http://x.tourzj.gov.cn/css/jquery.css">
    <link rel="stylesheet" href="http://x.tourzj.gov.cn/css/alertify.css">
    <style type="text/css">
        .cover
        {
            width: 320px;
            max-width: 480px;
            margin: 0 auto;
            position: relative;
        }
        .cover img
        {
            width: 320px;
        }
        #scratchpad, #prize, #winresult
        {
            position: absolute;
            width: 150px;
            height: 40px;
            top: 110px;
            right: 50px;
            text-align: center;
            font-weight: bold;
            font-size: 20px;
            line-height: 40px;
        }
        .btn-cont
        {
            position: absolute;
            bottom: 3px;
            right: 3px;
            display: none;
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
        p
        {
            margin: 0 0 10px;
            font-size: 14px;
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
    <title>刮刮卡抽奖页面 </title>
    <script language="javascript" type="text/javascript" src="<?php echo Yii::app() -> getBaseUrl().'/js/wechat/'?>jQuery-1.6.4.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app() -> getBaseUrl().'/js/wechat/'?>mobile.js"></script>
</head>
<body style="min-height: 776px;" data-wssurvey="ws563">
    <div id="panelLottery">
        <div class="cover">
            <img src="<?php echo Yii::app() -> getBaseUrl().'/publish/anne/'?>scqggl.jpg" height="208px">
            <div id="prize">
            </div>
            <div id="winresult">
                <div style="position: relative; width: 150px; height: 40px; cursor: default;">
                    <div id="winPrize" width="150" height="40" style="cursor: default;">参与奖</div>
                </div>
            </div>
            <div id="scratchpad">
                <div id="canvaspanel" style="position: relative; width: 150px; height: 40px; cursor: default;">
                    <canvas id="canvas" width="150" height="40" style="cursor: default;"></canvas>
                </div>
            </div>
            <div style="display: block;" class="btn-cont" onclick="getPrize();">
                <a class="ui-btn ui-shadow ui-btn-corner-all ui-btn-up-c" data-theme="c" data-wrapperels="span" data-iconshadow="true" data-shadow="true" data-corners="true" href="javascript:;" id="opendialog" data-role="button" data-rel="dialog"><span class="ui-btn-inner ui-btn-corner-all">
                        <span class="ui-btn-text">我要领奖</span></span></a>
            </div>
        </div>
        <div class="content">
            <p class="desc">
                兑奖说明<span style="color: red;">（亲，中奖后请务必点击"我要领奖"，否可能无法领奖喔！）</span></p>
            
            <p>
                一等奖：吴越人家牌丝巾</p>
            <p>
                二等奖：奖励3个积分</p>
            <p>
                三等奖：奖励2个积分</p>
            <p>
                参与奖：奖励1个积分</p>
        </div>
    </div>
    <!--弹出框-->
    <div id="promptMsg" class="ui-dialog-contain ui-corner-all ui-overlay-shadow" style="display: none">
        <div class="ui-corner-top ui-header ui-bar-d">
            <a title="Close" class="ui-btn-left ui-btn ui-shadow ui-btn-corner-all ui-btn-icon-notext ui-btn-up-d" href="http://x.tourzj.gov.cn/GameGGl.aspx?FromUserName=osASjjmz9N-pIjf7xdRkIRkEUwoI#"><span class="ui-btn-inner ui-btn-corner-all"><span class="ui-btn-text">Close</span>
                    <span class="ui-icon ui-icon-delete ui-icon-shadow">&nbsp;</span> </span>
            </a>
            <h3 class="ui-title">
                恭喜你！中奖了</h3>
        </div>
        <div class="ui-corner-bottom ui-content ui-body-c">
            <p id="ts" style="font-weight: bold;">你中的是【参与奖】，为了您更好的获取奖品,请点击<a href="http://x.tourzj.gov.cn/Personal.aspx?FromUserName=osASjjmz9N-pIjf7xdRkIRkEUwoI">【个人中心】</a>完善您的个人信息!</p>
        </div>
    </div>
    <section id="alertEle" class="alertify-dialog is-alertify-dialog-showing" style="display: none;">
        <div class="alertify-dialog-inner">
            <article class="alertify-inner">
                <p class="alertify-message" id="alertEleMsg"></p>
                    <nav class="alertify-buttons">
                        <button id="alertify-ok" class="alertify-button alertify-button-ok" type="button" role="button" onclick="$(&#39;alertEle&#39;).style.display=&#39;none&#39;;">确定</button>
                     </nav>
             </article><a href="http://x.tourzj.gov.cn/GameGGl.aspx?FromUserName=osASjjmz9N-pIjf7xdRkIRkEUwoI#" class="alertify-resetFocus" id="alertify-resetFocus">Reset Focus</a></div></section>
    <div style="clear: both;">
    </div>
    <p class="page-url">
    <img src="<?php echo Yii::app() -> getBaseUrl().'/publish/anne/'?>scq.jpg" width="320" height="211"><br>
        <!-- 
        <a href="http://x.tourzj.gov.cn/GameGGl.aspx?FromUserName=osASjjmz9N-pIjf7xdRkIRkEUwoI#" target="_blank" class="page-url-link">此功能由"浙江旅游信息"平台提供</a>
         -->
    </p>
    <script type="text/javascript">
        //$("save-btn").disabled = false;
        $('winPrize').innerHTML = "参与奖";
        // $('prizetype').innerHTML = "参与奖";
        var c = document.getElementById("canvas");
        var ctx = c.getContext("2d");
        ctx.fillStyle = "#CCCCCC";
        ctx.fillRect(0, 0, 150, 40);
        var isGua = false; //是否已经刮奖
        var FromUserName = "osASjjmz9N-pIjf7xdRkIRkEUwoI";
        (function () {
            var paint = {
                init: function () {
                    this.load();
                },
                load: function () {
                    this.x = []; //记录鼠标移动是的X坐标
                    this.y = []; //记录鼠标移动是的Y坐标
                    this.clickDrag = [];
                    this.lock = false; //鼠标移动前，判断鼠标是否按下
                    this.isEraser = true;
                    this.eraserRadius = 8; //擦除半径值  
                    this.$ = function (id) { return typeof id == "string" ? document.getElementById(id) : id; };
                    this.canvas = this.$("canvas");
                    if (this.canvas.getContext) {
                    } else {
                        alert("您的浏览器不支持 canvas 标签");
                        return;
                    }
                    this.cxt = this.canvas.getContext('2d');
                    this.touch = ("createTouch" in document); //判定是否为手持设备
                    this.StartEvent = this.touch ? "touchstart" : "mousedown"; //支持触摸式使用相应的事件替代
                    this.MoveEvent = this.touch ? "touchmove" : "mousemove";
                    this.EndEvent = this.touch ? "touchend" : "mouseup";
                    this.bind();
                },
                bind: function () {
                    var t = this;
                    /*鼠标按下事件，记录鼠标位置，并绘制，解锁lock，打开mousemove事件*/
                    this.canvas['on' + t.StartEvent] = function (e) {
                        var touch = t.touch ? e.touches[0] : e;
                        position = x.getAbsoluteLocation('canvas');
                        var _x = touch.clientX - position.left; //鼠标在画布上的x坐标，以画布左上角为起点
                        var _y = touch.clientY - position.top; //鼠标在画布上的y坐标，以画布左上角为起点 
                        t.resetEraser(_x, _y);
                        t.lock = true;
                    };
                    /*鼠标移动事件*/
                    this.canvas['on' + t.MoveEvent] = function (e) {
                        var touch = t.touch ? e.touches[0] : e;
                        if (t.lock)//t.lock为true则执行
                        {
                            position = x.getAbsoluteLocation('canvas');
                            var _x = touch.clientX - position.left; //鼠标在画布上的x坐标，以画布左上角为起点
                            var _y = touch.clientY - position.top; //鼠标在画布上的y坐标，以画布左上角为起点 
                            t.resetEraser(_x, _y);
                        }
                    };
                    this.canvas['on' + t.EndEvent] = function (e) {
                        /*重置数据*/
                        t.lock = false;
                        t.x = [];
                        t.y = [];
                        t.clickDrag = [];
                        clearInterval(t.Timer);
                        t.Timer = null;
                    };
                },
                resetEraser: function (_x, _y) {
                    /*使用橡皮擦-提醒*/
                    var t = this;
                    //this.cxt.lineWidth = 30;
                    /*source-over 默认,相交部分由后绘制图形的填充(颜色,渐变,纹理)覆盖,全部浏览器通过*/
                    t.cxt.globalCompositeOperation = "destination-out";
                    t.cxt.beginPath();
                    t.cxt.arc(_x, _y, t.eraserRadius, 0, Math.PI * 1);
                    t.cxt.strokeStyle = "rgba(250,250,250,0)";
                    t.cxt.fill();
                    t.cxt.globalCompositeOperation = "source-over"
                    //alert('1');
                    isGua = true;
                }

            };
            paint.init();
        })();

        function getPrize() {
            // check();
            var IsWin = "True";
            if (!isGua) {
                alert('请将刮奖区域刮开');
                return;
            }
            if (IsWin == "True") {
                $('promptMsg').style.display = 'block';
                $('panelLottery').style.display = 'none';
            }
            else {
                alert('您本次没有中奖');
                location.reload();
            }
        }
        function alert_t(msg) {
            $('alertEleMsg').innerHTML = msg;
            $('alertEle').style.display = 'block';
        };

        function check() {
            $.get("ajax/CheckTime.ashx?FromUserName=" + FromUserName + "&T=" + Math.random(), function (e) {
                var ss = e
                if (ss == "1") {
                    alert("您今天抽奖次数已到！请明天再来！");
                    location.reload();
                    return;
                }
            });
        }
    </script>


<style>.myToolbar {z-index:100000} .myToolbar .tb_btn {cursor:pointer;border:1px solid #555;padding:3px}   .tb_highlight{background-color:yellow} .tb_hide {visibility:hidden}</style><style>.tb_button {padding:2px;cursor:pointer;border-right: 1px solid #8b8b8b;border-left: 1px solid #FFF;border-bottom: 1px solid #fff;}.tb_button.hover {borer:2px outset #def; background-color: #f8f8f8 !important;}</style></body></html>