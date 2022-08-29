<?php

class BookProduct extends ShopProduct {
	//using Legacy constructor signature for training
	
	/**
	 * @var int
	 */
	private int $numpages;
	
	/**
	 * @param string $title
	 * @param string $firstName
	 * @param string $mainName
	 * @param float|int $price
	 * @param int $numpages
	 */
	public function __construct( string $title, string $firstName, string $mainName, float|int $price, int $numpages ) {
		parent::__construct( $title, $firstName, $mainName, $price );
		$this->numpages = $numpages;
	}
	
	public function getNumberOfPages(): int {
		return $this->numpages;
	}
	
	public function getSummaryLine(): string {
		$base = parent::getSummaryLine();
		$base .= ": page count - $this->numpages";
		
		return $base;
	}
}

new BookProduct;
