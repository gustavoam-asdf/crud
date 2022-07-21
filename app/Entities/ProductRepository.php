<?php

namespace App\Entities;

use Database\MySQL;

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

	public function create(Product $p)
	{
		$query = $this
			->mysql
			->prepare("INSERT INTO product (
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
				)");
		$query->bind_param("ssds", $p->name, $p->description, $p->price, $p->imageUrl);
		return $query->execute();
	}

	public function update(Product $p)
	{
		$query = $this
			->mysql
			->prepare("UPDATE product 
				SET 
					update_time = now(),
					name = ?, 
					description = ?, 
					price = ?, 
					image_url = ?
				WHERE id = ?");
		$query->bind_param("ssdsi", $p->name, $p->description, $p->price, $p->imageUrl, $p->id);
		return $query->execute();
	}
}
