<?php
/* @var $this CommandsController */

$this->breadcrumbs=array(
	'Commands'=>array('/Content/commands'),
	'List',
);
?>

<div class="form">
	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>'register-form',
	    'action'=>Yii::app() -> createUrl('/Content/commands/add'),
		'enableClientValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
		),
	)); ?>

	<?php echo $form->labelEx($model,'command'); ?>
	<div class="input-control text">
		<?php echo $form->textField($model,'command',array('class'=>'with-helper','Enter phone')); ?>
		<button class="helper" tabindex="-1" type="button"></button>
		<?php echo $form->error($model,'command'); ?>
    </div>
	
	<?php echo $form->labelEx($model,'detail'); ?>
	<div class="input-control textarea">
		<?php echo $form->textarea($model,'detail',array('style'=>'resize:none;')); ?>
		<?php echo $form->error($model,'detail'); ?>
    </div>
     
	<div class="row buttons">
		<?php echo CHtml::submitButton('Add'); ?>
	</div>

<?php $this->endWidget(); ?>
</div>
<!-- form -->


<div class="grid_form">
<?php
$this->widget ( 'components.widgets.MetroGridView', array (
		'dataProvider' => $dataProvider,
		'columns' => array (
				'id',
				'command' => array (
						'name' => 'command',
						'type' => 'html',
				),
				'create_time' ,
				array (
						'header'=>'操作',
						'template'=>'{delete}',
						'class' => 'components.widgets.ButtonColumn' 
				) 
		) 
) ) ?>

</div>

<?php
    /*
    $this->widget('ext.EZClipboard.EZClipboard', array(
        'tagHtmlOptions'    => array('class'=>'copy-class'),
        'tagId'             => 'copy_button',
        'tagContent'        => "Copy Text",
        'zcEvents'         =>  array('copy'=>'js:function(){return 123;}'),
        #'clipboardText'     => 'This is the text that will be copied',
        'zcEvents'          => array('load'=>'onLoad', 'complete'=>'onComplete'),
        'scriptPos'         => 'HEAD'
    ));
    */
?>          