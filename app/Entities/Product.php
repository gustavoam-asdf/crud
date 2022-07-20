<?php

namespace App\Entities;

class Product
{
	public int $id;
	public string $name;
	public string $description;
	public float $price;
	public string $imageUrl;

	public function __construct(
		int $id,
		string $name,
		string $description,
		float $price,
		string $imageUrl
	) {
		$this->id = $id;
		$this->name = $name;
		$this->description = $description;
		$this->price = $price;
		$this->imageUrl = $imageUrl;
	}
}
