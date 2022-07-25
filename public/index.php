<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/env.php';

use Database\MySQL;
use App\Controllers\ProductController;

$mysql = new MySQL();
$mysql->connect(
	$_ENV['DB_HOST'],
	$_ENV['DB_USERNAME'],
	$_ENV['DB_PASSWORD'],
	$_ENV['DB_DATABASE'],
	$_ENV['DB_PORT']
);

$productRepository = new ProductController( $mysql );

$products = $productRepository->getAll();

require '../resources/views/lists.php';
