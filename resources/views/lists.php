<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="../resources/css/list.css">
	<script src="../resources/js/lists.js" type="module"></script>
</head>

<body>
	<h1 class="title">Lista de productos</h1>
	<div id="product-container" class="container">
		<?php
		foreach ($products as $product) {
			echo "
			<div class='card' data-product-id='{$product->id}'>
				<img src='{$product->imageUrl}' class='card-img-top' alt='product_image'>
				<div class='card-body'>
					<h5 class='card-title'>{$product->name}</h5>
					<p class='card-text'>{$product->description}</p>
					<button type='button' class='btn btn-primary'>Editar</button>
				</div>
			</div>";
		}
		?>
	</div>
</body>

</html>