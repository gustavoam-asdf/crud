<?php

namespace App\Entities;

use App\Entities\MySQL;

class ProductRepository
{
	private MySQL $mysql;

	public function __construct(MySQL $mysql)
	{
		$this->mysql = $mysql;
	}

	public function getAll()
	{
		$products_data =
			$this
			->mysql
			->query("SELECT id, name, description, price FROM product")
			->fetch_all();

		$products = array_map(
			fn ($product_data): Product => new Product(
				$product_data[0],
				$product_data[1],
				$product_data[2],
				$product_data[3]
			),
			$products_data
		);
		return $products;
	}
}
