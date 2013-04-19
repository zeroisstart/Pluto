<?php
class navigation extends CWidget {
	
	/**
	 * metro UI 的发布路径
	 *
	 * @var string
	 */
	public $metroAssets = null;
	
	/**
	 * (non-PHPdoc)
	 *
	 * @see CWidget::init()
	 */
	public function init() {
	}
	/**
	 * (non-PHPdoc)
	 *
	 * @see CWidget::run()
	 */
	public function run() {
		$this->render ( 'views._widgets.system.navigation', array (
				'assets' => $this->metroAssets 
		) );
	}
}