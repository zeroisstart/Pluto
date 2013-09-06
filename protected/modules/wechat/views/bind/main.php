<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>保亿会</title>
<link href="<?php echo Yii::app() -> baseUrl?>/css/boee/wechat.css"
	rel="stylesheet" type="text/css">

</head>

<body>
	<div class="main">
		<h1>保亿会员绑定</h1>
		<div class="f_16">
			<form action="<?php echo $this-> createUrl('/wechat/bind/main')?>" method="post">
			
				<p>
					<b>微信用户：张晓强</b>
				</p>
				
				<p>
					<strong>认证方式：</strong><br /> 
					<?php if($model -> vcert == 1):?>
					<input name="bind[vcert]" type="radio" value="1" checked="checked" /> 会员卡号&nbsp;&nbsp;
					<input name="bind[vcert]" type="radio" value="2" />身份证号码<br /> 
					<?php else:?>
					<input name="bind[vcert]" type="radio" value="1" /> 会员卡号&nbsp;&nbsp;
					<input name="bind[vcert]" type="radio" value="2" checked="checked" />身份证号码<br /> 
					<?php endif;?>
					<input type="text" name="bind[cde]" class="inpt_img" maxlength="20" />
				</p>
				
				<p style="margin-top: 20px;">
					<input class="anniu" type="submit" value="提交" />
				</p>
				
				<p style="margin-top: 20px;">
					<a href="#">申请入会</a>
				</p>
				
			</form>
		</div>

	</div>
</body>
</html>
