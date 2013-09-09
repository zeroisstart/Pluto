<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Frameset//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo Yii::app() -> baseURL;?>/css/common.css" type="text/css" />
<title>安徽联通短信转发管理维护中心</title>
</head>
<frameset rows="83,*" cols="*" frameborder="no" border="0"
	framespacing="0">
	<frame src="<?php echo $this -> createUrl('/boee/main/topframe')?>" name="topFrame" frameborder="no" scrolling="No" noresize="noresize" id="topFrame" title="topFrame" />
	<frameset name="myFrame" cols="171,9,*" frameborder="no" border="0"framespacing="0">
		<frameset cols="1,180">
			<frame src="<?php echo $this -> createUrl('/boee/main/untitledframe')?>" />
			<frame src="<?php echo $this -> createUrl('/boee/main/leftframe')?>" name="leftFrame" frameborder="no"scrolling="No" noresize="noresize" id="leftFrame" title="leftFrame" />
		</frameset>
		<frame src="<?php echo $this -> createUrl('/boee/main/switchframe')?>" name="midFrame" frameborder="no" scrolling="No" noresize="noresize" id="midFrame" title="midFrame" />
		<frame src="<?php echo $this -> createUrl('/boee/main/mainframe')?>" name="manFrame" frameborder="no" id="manFrame" title="manFrame" />
	</frameset>
</frameset>
</frameset>
<noframes>
	<body>
	</body>
</noframes>
</html>
