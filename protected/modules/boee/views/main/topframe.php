<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo Yii::app() -> baseURL;?>/css/common.css" type="text/css" />
<title>安徽联通短信转发管理维护中心</title>
<script type="text/javascript">
<!--
function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}
function MM_preloadimages() { //v3.0
  var d=document; if(dimages){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadimages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}
//-->
</script>
</head>

<body onload="MM_preloadimages('../../images/zkxss_07.gif','../../images/zkxss_08.gif','../../images/zkxss_10.gif','../../images/zkxss_11.gif','../../images/zkxss_12.gif','../../images/zkxss_14.gif','../../images/zkxss_13.gif')">
<div class="logo_bg"><img src="../../images/logo.jpg" width="630" height="55" /></div>
<div class="welcome"><span style="float:right; color:#50B3E2; padding-right:15px; line-height:24px;"><?php echo Yii::app() -> user->name;?> 欢迎您登录 &nbsp;&nbsp;【<a href="<?php echo $this -> createUrl('/boee/main/logout')?>">退出</a>】</span><span><img src="../../images/z3_01.gif" width="171" height="26" alt=""></span>

</div>

</body>
</html>
