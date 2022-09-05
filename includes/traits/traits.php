<?php

trait PriceUtilities {
	
	private int $taxrate = 20;
	
	public function calculateTax( float $price ): float {
		return ( ( $this->taxrate / 100 ) * $price );
	}
	//other Utilities
	
}

trait IdentityTrait {
	
	/**
	 * @return string
	 */
	public function generateId(): string {
		return uniqid( '', true );
	}
	
}

trait TaxTools{
	
	/**
	 * @param float $price
	 *
	 * @return int
	 */
	public function calculateTax(float $price):int {
		return 222;
	}
	
}