<div class="page secondary">
	  <?php $this -> widget('widget.Helper.title',array('h1'=>$h1,'small'=>$small))?>
<div class="page-region">
		<div class="page-region-content">
			<p class="p_link" style="display: none;">
				<a href="<?php echo $this -> createUrl('/Tool/bookmark/add');?>" target="_blank" style="display: none;">add</a>
			</p>
			<?php 
			$ary_args = array();
			if(isset($model)){
				$ary_args['model']= $model;
			}
			if(isset($dataProvider)){
				$ary_args['dataProvider']= $dataProvider;
			}
			if(isset($args)){
				$ary_args['args']= $args;
			}
		?>
		<?php $this-> renderPartial('/'.$this -> id.'/'.$this -> action->id,$ary_args)?>
		</div>
	</div>
</div>