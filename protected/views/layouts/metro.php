<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
<meta charset="utf-8">
<meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, initial-scale=1.0, maximum-scale=1">
<meta name="author" content="Alan Shen">
<link href="css/modern.css" rel="stylesheet">
<link href="css/modern-responsive.css" rel="stylesheet">
<link href="css/site.css" rel="stylesheet" type="text/css">
<link href="js/google-code-prettify/prettify.css" rel="stylesheet" type="text/css">

<?php
$ary_js = array (
		"js/assets/jquery-1.9.0.min.js",
		"js/assets/jquery.mousewheel.min.js",
		"js/assets/moment.js",
		"js/assets/moment_langs.js",
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
		"js/modern/calendar.js" 
);
?>

<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body class="metrouicss" onload="prettyPrint()">

<?php $this ->widget('widget.System.navigation');?>

    <div class="page">
		<div class="nav-bar">
			<div class="nav-bar-inner padding10">
				<span class="element"> 2012-2013, Metro UI CSS &copy; by <a
					class="fg-color-white" href="mailto:sergey@pimenov.com.ua">Sergey
						Pimenov</a>
				</span>
			</div>
		</div>
	</div>

    <?php
	$js = array (
			"js/assets/github.info.js",
			"js/assets/google-analytics.js",
			"js/google-code-prettify/prettify.js" 
	);
	?>
    
    <script src="js/sharrre/jquery.sharrre-1.3.4.min.js"></script>
	<script>
        $('#shareme').sharrre({
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
        });
    </script>
</body>
</html>