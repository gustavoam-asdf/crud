<?php

require __DIR__ . '/../../vendor/autoload.php';
require __DIR__ . '/../../config/env.php';

use App\Entities\ProductRepository;
use App\Entities\Product;
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

function getRequestBody()
{
	$raw_data = file_get_contents('php://input');
	return json_decode($raw_data, true);
}

if ($_SERVER['REQUEST_METHOD'] === "PUT") {
	header('Content-Type: application/json');
	$_PUT = getRequestBody();
	$product = new Product(
		$_PUT['id'],
		$_PUT['name'],
		$_PUT['description'],
		$_PUT['price'],
		$_PUT['imageUrl']
	);

	$status = $productRepository->update($product);

	http_response_code($status ? 200 : 500);
	echo json_encode([
		'ok' => $status,
		'status' => $status ? 'success' : 'failed',
		'action' => 'update'
	]);
}


if ($_SERVER['REQUEST_METHOD'] === "POST") {
	header('Content-Type: application/json');
	$_POST = getRequestBody();
	$product = new Product(
		0,
		$_POST['name'],
		$_POST['description'],
		$_POST['price'],
		$_POST['imageUrl']
	);

	$status = $productRepository->create($product);

	http_response_code($status ? 200 : 500);
	echo json_encode([
		'ok' => $status,
		'status' => $status ? 'success' : 'failed',
		'action' => 'create'
	]);
}

if ($_SERVER['REQUEST_METHOD'] === "DELETE") {
	header('Content-Type: application/json');
	$_POST = getRequestBody();

	$status = $productRepository->delete($_POST['productId']);

	http_response_code($status ? 200 : 500);
	echo json_encode([
		'ok' => $status,
		'status' => $status ? 'success' : 'failed',
		'action' => 'delete'
	]);
}
