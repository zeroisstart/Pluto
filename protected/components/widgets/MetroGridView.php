<?php
Yii::import ( 'zii.widgets.grid.CGridView' );
class MetroGridView extends \CGridView {
	
	public $pager=array('class'=>'components.widgets.MetroLinkPager');
	
	/**
	 *
	 * @var string
	 */
	public $itemsCssClass = 'bordered';
	
	/**
	 *
	 * @var string
	 */
	public $pagerCssClass = 'pagination';
	
	
	
}