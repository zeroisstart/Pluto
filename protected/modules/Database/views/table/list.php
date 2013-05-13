<?php
extract ( $args );
$count = count ( $tables );
$_css = array ('css/top.css');
$_js =array('js/tool.trigger/tables.options.js');// array ('js/tool/jquery.flip.js','js/tool.trigger/flip.js' );

$this->widget ( 'widget.ClientScript.autoRegisterFile', array ('css' => $_css, 'js' => $_js ) );
?>
<div class="grid_form">

	<?php $this -> widget('widget.Tool.DTInput',array('enableDatabae'=>true,'enableConnection'=>true));?>
	
	<span class="table_options_btns">
		<button class="default">Insert 8 Times</button>
		<button class="default">Insert 4 Times</button>
		<button class="default">Insert 2 Times</button>
	</span>
	
	<table class="hovered bordered">
		<tbody>
			<?php for($i = 0;$i< $count;$i++):?>
				<?php if($i%3 == 0):?>
				</tr>
			<tr>
				<?php endif;?>
				<td><div class="td_tablename"><a href="javascript:void(0);" title="<?php echo reset($tables[$i])?>"><?php echo mb_substr(reset($tables[$i]), 0,20)?></a></div></td>
			<?php endfor;?>
		
		</tbody>
		<tfoot></tfoot>
	</table>

</div>

