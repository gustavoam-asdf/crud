<?php

namespace App\Controllers;

use App\Entities\ProductModel;
use App\Services\ProductService;
use Database\MySQL;

class ProductController {

	private ProductService $service;

	public function __construct( MySQL $mysql ) {
		$this->service = new ProductService( $mysql );
	}

	public function getAll() {
		$products = $this->service->getAll();
		return $products;
	}

	public function createOne() {
		require __DIR__ . '/getRequestBody.php';
		header( 'Content-Type: application/json' );
		$data    = getRequestBody();
		$product = new ProductModel(
			0,
			$data['name'],
			$data['description'],
			$data['price'],
			$data['imageUrl']
		);

		$status = $this->service->createOne( $product );

		http_response_code( $status ? 200 : 500 );
		echo json_encode(
			array(
				'ok'     => $status,
				'status' => $status ? 'success' : 'failed',
				'action' => 'create',
			)
		);
	}

	public function updateOne() {
		require __DIR__ . '/getRequestBody.php';
		header( 'Content-Type: application/json' );
		$data    = getRequestBody();
		$product = new ProductModel(
			$data['id'],
			$data['name'],
			$data['description'],
			$data['price'],
			$data['imageUrl']
		);

		$status = $this->service->updateOne( $product );

		http_response_code( $status ? 200 : 500 );
		echo json_encode(
			array(
				'ok'     => $status,
				'status' => $status ? 'success' : 'failed',
				'action' => 'update',
			)
		);
	}

	public function deleteOne() {
		require __DIR__ . '/getRequestBody.php';
		header( 'Content-Type: application/json' );
		$data = getRequestBody();

		$status = $this->service->deleteOne( $data['productId'] );

		http_response_code( $status ? 200 : 500 );
		echo json_encode(
			array(
				'ok'     => $status,
				'status' => $status ? 'success' : 'failed',
				'action' => 'delete',
			)
		);
	}
}
