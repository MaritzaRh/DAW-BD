<?php 

	function conectDb(){
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "dbname";
		
		$con = mysqli_connect($servername, $username, $password, $dbname);
		
		if (!$con){
			die("Connection failed: ". mysqrli_connect_error());
		}
		
		return con;
	}

	function closeDb($mysql){
		mysqli_close($mysql);
	}

	function getFruits(){
		$conn = conectDb();
		
		$sql = "SELECT name, units, quantity, price, country FROM Fruit";
		
		$result = mysqli_query($conn, $sql);
		
		closeDb($conn);
		
		return $result;
	}

	function getFruitsByName($fruit_name){
		$conn = conectDb();
		
		$sql = "SELECT name, units, quantity, price, country FROM Fruit WHERE name LIKE '%".fruit_name."%'";
		
		$result = mysqli_query($conn, $sql);
		
		closeDb($conn);
		
		return $result;
	}
	
	function getCheapestFruits($cheap_price){
		$conn = conectDb();
		
		$sql = "SELECT name, units, quantity, price, country FROM Fruit WHERE price <=  '%".cheap_price."%'";
		
		$result = mysqli_query($conn, $sql);
		
		closeDb($conn);
		
		return $result;
	}

?>