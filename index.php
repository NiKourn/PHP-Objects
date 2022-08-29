<?php

//Using property promotion as of PHP 8.0
//Maybe train a bit using the standar __construct method.


include_once 'includes/class-ShopProduct.php';
include_once 'includes/class-BookProduct.php';

$product = new ShopProduct();

$book_product = new BookProduct();

$product->setDiscount(2);

//echo $product->getSummaryLine();

$book_product->numpages = 32;

echo $book_product->getNumberOfPages();

echo $book_product->getSummaryLine();

