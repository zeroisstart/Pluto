<?php

class SimpleForm extends CWidget {
	
	public $action = '';
	
	public $method = 'POST';
	
	public $options = array ();
	
	/**
	 * (non-PHPdoc)
	 *
	 * @see CWidget::init()
	 */
	public function init() {
		
	}
	
	public function initClientScript(){
		$cs = Yii::app() -> clientScript;
		$cs -> registerScript('footer',"
				$('document').ready(function(){
					$('.simpleForm > .helper').click(function(){
						$('.with-helper').empty();
					})	
				})
				",CClientScript::POS_END);
	}
	
	/**
	 * (non-PHPdoc)
	 *
	 * @see CWidget::run()
	 */
	public function run() {
		echo "<span class='simpleForm'>";
		echo CHtml::beginForm ( $this->action, $this->method, $this->options );
		
		echo <<<EOT
		<div class="input-control text">
	          <input type="text" name="text" class="with-helper" placeholder="Input Somethings">
	          <button class="helper" tabindex="-1" type="button"></button>
	          <button class="standart default submit" type="submit">Submit</button>
	    </div>	
EOT;
		echo CHtml::endForm ();
		echo "</span>";
	}
}