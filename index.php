<?php

//Using property promotion as of PHP 8.0
//Maybe train a bit using the standard __construct method. OK
echo 'Start Program: ' . memory_get_usage() . '<br>';

//load trait
include_once 'includes/trait-PriceUtilities.php';
// interface Chargeable ()
include_once 'includes/interface-Chargeable.php';
//class parent ShopProduct
include_once 'includes/class-ShopProduct.php';
echo 'Memory half scripts loaded: ' . memory_get_usage() . '<br>';

//class Child BookProduct
include_once 'includes/class-BookProduct.php';
//class CdProduct
include_once 'includes/class-CdProduct.php';
//abstract ShopProductWriter
include_once 'includes/abstract-class-ShopProductWriter.php';
//class XmlProducerWriter
include_once 'includes/class-XmlProducerWriter.php';
//class TextProductWriter
include_once 'includes/class-TextProductWriter.php';

echo 'Memory usage after scripts loaded: ' . memory_get_usage() . '<br>';

// not instantiating because it's an abstract class
//$ShopProductWriter = new ShopProductWriter();


$shopProduct = new ShopProduct();
//echo '<pre>' . print_r($shopProduct, true) . '</pre>';

echo 'Memory after $shopProduct instantiated: ' . memory_get_usage() . '<br>';


$textProduct = new TextProductWriter();
$textProduct->addProducts( $shopProduct );
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
echo 'Tax Calculation: ' . $book_product->calculateTax(100);
echo '<br>';
// child of ShopProduct -> BookProduct is using parents trait method generateId()
echo 'Unique ID: ' . $book_product->generateId();


$cdproduct = new CdProduct( 'title', 'namefirst', 'lastname', 25, 60 );


echo $cdproduct->cdInfo( $shopProduct );

echo '<br> Memory usage end Script: ' . memory_get_usage() . '<br>';





