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
<a href="<?php echo $this->createAbsoluteUrl('/boee/content/main',array('fromuser'=>$fromuser));?>">
    <input class="fanhui" name="" type="button" value="返回" />
</a>

<?php 
 $steps = array('1'=>'一',2=>'二',3=>'三');  
?>
第<?php echo $steps[$step];?>关
</div> 
<div class="main">
  <div class="f_16" style="text-align:center"><b >恭喜您，闯关成功！</b></div>
 <br />
 <p>您还想继续闯关吗？如果继续答题，将有更高的奖品等你拿！如果放弃可领取当前的奖品！<br />

注：如果下一关闯关失败，之前得的所有奖品都没了哦！请慎重！！！
</p> 
 <br />
<p>
	<a href="<?php echo $this -> createUrl('/boee/survey/go'.($step+1),array('fromuser'=>$fromuser,'ids'=>implode(',', $ids)));?>">
	    <input class="anniu" type="button" value="继续闯关" />&nbsp;
    </a>
	<a href="<?php echo $this -> createUrl('/boee/survey/getMyApple',array('fromuser'=>$fromuser,'step'=>$step));?>">
	    <input class="anniu" type="button" value="领取奖品" /></p>
    </a>
</p>
</div>
</body>
</html>
