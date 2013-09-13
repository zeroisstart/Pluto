<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport"
	content="width=device-width,minimum-scale=1,user-scalable=no,maximum-scale=1,initial-scale=1" />
<title>保亿会</title>
<link href="<?php echo Yii::app() -> baseUrl?>/css/boee/wechat.css"
	rel="stylesheet" type="text/css">

</head>

<?php
$ary_url = array(
    '积分细则' => $this->createUrl('/boee/news/view', 
            array(
                'id' => 1
            )), 
    '入会申请' => $this->createUrl('/boee/member/apply'), 
    '会员绑定' => $this->createUrl('/wechat/bind/main', 
            array(
                'fromuser' => $fromuser
            )), 
    /*'会员绑定成功页面' => $this->createUrl('/boee/news/view', 
            array(
                'id' => 1
            )), */
    '信息公告列表页' => $this->createUrl('/boee/content/list'), 
    '文章显示页面' => $this->createUrl('/boee/news/view', 
            array(
                'id' => 2
            )), 
    '会员风采' => $this->createUrl('/boee/content/memberlist'), 
    '会员风采详细页' => $this->createUrl('/boee/content/memberView', 
            array(
                'id' => 1
            )), 
    '商家信息' => $this->createUrl('/boee/content/memberView', 
            array(
                'id' => 1
            )), 
    '答题有奖' => $this->createUrl('/boee/survey/main', 
            array(
                'fromuser' => $fromuser
            )), 
    '第一关题目' => $this->createUrl('/boee/survey/go', 
            array(
                'fromuser' => $fromuser
            ))
);
?>

<body>
	<div>
		<ul>
		    <?php foreach ($ary_url as $title => $url):?>
			    <li><a href="<?php echo $url?>"><?php echo $title?></a></li>
			<?php endforeach;?>
		</ul>
	</div>
</body>
</html>
