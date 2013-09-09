<?php 
	$this-> widget('widget.Helper.SimpleForm',array('action'=>$this-> createUrl('/Content/color/add')));
	$cs = Yii::app() -> clientScript;
	$cs -> registerScriptFile(Yii::app() -> baseUrl.'/js/tool.trigger/color.js',CClientScript::POS_END);
?>

<?php 
?>
<div class="grid_form color_list">
	<?php foreach ($data as $model):?>
		<div class="color_layer" data-id="<?php echo $model -> id;?>">
			<div class="color_item" style="background-color:#<?php echo $model->color?>">
			</div>
				<a href="javascript:void(0);" title="<?php sprintf("R=%s,G=%s,B=%s",$model-> R,$model->G,$model -> B)?>">#<?php echo $model->color?></a>
		</div>
	<?php endforeach;?>
</div>