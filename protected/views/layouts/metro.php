<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
<meta charset="utf-8">
<meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1">
<meta name="author" content="Alan Shen">

<?php
$ary_css = array (
		"css/modern.css",
		"css/modern-responsive.css",
		"css/site.css",
		"js/google-code-prettify/prettify.css" 
);
$ary_js = array (
       # 'js/assets/jquery-migrate-1.2.1.js',
		"js/assets/jquery.mousewheel.min.js",
		"js/assets/moment.js",
		"js/assets/moment_langs.js",
        "js/modern/dialog.js",
		"js/modern/dropdown.js",
		"js/modern/accordion.js",
		"js/modern/buttonset.js",
		"js/modern/carousel.js",
		"js/modern/input-control.js",
		"js/modern/pagecontrol.js",
		"js/modern/rating.js",
		"js/modern/slider.js",
		"js/modern/tile-slider.js",
		"js/modern/tile-drag.js",
		"js/modern/calendar.js",
		'footer' => array (
				#"js/assets/github.info.js",
				#"js/assets/google-analytics.js",
				"js/google-code-prettify/prettify.js",
				"js/sharrre/jquery.sharrre-1.3.4.min.js" 
		) 
);

$baseUrl = Yii::app ()->getAssetManager ()->publish ( dirname ( Yii::app ()->basePath ) . DIRECTORY_SEPARATOR . 'publish' . DIRECTORY_SEPARATOR . 'metro', false, - 1, YII_DEBUG );
//
Yii::app ()->params->metroAssets = $baseUrl;

$this->widget ( 'widget.ClientScript.autoRegisterFile', array (
		'js' => $ary_js,
		'css' => $ary_css,
		'baseUrl' => $baseUrl,
		'jquery'=>true,
) );

$cs = Yii::app() -> clientScript;
$cs -> registerCssFile(Yii::app() -> baseUrl.'/css/top.css');
$cs -> registerScriptFile(Yii::app() -> baseUrl.'/js/config/main.js');
?>

<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body class="metrouicss" onload="prettyPrint()">

<?php
$this->widget ( 'widget.System.navigation', array (
		'metroAssets' => $baseUrl 
) );
?>
	<?php echo $content ;?>
	</div>

	<div class="page">
		<div class="nav-bar">
			<div class="nav-bar-inner padding10">
				<span class="element"> 2013, CodeBase &copy; by <a class="fg-color-white" href="mailto:shenhongmings@gmail.com">Alan Shen </a>
				</span>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function(){
	       /* $('#shareme').sharrre({
	            share: {
	                googlePlus: true
	                ,facebook: true
	                ,twitter: true
	                ,delicious: true
	            },
	            urlCurl: "js/sharrre/sharrre.php",
	            buttons: {
	                googlePlus: {size: 'tall'},
	                facebook: {layout: 'box_count'},
	                twitter: {count: 'vertical'},
	                delicious: {size: 'tall'}
	            },
	            hover: function(api, options){
	                $(api.element).find('.buttons').show();
	            }
	        });*/
		})
    </script>
</body>
</html>