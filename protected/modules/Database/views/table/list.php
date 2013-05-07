<?php
extract ( $args );
$count = count ( $tables );
$_css = array ('css/top.css');
$_js =array();// array ('js/tool/jquery.flip.js','js/tool.trigger/flip.js' );

$this->widget ( 'widget.ClientScript.autoRegisterFile', array ('css' => $_css, 'js' => $_js ) );
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
				<td><div class="td_tablename"><?php echo reset($tables[$i])?></div></td>
			<?php endfor;?>
		
		
		</tbody>
		<tfoot></tfoot>
	</table>

</div>

