<?php
/**
 * 
 * @author Top
 *
 */
class DTInput extends CWidget {
	
	/**
	 * 模板
	 *
	 * @var string
	 */
	public $ConnectionTpl = '<div class="input-control select">{data}</div>';
	public $DatabaseTpl = '<div class="input-control select" id="table-droplist">{data}</div>';
	
	/**
	 *
	 * @var string
	 */
	public $enableDatabae = false;
	/**
	 *
	 * @var string
	 */
	public $enableConnection = false;
	/**
	 * (non-PHPdoc)
	 *
	 * @see CWidget::init()
	 */
	public function init() {
		$this->registerClientScript ();
	}
	/**
	 * (non-PHPdoc)
	 *
	 * @see CWidget::run()
	 */
	public function run() {
		$html = '';
		
		if ($this->enableConnection) {
			$Model = MysqlAccount::model ();
			$connections = $Model->getAllConnections ();
			$html .= str_replace ( '{data}', CHtml::dropDownList ( 'connection', Yii::app ()->request->getParam ( 'connection' ), $connections ), $this->ConnectionTpl );
		}
		
		if ($this->enableDatabae) {
			$dbCommand = Yii::app ()->db->createCommand ( "show databases" );
			$dbs = $dbCommand->queryAll ();
			
			$ary_db = array ();
			foreach ( $dbs as $key => $val ) {
				$ary_db [reset ( $val )] = reset ( $val );
			}
			$html .= str_replace ( '{data}', CHtml::dropDownList ( 'database', Yii::app ()->request->getParam ( 'database' ), $ary_db ), $this->DatabaseTpl );
		}
		
		echo $html;
	}
	/**
	 * 注册js文件
	 */
	public function registerClientScript() {
		$cs = Yii::app ()->clientScript;
		$cs->registerScriptFile ( Yii::app ()->baseUrl . '/js/tool/DTInput.js', ClientScript::POS_END );
	}
}