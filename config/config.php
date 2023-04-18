<?php

try {
	$host = "localhost";
	$dbname = "jobboard";
	$user = "root";
	$pass = "";

	$conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$success_msg = "Connected Successfully";

	// echo $success_msg;
} catch(PDOException $e) {
	$error_msg = $e->getMessage();

	echo $error_msg;
}

 define("APP_URL","http://localhost/jobboard");