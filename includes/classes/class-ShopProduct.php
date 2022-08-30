<?php

class ShopProduct implements Chargeable, IdentityObject {
	
	/**
	 * @var int|float
	 */
	private int|float $discount = 0;
	
	/**
	 * Constructor
	 * @param string $title
	 * @param string $producerFirstName
	 * @param string $producerMainName
	 * @param int|float $price
	 */
	public function __construct(
		private string $title = 'My Shop',
		private string $producerFirstName = 'Nikolaos',
		private string $producerMainName = 'Kourniotis',
		protected int|float $price = 35
	) {
	}
	
	/**
	 * get Producer's first name
	 * @return string
	 */
	public function getProducerFirstName(): string {
		return $this->producerFirstName;
	}
	
	/**
	 * @return string
	 */
	public function getProducerMainName(): string {
		return $this->producerMainName;
	}
	
	public function setDiscount( int|float $num ) {
		$this->discount = $num;
	}
	
	/**
	 * @return float|int
	 */
	public function getDiscount(): float|int {
		return $this->discount;
	}
	
	/**
	 * @return string
	 */
	public function getTitle(): string {
		return $this->title;
	}
	
	/**
	 * @return float|int
	 */
	public function getPrice(): float|int {
		return ( $this->price - $this->discount );
	}
	
	/**
	 * @return string
	 */
	public function getProducer(): string {
		return $this->producerFirstName . ' ' . $this->producerMainName;
	}
	
	/**
	 * @return string
	 */
	public function getSummaryLine(): string {
		$base = "{$this->title} ( {$this->producerMainName}, ";
		$base .= "{$this->producerFirstName} )";
		
		return $base;
	}
	
	use PriceUtilities;
	use IdentityTrait;
	
}