<?php

abstract class ShopProductWriter {
	
	protected array $products = [];
	
	/**
	 * @param ShopProduct $shopProduct
	 *
	 * @return void
	 */
	public function addProducts( ShopProduct $shopProduct ) {
		$this->products[] = $shopProduct;
	}
	
	public function getProducts(){
		return $this->products;
	}
	
	abstract public function write(): void;
}
