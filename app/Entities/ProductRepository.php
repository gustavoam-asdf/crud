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
		$products_data = $this
			->mysql
			->query("SELECT id, name, description, price, image_url FROM product")
			->fetch_all();

		$products = array_map(
			fn ($product_data): Product => new Product(
				$product_data[0],
				$product_data[1],
				$product_data[2],
				$product_data[3],
				$product_data[4],
			),
			$products_data
		);
		return $products;
	}

	public function update(Product $p)
	{
		$query = $this
			->mysql
			->prepare("UPDATE product 
				SET name = ?, description = ?, price = ?, image_url = ?
				WHERE id = ?");
		$query->bind_param("ssdbi", $p->name, $p->description, $p->price, $p->imageUrl, $p->id);
		$query->execute();
	}
}
