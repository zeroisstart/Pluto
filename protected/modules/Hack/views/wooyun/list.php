  <div class="page secondary with-sidebar">
  		<?php 
  			$this -> widget('widget.Helper.title',array('h1'=>$h1,'small'=>$small));
  		?>
        
         <div class="grid_form">
         
               <?php foreach($dataProvider as $model):?>
                   <div class="wooyun_item">
                           <a href="http://google.com/search?q=<?php echo $model -> title;?>" target="_blank"><?php echo $model -> title?></a>
                   </div>
               <?php endforeach;?>
                        
         </div>
         
    </div> 