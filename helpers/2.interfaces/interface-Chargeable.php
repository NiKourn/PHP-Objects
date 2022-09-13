<?php

interface Chargeable {
	
	/**
	 * @return int|float
	 */
	public function getPrice(): int|float;
	
}
