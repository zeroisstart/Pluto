<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1,user-scalable=no,maximum-scale=1,initial-scale=1" />
<title>保亿会</title>
<link rel="stylesheet" href="<?php echo Yii::app() -> baseURL;?>/css/boee/wechat.css" type="text/css" />
</head>

<body>
<div class="head">
<?php 
 $steps = array('1'=>'一',2=>'二',3=>'三');  
?>
    恭喜您 闯过了第<?php echo $steps[$model -> level];?>关
</div>
<div class="main">
  <div class="f_16" style="text-align:center"><b >恭喜您，闯关成功！</b></div>
 <br />
 <p>恭喜您获得第<?php echo $steps[$model -> level];?>关的大礼包！<br /></>谢谢您的参与,我们会尽快的与您取得联系！<br />请不要着急！<br /></p> 
 <br />
<p>
	<a href="<?php echo $this->createAbsoluteUrl('/boee/content/main',array('fromuser'=>$fromuser));?>">
	    <input class="anniu" type="button" value="返回" />&nbsp;
    </a>
</p>
</a>
</div>
</body>
</html>
