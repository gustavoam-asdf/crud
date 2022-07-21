<?php
require '../../../vendor/autoload.php';

use App\Entities\Product;

if ($_SERVER['REQUEST_METHOD'] === "POST") {
	$product = new Product(
		$_POST['product-id'],
		$_POST['product-name'],
		$_POST['product-description'],
		$_POST['product-price'],
		$_POST['product-url']
	);
	http_response_code(200);
	echo json_encode('{
		"message": "updated",
		"product": ' . json_encode($product) . '
	}');
}
