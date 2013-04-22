<div class="page secondary">
		
	  <?php $this -> widget('widget.Helper.title',array('h1'=>'Bookmark','small'=>'list'))?>
<div class="page-region">
    	<div class="page-region-content">
    	
    	<button class="standart default">Add</button>
		<p class="p_link" style="display:none;">
			
			<a href="<?php echo $this -> createUrl('/Tool/bookmark/add');?>" target="_blank" style="display:none;">add</a>
		</p>

<?php // $this -> renderPartial('_form',array('model'=>$model,'method'=>'GET'));?>

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
           </div>
        </div>
</div>