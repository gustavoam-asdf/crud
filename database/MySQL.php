<?php

namespace Database;

use Exception;
use mysqli;

class MySQL
{
	private mysqli $connection;

	public function connect($host, $username, $password, $database, $port)
	{
		$this->connection = new mysqli($host, $username, $password, $database, $port);
		if ($this->connection->connect_errno) {
			echo "Error while connect MySQL: ({$this->connection->connect_errno}) {$this->connection->connect_error}";
		}
	}

	public function disconnect()
	{
		$this->connection = null;
	}

	public function prepare(string $query)
	{
		if ($this->connection == null) {
			throw new Exception("Must be connected", 1);
		}
		return $this->connection->prepare($query);
	}

	public function query(string $query)
	{
		if ($this->connection == null) {
			throw new Exception("Must be connected", 1);
		}
		return $this->connection->query($query);
	}
}
