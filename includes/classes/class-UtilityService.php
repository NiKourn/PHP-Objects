<?php

class UtilityService extends Service{

use PriceUtilities;
use TaxTools
{
	TaxTools::calculateTax insteadof PriceUtilities;
}
}
