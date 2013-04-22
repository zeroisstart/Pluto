<div class="page-sidebar">
	<ul>
		<li><a>Host</a>
			<ul class="sub-menu">
				<li><a
					href="<?php echo $this -> createUrl('/Database/Host/list');?>">List</a></li>
			</ul></li>
		<li><a>Tools</a>
			<ul class="sub-menu">
			<?php
			$ary_tools = array (
					'Table List' => '/Database/Table/list',
					'Table Create' => '/Database/Table/create',
			);
			foreach ( $ary_tools as $key => $val ) :
				?>
				<li><a href="<?php echo $this -> createUrl($val);?>"><?php echo $key;?></a></li>
			<?php endforeach;?>
			</ul></li>
			
		<?php
		$ary_colorful = array ();
		foreach ( $ary_colorful as $key => $val ) :
			?>
		<li class="sticker sticker-color-orange"><a
			href="<?php echo $this -> createUrl($val);?>"><i class="icon-cart"></i><?php echo $key?></a>
		</li>
		<?php endforeach;?>
		
		<li class="sticker sticker-color-pink dropdown active"
			data-role="dropdown"><a><i class="icon-list"></i> To Do </a>
			<ul class="sub-menu light sidebar-dropdown-menu open">
				<li><a href="">Today</a></li>
				<li><a href="">To Do List</a></li>
				<li><a href="">To Do after work</a></li>
				<li><a href="">Movies to watch</a></li>
			</ul></li>
	</ul>
</div>