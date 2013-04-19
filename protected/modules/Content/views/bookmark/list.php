<div class="page secondary">
       <div class="page-header">
            <div class="page-header-content">
                <h1>Global<small>styles</small></h1>
                <a href="<?php echo Yii::app() -> request -> UrlReferrer?>" class="back-button big page-back"></a>
            </div>
        </div>

        <div class="page-region">
            <div class="page-region-content">
<p class="p_link">
	<a href="<?php echo $this -> createUrl('/Tool/bookmark/add');?>" target="_blank">add</a>
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
				//'Read',
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