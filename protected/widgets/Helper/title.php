<?php
/**
 * 
 * @author Top
 *
 */
class title extends CWidget {
	
	/**
	 *
	 * @var string
	 */
	public $h1;
	
	/**
	 *
	 * @var string
	 */
	public $small;
	
	/**
	 * (non-PHPdoc)
	 *
	 * @see CWidget::init()
	 */
	public function init() {
		;
	}
	/**
	 * (non-PHPdoc)
	 *
	 * @see CWidget::run()
	 */
	public function run() {
		$ref = Yii::app ()->request->UrlReferrer;
		$h1 = $this->h1;
		$small = $this->small;
		echo <<< EOT
	<div class="page-header">
		<div class="page-header-content">
			<h1>Database<small>tool</small></h1>
			<a href="$ref" class="back-button big page-back"></a>
		</div>
	</div>
		
EOT;
		;
	}
}