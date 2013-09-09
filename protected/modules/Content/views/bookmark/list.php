
<div class="grid_form">
<?php
$this->widget ( 'components.widgets.MetroGridView', array (
		'dataProvider' => $data,
		'columns' => array (
				'ID',
				'Cate',
				'Title' => array (
						'name' => 'Title',
						'type' => 'html',
						'value' => '$data -> TitleLink' 
				),
				'Time' => array (
						'name' => 'Time',
						'value' => 'date("Y-m-d",$data->Time)' 
				),
				array (
						'header'=>'操作',
						'template'=>'{update} {delete}',
						'class' => 'components.widgets.ButtonColumn' 
				) 
		) 
) ) ?>

</div>
