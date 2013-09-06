<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo Yii::app() -> baseURL;?>/css/common.css" type="text/css" />
<style>
	body{background:#E9F5FC}
	/*body{ background:#E9F5FC url("../../images/z3_05.gif") left bottom no-repeat;border-left: 3px solid #0A5C8E;}*/
	.bgbottom{position:absolute;bottom:0px;}
</style>

<script type="text/javascript">

function openShutManager(oSourceObj,oTargetObj,shutAble,oOpenTip,oShutTip){
var sourceObj = typeof oSourceObj == "string" ? document.getElementById(oSourceObj) : oSourceObj;
var targetObj = typeof oTargetObj == "string" ? document.getElementById(oTargetObj) : oTargetObj;
var openTip = oOpenTip || "";
var shutTip = oShutTip || "";
if(targetObj.style.display!="none"){
   if(shutAble) return;
   targetObj.style.display="none";
   if(openTip && shutTip){
    sourceObj.innerHTML = shutTip; 
   }
} else {
   targetObj.style.display="block";
   if(openTip && shutTip){
    sourceObj.innerHTML = openTip; 
   }
}
}
</script>
<title>左侧导航栏</title>
</head>

<body onload="initinav('管理首页')">
<!---->
	<div style="height:28px; text-align:center; width:171px;"><img src="../../images/z3_02.gif" width="171" height="28" alt=""></div>
	<div class="lm_nr">
	  <ul>
		<li class="ulli"><span class="ullia"  onclick="openShutManager(this,'box')">会员服务</span>
			<ol style="display:block" id="box">
				<li><a href="manage/hy_ruhui.html" target=manFrame class="ola_hover">入会申请</a></li>
				<li><a href="manage/hy_yonghu.html" target=manFrame class="">会员用户</a></li>
				
				
				<li><a href="manage/hy_ruihuan.html" target=manFrame class="">积分兑换活动</a></li>
				
				<li><a href="manage/hy_shequ.html" target=manFrame class="">社区信息公告</a></li>
				<li><a href="manage/hy_fengsai.html" target=manFrame class="">会员风采</a></li>
				
				<li><a href="manage/hy_lianmeng.html" target=manFrame class="">联盟商家</a></li>
				<li><a href="manage/hy_tousu.html" target=manFrame class="">投诉受理</a></li>
			</ol>
		</li>
	   <li class="ulli"><span class="ullia" onclick="openShutManager(this,'box2')">物业服务</span>
			<ol  style="display:none" id="box2">
				<li><a href="manage/wy_gonggao.html" target=manFrame class="">物业公告</a></li>				
				<li><a href="manage/yy_weixiu.html" target=manFrame class="">预约维修</a></li>
			</ol>
		</li>
		
		<li class="ulli"><span class="ullia" onclick="openShutManager(this,'box4')">系统管理</span>
			<ol  style="display:none" id="box4">
				<li><a href="manage/sq_guanli.html" target=manFrame class="">社区(部门)管理</a></li>
				<li><a href="manage/sq_user.html" target=manFrame class="">社区(部门)管理员</a></li>
			</ol>
		</li>
		<li class="ulli"><span class="ullia" onclick="openShutManager(this,'box3')">关注保亿</span>
			<ol  style="display:none" id="box3">
				<li><a href="manage/yy_kanfang.html" target=manFrame class="">预约看房</a></li>
				<li><a href="manage/contant.html" target=manFrame class="">联系我们</a></li>
			</ol>
		</li>			
	  </ul>
	</div>
<!----><div style="height:32px; text-align:center; width:171px;" class="bgbottom"><img src="../../images/z3_05.gif" width="171" height="32" alt=""></div>

</body>
</html>
