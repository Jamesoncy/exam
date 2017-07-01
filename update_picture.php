<?php
include("constants.php");

$bool = false;
$array = array();	
	if(isset($_POST["id"]) && isset($_POST["tags"])){
		$array = array($_POST["tags"], $_POST["id"]);
		$bool = addTag($array);
	}

echo $bool;

function addTag($array= array()){
		try{
		    $conn = new PDO("mysql:host=".SERVER.";dbname=".DBNAME, USER, PASSWORD);
		    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		    $stmt = $conn->prepare("update picture set tags = ? where unique_id = ?");
			$stmt->execute($array);
			return true;
		}
		catch(PDOException $e)
		{
			return false;
		}
}