<?php

namespace App\Controllers;

use App\Entities\ApiResponseModel;
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

		$res = new ApiResponseModel( $status, 'create' );
		$res->toJson();
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

		$res = new ApiResponseModel( $status, 'update' );
		$res->toJson();
	}

	public function deleteOne() {
		require __DIR__ . '/getRequestBody.php';
		header( 'Content-Type: application/json' );
		$data = getRequestBody();

		$status = $this->service->deleteOne( $data['productId'] );

		$res = new ApiResponseModel( $status, 'delete' );
		$res->toJson();
	}
}
