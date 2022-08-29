<?php

//Using property promotion as of PHP 8.0
//Maybe train a bit using the standar __construct method.


include_once 'includes/class-ShopProduct.php';

$product = new ShopProduct();

$product->setDiscount(2);

