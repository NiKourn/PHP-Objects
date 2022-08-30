<?php

class TextProductWriter extends ShopProductWriter {
	
	public function write(): void {
		$str = "Products: \n";
		foreach ($this->products as $shopProduct){
			$str .= $shopProduct->getSummaryLine() . "\n";
		}
		print $str;
	}
}
