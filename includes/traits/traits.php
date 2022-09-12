<?php

trait PriceUtilities {
	
	//declared static later p.101
	private static int $taxrate = 20;
	
	//declared static later p.101
	
	public static function calculateTax( float $price ): float {
		return ( ( self::$taxrate / 100 ) * $price );
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