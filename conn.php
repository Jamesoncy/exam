<?php
include("constants.php");

function insertPhotoDetails($array= array()){
		try{
		    $conn = new PDO("mysql:host=".SERVER.";dbname=".DBNAME, USER, PASSWORD);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $stmt = $conn->prepare("INSERT INTO picture (filename, filesize, width, height, filetype, unique_id) VALUES (?, ?, ?, ?, ?, ?)");
			$stmt->execute($array);
			return true;
		}
		catch(PDOException $e)
		{
			return false;
		}
}


?>