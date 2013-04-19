<?php
class MetroLinkPager extends \CLinkPager {
	public $previousPageCssClass = 'prev';
	public $selectedPageCssClass = 'active';
	public $internalPageCssClass = '';
	
	/**
	 * @var string the text label for the next page button. Defaults to 'Next &gt;'.
	 */
	public $nextPageLabel =  '';
	/**
	 * @var string the text label for the previous page button. Defaults to '&lt; Previous'.
	 */
	public $prevPageLabel = '';
	/**
	 * @var string the text label for the first page button. Defaults to '&lt;&lt; First'.
	 */
	public $firstPageLabel = '';
	/**
	 * @var string the text label for the last page button. Defaults to 'Last &gt;&gt;'.
	 */
	public $lastPageLabel = '';
	/**
	 * Initializes the pager by setting some default property values.
	 */
	public function init() {
		if (! isset ( $this->htmlOptions ['id'] ))
			$this->htmlOptions ['id'] = $this->getId ();
		if (! isset ( $this->htmlOptions ['class'] ))
			;
		// $this->htmlOptions['class']='yiiPager';
	}
}

