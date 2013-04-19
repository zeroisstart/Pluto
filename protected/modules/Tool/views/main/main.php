<div class="page secondary">
       <div class="page-header">
            <div class="page-header-content">
                <h1>Global<small>styles</small></h1>
                <a href="<?php echo Yii::app() -> request -> UrlReferrer?>" class="back-button big page-back"></a>
            </div>
        </div>

        <div class="page-region">
            <div class="page-region-content">

<?php
/* @var $this MainController */
$this->breadcrumbs=array(
	'Main'=>array('/Tool/main'),
	'Main',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>

           </div>
        </div>
</div>