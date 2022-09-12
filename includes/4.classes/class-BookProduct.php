<?php

class BookProduct extends ShopProduct {
	//using Legacy constructor signature for training
	
	/**
	 * @var int
	 */
	private int $numPages;
	
	/**
	 * @param string $title
	 * @param string $firstName
	 * @param string $mainName
	 * @param float|int $price
	 * @param int $numPages
	 */
	public function __construct( int $numPages = 10 ) {
		parent::__construct();
		$this->numPages = $numPages;
	}
	
	public function getParentDefaults() {
		parent::getSummaryLine();
	}
	
	/**
	 * @return int
	 */
	public function getNumberOfPages(): int {
		return $this->numPages;
	}
	
	/**
	 * @return string
	 */
	public function getSummaryLine(): string {
		$base = parent::getSummaryLine();
		$base .= ": page count - $this->numPages";
		
		return $base;
	}
}