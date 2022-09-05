<?php

class UtilityService extends Service{

use PriceUtilities;
use TaxTools
{
	TaxTools::calculateTax insteadof PriceUtilities;
	//page 99 to 100
	PriceUtilities::calculateTax as basicTax;
}
}
