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
	public function __construct( string $title = '' , string $firstName = 'Fotis', string $mainName = 'Kourniotis', float|int $price = 1, int $numPages =12 ) {
		parent::__construct( $title, $firstName, $mainName, $price );
		$this->numPages = $numPages;
	}
	
	public function getParentDefaults(){
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
