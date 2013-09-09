<div class="grid_form">
	<?php
	$this->widget ( 'components.widgets.MetroGridView', array (
			'dataProvider' => $dataProvider,
			'columns' => array (
					'ID',
					'type',
					'file' => array (
							'name' => 'file',
							'type' => 'html',
							'value' => '"<pre>".$data->file."</pre>"' 
					),
					'create_time' => array (
							'name' => 'create_time',
							'value' => '$data->create_time' 
					),
					array (
							'header' => '操作',
							'template' => '{delete}',
							'class' => 'components.widgets.ButtonColumn' 
					) 
			) 
	) )?>

</div>