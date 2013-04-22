  <div class="page secondary with-sidebar">
  		<?php 
  			$this -> widget('widget.Helper.title',array('h1'=>$h1,'small'=>$small));
  		?>
        
        <?php $this -> renderPartial('/core/_leftNavigation');?>
		
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
		
        <div class="page-region">
            <div class="page-region-content">
  				<?php $this-> renderPartial('/'.$this -> id.'/'.$this -> action->id,$ary_args)?>
            </div>
        </div>
    </div> 