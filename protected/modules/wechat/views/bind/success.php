<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width,minimum-scale=1,user-scalable=no,maximum-scale=1,initial-scale=1" />
<title>保亿会</title>
<link href="<?php echo Yii::app() ->baseUrl?>/css/boee/wechat.css"
	rel="stylesheet" type="text/css">

</head>

<body>
	<div class="main">
		<h1>保亿会员绑定</h1>
		<div class="f_16" style="text-align: center">
			<p>
				<b>恭喜您！会员绑定成功！</b>
			</p>
        
            <p style="text-align:left;">
                            保亿最近在举办一个答题有奖活动哦.答题有奖快快行动吧!
            </p>
			
			<p style="margin-top: 20px;">
			    <a href="<?php echo $this->createAbsoluteUrl('/boee/content/main',array('fromuser'=>$model->wechatid));
			    ?>">
				    <input class="anniu" type="button" value="返回" />
				</a>
				
				<a href="<?php echo $this -> createAbsoluteUrl('/boee/survey/main',array('fromuser'=>$model->wechatid));
				?>">
				    <input class="anniu" type="button" value="我要参加" />
				</a>
			</p>
		</div>
	</div>
</body>
</html>
