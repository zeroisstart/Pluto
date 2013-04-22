<?php
extract ( $args );
$count = count ( $tables );
?>

<div class="grid_form">
	<div class="input-control select">
	<?php
	echo CHtml::dropDownList ( 'connection', Yii::app ()->request->getParam ( 'connection' ), $connections );
	
	?>
	</div>

	<div class="input-control select" id="table-droplist">
	<?php
	echo CHtml::dropDownList ( 'database', Yii::app ()->request->getParam ( 'database' ), $dbs );
	?>
	</div>

	<table class="hovered bordered">
		<tbody>
			<?php for($i = 0;$i< $count;$i++):?>
				<?php if($i%3 == 0):?>
				</tr>
			<tr>
				<?php endif;?>
				<td><?php echo reset($tables[$i])?></td>
			<?php endfor;?>
		
		
		
		
		</tbody>
		<tfoot></tfoot>
	</table>

</div>

<script type="text/javascript">
	$(document).ready(function(){
		$("#connection").change(function(){
			var _id = $(this).val();
			var _opt = {};
			var _url = '<?php echo $this -> createUrl('/Database/Db/ajaxDbName')?>'
			var _data = {};
			_data.id =_id;
			_opt.data = _data;
			_opt.async = false;
			_opt.type = 'POST';
			_opt.url=_url;
			_opt.success  =function(res){
				$("#table-droplist").html(res);
			}
			$.ajax(_opt);
		})
	})
</script>