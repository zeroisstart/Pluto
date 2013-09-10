<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="<?php echo Yii::app() -> baseUrl?>/css/boee/login.css" type="text/css" />
<title>登录</title>
</head>
<body>
	<div class="locon">
		
    		<div class="form">
            <?php $form=$this->beginWidget('CActiveForm', array(
            	'id'=>'login-form',
            	'enableClientValidation'=>true,
            	'clientOptions'=>array(
            		'validateOnSubmit'=>true,
            	),
            )); ?>
            
            	<p class="note">带有 <span class="required">*</span> 的为必填.</p>
            
            	<div class="row">
            		<?php echo $form->labelEx($model,'username'); ?>
            		<?php echo $form->textField($model,'username'); ?>
            		<?php echo $form->error($model,'username'); ?>
            	</div>
            
            	<div class="row">
            		<?php echo $form->labelEx($model,'password'); ?>
            		<?php echo $form->passwordField($model,'password'); ?>
            		<?php echo $form->error($model,'password'); ?>
            	</div>
            
            	<div class="row rememberMe">
            		<?php echo $form->checkBox($model,'rememberMe'); ?>
            		<?php echo $form->label($model,'rememberMe'); ?>
            		<?php echo $form->error($model,'rememberMe'); ?>
            	</div>
            
            	<div class="row buttons">
            		<?php echo CHtml::submitButton('登录'); ?>
            	</div>
            
            <?php $this->endWidget(); ?>
           </div><!-- form -->
    		
	</div>
</body>
</html>
