<?php

class ShopProduct {
	
	/**
	 * @var int|float
	 */
	private int|float $discount = 0;
	
	/**
	 * @param string $title
	 * @param string $producerFirstName
	 * @param string $producerMainName
	 * @param int|float $price
	 */
	public function __construct(
		private string $title = '',
		private string $producerFirstName = '',
		private string $producerMainName = '',
		protected int|float $price = 0
	) {
	}
	
	/**
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
	
	public function getSummaryLine(): string {
		$base = "{$this->title} ( {$this->producerMainName}, ";
		$base .= "{$this->producerMainName}";
		
		return $base;
	}
	
}

new ShopProduct();