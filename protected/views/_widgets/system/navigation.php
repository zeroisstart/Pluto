<div class="page">
	<div class="nav-bar">
		<div class="nav-bar-inner padding10">
			<span class="pull-menu"></span> <a
				href="<?php echo Yii::app() -> baseUrl;?>"> <span
				class="element brand"> <img class="place-left"
					src="<?php echo $assets;?>/images/logo32.png" style="height: 20px" />
			</span>
			</a>

			<div class="divider"></div>
<?php
$this->widget ( 'zii.widgets.CMenu', array (
		'htmlOptions' => array (
				'class' => 'menu' 
		),
		'items' => array (
				array (
						'label' => 'Home',
						'url' => array (
								'/Home/main/index' 
						) 
				),
				array (
						'label' => 'Tool',
						'url' => array (
								'/Tool/main/main' 
						) 
				),
				array (
						'label' => 'Content',
						'itemOptions' => array (
								'data-role' => "dropdown" 
						),
						'linkOptions' => array (
								'href' => '#' 
						),
						'url' => '',
						'submenuOptions' => array (
								'class' => 'dropdown-menu' 
						),
						'items' => array (
								array (
										'label' => 'Bookmarks',
										'url' => array (
												'/Content/Bookmark/list' 
										) 
								),array (
										'label' => 'Commit Log',
										'url' => array (
												'/Content/CommitLog/list' 
										) 
								),
								array(
										'label'=>'Color',
										'url'=>array(
												'/Content/color/list'
									)
								) ,
									array(
											'label'=>'Site Link',
											'url'=>array(
											'/Content/Sitelink/list'
									)
								),array(
											'label'=>'Commands',
											'url'=>array(
											'/Content/commands/list'
									)
								)
						) 
				),
				array (
						'label' => 'Hack',
						'itemOptions' => array (
								'data-role' => "dropdown" 
						),
						'linkOptions' => array (
								'href' => '#' 
						),
						'url' => '',
						'submenuOptions' => array (
								'class' => 'dropdown-menu' 
						),
						'items' => array (
								array (
										'label' => 'exploit',
										'url' => array (
												'/Hack/exploit/main' 
										) 
								) 
						) 
				),
				array (
						'label' => 'DataBase',
						'url' => array (
								'/Database/main/main'
						)
				),
				array (
						'label' => 'Example',
						'url' => array (
								'/Example/main/main' 
						) 
				),
				array (
						'label' => 'Source',
						'url' => array (
								'/Source/main/main' 
						) 
				),
				
				array (
						'label' => 'Api',
						'url' => array (
								'/Api/main/main' 
						) 
				),array (
						'label' => 'Test',
						'url' => array (
								'/Test/main/main' 
						) 
				)
		) 
) );
?>
<?php if(0):?>
        <ul class="menu" style="display: none;">
				<li><a href="/">Home</a></li>
				<li data-role="dropdown"><a href="#">Scaffolding</a>
					<ul class="dropdown-menu">
						<li><a href="global.php">Global styles</a></li>
						<li><a href="layout.php">Layouts and templates</a></li>
						<li><a href="grid.php">Grid system</a></li>
						<li class="divider"></li>
						<li><a href="responsive.php">Responsive design</a></li>
					</ul></li>
				<li data-role="dropdown"><a href="#">Base CSS</a>
					<ul class="dropdown-menu">
						<li><a href="typography.php">Typography</a></li>
						<li><a href="tables.php">Tables</a></li>
						<li><a href="forms.php">Forms</a></li>
						<li><a href="buttons.php">Buttons</a></li>
						<li><a href="images.php">Images</a></li>
						<li class="divider"></li>
						<li><a href="icons.php">Icons</a></li>
					</ul></li>
				<li data-role="dropdown"><a href="#">Components</a>
					<ul class="dropdown-menu">
						<li><a href="tiles.php">Tiles</a></li>
						<li><a href="menus.php">Menu and Navigation</a></li>
						<li><a href="sidebar.php">Sidebar</a></li>
						<li><a href="pagecontrol.php">Page control</a></li>
						<li><a href="accordion.php">Accordion</a></li>
						<li><a href="buttons-set.php">Buttons set</a></li>
						<li><a href="rating.php">Rating</a></li>
						<li><a href="progress.php">Progress bars</a></li>
						<li><a href="carousel.php">Carousel</a></li>
						<li><a href="listview.php">List view</a></li>
						<li><a href="slider.php">Slider</a></li>
						<li><a href="dialog.php">Dialog box</a></li>
						<li><a href="calendar.php">Calendar</a></li>
						<li class="divider"></li>
						<li><a href="notices.php">Notices and Replies</a></li>
						<li class="divider"></li>
						<li><a href="cards.php">Bonus - Deck of Cards</a></li>
					</ul></li>
				<li><a href="https://github.com/olton/Metro-UI-CSS">Source</a></li>
			</ul>
<?php endif;?>
		</div>
	</div>
</div>
