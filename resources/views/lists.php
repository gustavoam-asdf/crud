<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous" defer></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous" defer></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous" defer></script>
	<link rel="stylesheet" href="../resources/css/list.css">
	<script src="../resources/js/lists.js" type="module"></script>
</head>

<body>
	<h1 class="title">Lista de productos</h1>
	<div class="container">
		<div id="product-container">
			<?php
			foreach ($products as $product) {
				echo "
				<div class='card' data-product-id='{$product->id}'>
					<img src='{$product->imageUrl}' class='card-img-top' alt='product_image'>
					<div class='card-body'>
						<h5 class='card-title'>{$product->name}</h5>
						<p class='card-text'>
							{$product->description}
						</p>
						<span class='price' data-price='{$product->price}'>S/. {$product->price}</span>
						<button type='button' class='btn btn-primary' data-toggle='modal' data-target='#modal-edit-product'>
							Editar
						</button>
					</div>
				</div>";
			}
			?>
		</div>
		<div class="modal fade" id="modal-edit-product" tabindex="-1" role="dialog" aria-labelledby="edit-product" aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<form id="edit-product" class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Modificar producto</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<div>
							<div class="mb-3">
								<label for="product-name" class="form-label">Nombre</label>
								<input type="text" class="form-control" id="product-name" name="product-name">
							</div>
							<div class="mb-3">
								<label for="product-description" class="form-label">Descripción</label>
								<textarea class="form-control" id="product-description" name="product-description" rows="3"></textarea>
							</div>
							<div class="mb-3">
								<label for="product-price">Precio</label>
								<input type="text" class="form-control" id="product-price" name="product-price">
							</div>
							<div class="mb-3">
								<label for="product-url">Imagen (URL)</label>
								<input type="text" class="form-control" id="product-url" name="product-url">
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
						<button type="submit" class="btn btn-primary" id="save-edited-product">Guardar cambios</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>