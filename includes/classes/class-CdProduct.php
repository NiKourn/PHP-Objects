<?php

class CdProduct extends ShopProduct {
	
	/**
	 * @param string $title
	 * @param string $firstname
	 * @param string $mainname
	 * @param float|int $price
	 * @param int $playlength
	 */
	public function __construct( string $title, string $firstname, string $mainname, float|int $price, private int $playlength ) {
		parent::__construct(
			$title, $firstname, $mainname, $price
		);
	}
	
	/**
	 * @return int
	 */
	public function getPlayLength(): int {
		return $this->playlength;
	}
	
	/**
	 * @return string
	 */
	public function getSummaryLine(): string {
		$base = parent::getSummaryLine();
		$base .= ": playing time - {$this->playlength}";
		
		return $base;
	}
	
	/**
	 * @param Chargeable $prod
	 *
	 * @return void
	 */
	public function cdInfo( Chargeable $prod ) {
		//$length = $prod->getPlayLength();
		$length = $prod->getPrice();
		echo $length;
	}
	
}