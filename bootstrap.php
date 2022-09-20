<?php
// bootstrap.php
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

require_once "vendor/autoload.php";

// Create a simple "default" Doctrine ORM configuration for Annotations
$isDevMode = true;
$proxyDir = null;
$cache = null;
$paths = array(__DIR__."/src");
$useSimpleAnnotationReader = false;
$config = ORMSetup::createAnnotationMetadataConfiguration($paths, $isDevMode, $proxyDir, $cache, $useSimpleAnnotationReader);
// or if you prefer YAML or XML
// $config = ORMSetup::createXMLMetadataConfiguration(array(__DIR__."/config/xml"), $isDevMode);
// $config = ORMSetup::createYAMLMetadataConfiguration(array(__DIR__."/config/yaml"), $isDevMode);

// database configuration parameters
$conn = array(
	'host' => 'localhost',
	'port' => '3306',
	'user' => 'root',
	'password' => '',
	'dbname' => 'doc_db',
	'charset' => 'UTF8',
	'driver' => 'pdo_mysql',
	'path' => __DIR__ . '/db.sqlite',
);

// obtaining the entity manager
$entityManager = EntityManager::create($conn, $config);