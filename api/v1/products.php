<?php

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../config/env.php';

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

$productController = new ProductController( $mysql );

if ( 'PUT' === $_SERVER['REQUEST_METHOD'] ) {
	$productController->updateOne();
}


if ( 'POST' === $_SERVER['REQUEST_METHOD'] ) {
	$productController->createOne();
}

if ( 'DELETE' === $_SERVER['REQUEST_METHOD'] ) {
	$productController->deleteOne();
}
