<html>
<head>
	<title>PHP Testing - Object, Patterns & Practice</title>
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>

<?php
$css_line = "<div style='width:100%;border-bottom:1px solid black;height:3px;margin:15px 0'></div>";


//Using property promotion as of PHP 8.0
//Maybe train a bit using the standard __construct method. OK
echo 'Start Program: ' . memory_get_usage() . '<br>';

//Loads all traits, interfaces, abstracts, classes, functions
include_once 'includes/loader-class.php';

echo '<pre>' . print_r(get_included_files(), true) . '</pre>';
echo "<body><div style=''><div class='container p-2' style='width:1100px;margin:0 auto;'>";

echo '<h3>Includes Order</h3>';
echo '1.Interfaces (Can\'t instantiate, implements classes and can combine with traits) <br>';
echo '2.Traits (Used inside classes, basically methods that `included` in a class use with use)<br>';
echo '3.Abstracts (Can\'t instantiate, uses extend like parents but abstract methods must be the exact same as type and names as methods in child theme)<br>';
echo '4.Classes <br><br>';


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

echo '<pre>' . print_r(glob('includes/*', GLOB_ONLYDIR ), true) . '</pre>';


echo '<br> Memory usage end Script: ' . memory_get_usage() . '<br>';
unset( $cdproduct, $book_product, $xml, $textProduct, $shopProduct );
echo '<br> Memory usage after Unset: ' . memory_get_usage() . '<br>';
?>
</div>
</div>
</body>
</html>