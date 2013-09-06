<div class="page secondary">
	  <?php $this -> widget('widget.Helper.title',array('h1'=>$h1,'small'=>$small))?>
<div class="page-region">
		<div class="page-region-content">
			
			<?php if(isset($btns)):?>
			<p class="p_link">
				<?php foreach ($btns as $name => $url):?>
					<a class="button standart default" href="<?php echo $this -> createUrl($url);?>" target="_blank" title="<?php echo $name;?>"><?php echo $name;?></a>
				<?php endforeach;?>
			</p>
			
			<?php endif;?>
				
			<?php 
			$ary_args = array();
			
			if(isset($data)){
				$ary_args['data']= $data;
			}
			
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