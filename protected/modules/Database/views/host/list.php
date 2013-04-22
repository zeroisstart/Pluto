<div class="grid_form">
<?php
	$this->widget ( 'components.widgets.MetroGridView', array (
		'dataProvider' => $dataProvider,
		'columns' => array (
				'ID',
				'host',
				'username',
				'port',
				array (
						'header'=>'操作',
						'template'=>'{update} {delete}',
						'class' => 'components.widgets.ButtonColumn' 
				) 
		) 
) ) ?>
</div>