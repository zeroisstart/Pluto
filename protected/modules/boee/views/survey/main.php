<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1,user-scalable=no,maximum-scale=1,initial-scale=1" />
<title>保亿会</title>
<link rel="stylesheet" href="<?php echo Yii::app() -> baseURL;?>/css/boee/wechat.css" type="text/css" />
</head>

<body>
<div class="main">
  <h1>保亿有奖答题活动开始啦！</h1>
  <div>
  <p class="hdzp"><img src="../../images/yjdt.jpg" /></p>
 <p> <b class="f_16">答题规则：</b></p>
 <p>1.答题闯关一共有3关：<br />第一关3道题目，全部答对可领取奖品或继续闯关，点击"领取奖品"可领取奖品但闯关结束，点击"闯下一关"，则不能领取本关奖品，答错一题闯关结束；<br />
 第二关5道题目，规则同上；<br />第三关10道题目规则同上。</p>

<p>4.每位会员自能参与一次活动，获奖用户凭微信号到当地社区管理处领取奖品。
</p>
 
  <p style="margin-top:20px; text-align:center">
  	<a href="<?php echo $this -> createUrl('/boee/survey/go',array('fromuser'=>$fromuser));?>">
  		<input class="anniu" type="button" value="开始答题" />
  	</a>
  </p>
  </div>
  
</div>
</body>
</html>
