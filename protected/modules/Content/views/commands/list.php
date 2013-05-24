<?php
/* @var $this CommandsController */

$this->breadcrumbs=array(
	'Commands'=>array('/Content/commands'),
	'List',
);
?>
<h1><?php echo $this->id . '/' . $this->action->id; ?></h1>

<p>
	You may change the content of this page by modifying
	the file <tt><?php echo __FILE__; ?></tt>.
</p>

<?php
    $this->widget('ext.EZClipboard.EZClipboard', array(
        'tagHtmlOptions'    => array('class'=>'copy-class'),
        'tagId'             => 'copy_button',
        'tagContent'        => "Copy Text",
         'zcEvents'         =>  array('copy'=>'js:function(){return 123;}'),
        'clipboardText'     => 'This is the text that will be copied',
        'zcEvents'          => array('load'=>'onLoad', 'complete'=>'onComplete'),
        'scriptPos'         => 'HEAD'
    ));
?>          