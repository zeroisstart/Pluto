<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>保亿会</title>
<link rel="stylesheet" href="<?php echo Yii::app() -> baseURL;?>/css/boee/wechat.css" type="text/css" />
</head>

<body>
<div class="head"><input class="fanhui" name="" type="button" value="返回" />
第一关
</div>
<div class="main">
  <div>
 <form action="<?php echo $this -> createUrl('/boee/survey/go',array('fromuser'=>$fromuser));?>" method="post">
 
	
				<?php foreach($questions as $key=> $model):?>
				<p>
					<?php echo $key+1; ?>. <?php echo $model -> title;?><br /> 
					
					<?php foreach($model -> getOptions() as $option):?>
					<label>
						<input type="radio" required name="survey[<?php echo $model->id;?>]" value="<?php echo $option['val']?>" id="answer_<?php echo $key +1;?>" /><?php echo $option['title']?></label>
					<br />
					<?php endforeach;?>
					
				</p>
				<?php endforeach;?>
	
  <p style="margin-top:20px; text-align:center">
  	<input class="anniu" type="submit" value="提交" />
  </p>
  </form>
  </div>
  
</div>
</body>
</html>
