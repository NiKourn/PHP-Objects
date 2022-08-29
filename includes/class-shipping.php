<?php

class Shipping implements Chargeable{
	
	public function __construct(private int|float $price){}
	
	public function getPrice():float|int{
		return $this->price;
	}
}
