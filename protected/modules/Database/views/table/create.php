<?php
if(isset($args))
extract ( $args );

?>

<div class="grid_form">

	<?php $this -> widget('widget.Tool.DTInput',array('enableDatabae'=>true,'enableConnection'=>true));?>

	
	<h2>表名称</h2>
	<div class="input-control text">
		<input type="text" name="table_name" placeholder="Enter Table Name!"/>
		<button class="helper" onclick="return false" tabindex="-1" type="button"></button>
	</div>
	
</div>

