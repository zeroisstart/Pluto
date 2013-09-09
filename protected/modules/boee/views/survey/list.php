
<div class="grid_form">
	<?php
	$this->widget ( 'components.widgets.GridView', array (
			'dataProvider' => $dataProvider,
			'columns' => array (
					'id',
			        'userid' ,
			        'answer',
			        'dateline' ,
			        'level',
					'dateline',
			) 
	) )?>

</div>