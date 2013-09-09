<div class="grid_form">
<?php
$this->widget ( 'components.widgets.MetroGridView', array (
		'dataProvider' => $data,
		'columns' => array (
				'id',
				'cate',
				'title' => array (
						'name' => 'title',
						'type' => 'html',
						'value' =>'$data -> TitleLink' 
				),
				'create_time' => array (
						'name' => 'Time',
						'value' => '$data->create_time' 
				),
				array (
						'header'=>'操作',
						'template'=>'{update} {delete}',
						'class' => 'components.widgets.ButtonColumn' 
				) 
		) 
) ) ?>

</div>
