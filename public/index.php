<?php

require '../vendor/autoload.php';
require '../config/env.php';

use App\Entities\ProductRepository;
use App\Entities\MySQL;

$mysql = new MySQL;
$mysql->connect($host, $username, $password, $database, $port);

$productRepository = new ProductRepository($mysql);

$products = $productRepository->getAll();

include '../resources/views/lists.php';
