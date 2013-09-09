<?php
/* @var $this AutoReplyController */

$this->breadcrumbs=array(
	'Auto Reply'=>array('/wechat/autoReply'),
	'List',
);
?>

<div class="grid_form">
	<?php
	$this->widget ( 'components.widgets.MetroGridView', array (
			'dataProvider' => $dataProvider,
			'columns' => array (
					'id',
					'keyword'=>array (
							'name' => '关键字',
							'value' => '$data->keyword' 
					),
					'txt' => array (
							'name' => '自动回复',
							'type' => 'html',
							'value' => '"<pre>".$data->txt."</pre>"' 
					),
					'create_time' => array (
							'name' => '创建时间',
							'value' => '$data->dateline' 
					),
					array (
							'header' => '操作',
							'template' => '{update} {delete}',
							'class' => 'components.widgets.ButtonColumn' 
					) 
			) 
	) )?>

</div>