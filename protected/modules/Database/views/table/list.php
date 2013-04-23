<?php
extract ( $args );
$count = count ( $tables );
?>

<div class="grid_form">

	<?php $this -> widget('widget.Tool.DTInput',array('enableDatabae'=>true,'enableConnection'=>true));?>

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

