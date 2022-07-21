<?php

require __DIR__ . '/../vendor/autoload.php';
require __DIR__ . '/../config/env.php';

use App\Entities\ProductRepository;
use Database\MySQL;

$mysql = new MySQL;
$mysql->connect(
	$_ENV['DB_HOST'],
	$_ENV['DB_USERNAME'],
	$_ENV['DB_PASSWORD'],
	$_ENV['DB_DATABASE'],
	$_ENV['DB_PORT']
);

$productRepository = new ProductRepository($mysql);

$products = $productRepository->getAll();

include '../resources/views/lists.php';
