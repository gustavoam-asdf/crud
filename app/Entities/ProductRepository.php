<?php

namespace App\Entities;

use Database\MySQL;

class ProductRepository {

	private MySQL $mysql;

	public function __construct( MySQL $mysql ) {
		$this->mysql = $mysql;
	}

	public function getAll() {
		$productsData = $this
			->mysql
			->query( 'SELECT id, name, description, price, image_url FROM product' )
			->fetch_all();

		$products = array_map(
			fn ( $productData ): ProductModel => new ProductModel(
				$productData[0],
				$productData[1],
				$productData[2],
				$productData[3],
				$productData[4],
			),
			$productsData
		);
		return $products;
	}

	public function create( ProductModel $p ) {
		$query = $this
			->mysql
			->prepare(
				'INSERT INTO product (
					create_time, 
					update_time,
					name,
					description,
					price,
					image_url
				)
				VALUES (
					now(),
					now(),
					?,
					?,
					?,
					?
				)'
			);
		$query->bind_param( 'ssds', $p->name, $p->description, $p->price, $p->imageUrl );
		return $query->execute();
	}

	public function update( ProductModel $p ) {
		$query = $this
			->mysql
			->prepare(
				'UPDATE product 
				SET 
					update_time = now(),
					name = ?, 
					description = ?, 
					price = ?, 
					image_url = ?
				WHERE id = ?'
			);
		$query->bind_param( 'ssdsi', $p->name, $p->description, $p->price, $p->imageUrl, $p->id );
		return $query->execute();
	}

	public function delete( int $productId ) {
		$query = $this
			->mysql
			->prepare( 'DELETE FROM product WHERE id = ?' );
		$query->bind_param( 'i', $productId );
		return $query->execute();
	}
}
