<div class="grid_form">
	<?php
	$this->widget ( 'components.widgets.GridView', array (
			'dataProvider' => $dataProvider,
			'columns' => array (
					'name',
					'memberid',
					'membertype',
					'belong',
					'gender',
					'idcard',
					'located',
					'datetime',
					array (
							'header' => '操作',
							'template' => '{update}{delete}',
							'class' => 'components.widgets.ButtonColumn' 
					) 
			) 
	) )?>

</div>