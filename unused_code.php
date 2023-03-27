<?php
echo 'Memory usage after scripts loaded: ' . memory_get_usage() . '<br>';

// not instantiating because it's an abstract class
//$ShopProductWriter = new ShopProductWriter();


$shopProduct = new ShopProduct();
//echo '<pre>' . print_r($shopProduct, true) . '</pre>';

echo 'Memory after $shopProduct instantiated: ' . memory_get_usage() . '<br>';


$textProduct = new TextProductWriter();

//property holding class ShopProduct
$textProduct->addProducts( $shopProduct );
echo '<pre>$textProduct->getProducts(): ' . print_r( $textProduct->getProducts(), true ) . '</pre><br><br>';
$textProduct->write();
echo '<pre>' . print_r( $shopProduct, true ) . '</pre>';

$xml = new XmlProducerWriter();
//addProducts belong to abstract class ShopProductWriter, so we can call it from its child
$xml->addProducts( $shopProduct );
$xml->write();


//$product = new ShopProduct();

$book_product = new BookProduct();

//$product->setDiscount(2);

//echo $product->getSummaryLine();
//echo '<pre>' . print_r($book_product, true) . '</pre>';
echo $book_product->getProducerMainName();
echo '<br>';

$book_product->setDiscount( 10 );

echo $book_product->getPrice();
echo '<br>';
echo $book_product->getDiscount();
echo '<br>';
// child of ShopProduct -> BookProduct is using parents trait method calculateTax()
echo 'Tax Calculation from PriceUtilities trait: ' . $book_product->calculateTax( 100 );
echo '<br>';
// child of ShopProduct -> BookProduct is using parents trait method generateId()
echo 'Unique ID from Identitytrait trait: ' . $book_product->generateId();
echo $css_line;


$cdproduct = new CdProduct( 'title', 'namefirst', 'lastname', 25, 60 );
echo $cdproduct->cdInfo( $shopProduct );


//seeing which object you can pass
function storeIdentityObject( $book_product ) {
	echo '<pre>' . print_r( $book_product, true ) . '</pre>';
}

echo storeIdentityObject( $book_product );
echo $book_product->getParentDefaults();
echo $css_line;


$utilityservice = new UtilityService();
echo '<h5>Page 98, UtilityService: </h5>' . $utilityservice->calculateTax( 100 );
echo $css_line;
print $utilityservice->calculateTax( 100 ) . '<br>';
//call from a trait
print $utilityservice->basicTax( 100 );

echo line_color_change( 'red' );
//call from a static method in Traits
print 'call from a static method in Traits: ' . UtilityService::basicTax( 100 );

echo line_color_change( 'green' );


echo '<pre>' . print_r(scandir('includes/classes'), true) . '</pre>';


echo '<br> Memory usage end Script: ' . memory_get_usage() . '<br>';
unset( $cdproduct, $book_product, $xml, $textProduct, $shopProduct );
echo '<br> Memory usage after Unset: ' . memory_get_usage() . '<br>';