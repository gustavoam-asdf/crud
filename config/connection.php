<?php

namespace Config;

use mysqli;

require '../config/env.php';

$conn = new mysqli($host, $username, $password, $database, $port);

if ($conn->connect_errno) {
	echo "Falló la conexión a MySQL: ({$conn->connect_errno}) {$conn->connect_error}";
}
