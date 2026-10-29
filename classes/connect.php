<?php

class Database
{

	private static $connection = null;

	function connect()
	{
		if(self::$connection){
			return self::$connection;
		}

		// PHP 8.1+ throws on failed queries by default; the code below expects false instead
		mysqli_report(MYSQLI_REPORT_OFF);

		$host = getenv("DB_HOST") ?: "localhost";
		$username = getenv("DB_USER") ?: "root";
		$password = getenv("DB_PASSWORD") ?: "";
		$db = getenv("DB_NAME") ?: "donart_db";
		$port = (int)(getenv("DB_PORT") ?: 3306);

		$connection = mysqli_connect($host,$username,$password,$db,$port);
		if(!$connection){
			http_response_code(500);
			die("Could not connect to the database. Check the DB_* settings.");
		}

		mysqli_set_charset($connection, "utf8mb4");

		// queries written for MySQL 5.x: loose GROUP BY and zero dates
		mysqli_query($connection, "SET SESSION sql_mode = ''");

		self::$connection = $connection;
		return $connection;
	}

	function read($query)
	{
		$conn = $this->connect();
		$result = mysqli_query($conn,$query);

		if(!$result)
		{
			return false;
		}
		else
		{
			$data = false;
			while($row = mysqli_fetch_assoc($result))
			{

				$data[] = $row;

			}

			return $data;
		}
	}

	function save($query)
	{
		$conn = $this->connect();
		$result = mysqli_query($conn,$query);

		if(!$result)
		{
			return false;
		}else
		{
			return true;
		}
	}

}
