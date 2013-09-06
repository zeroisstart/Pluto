<div class="grid_form">
	<?php
	$this->widget ( 'components.widgets.MetroGridView', array (
			'dataProvider' => $dataProvider,
			'columns' => array (
					'id',
					'txt' => array (
							'name' => '请求参数',
							'type' => 'html',
							'value' => '"<pre>".$data->txt."</pre>"' 
					),
					'dateline' => array (
							'name' => '请求时间',
							'value' => '$data->dateline' 
					),
					/*array (
							'header' => '操作',
							'template' => '{update} {delete}',
							'class' => 'components.widgets.ButtonColumn' 
					) */
			) 
	) )?>

</div>