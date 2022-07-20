<!DOCTYPE html>
<html lang="es">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Listado</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-cs-1">
				<h1>Listado de productos</h1>
				<?php
				foreach ($products as $product) {
					echo "<strong>{$product->name}</strong> - {$product->description} <br>";
				}
				?>
				<hr>
				<p>
					<a href="pdf.php">Exportar en PDF</a>
				</p>
			</div>
		</div>
	</div>
</body>

</html>