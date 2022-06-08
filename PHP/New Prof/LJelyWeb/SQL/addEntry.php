<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "cmsProject";

	$connection = new mysqli($servername, $username, $password, $dbname);

	if($connection->connect_error){
		die("erreur connection database");
	}
	extract($_POST);
	$nom = $_POST['nom'];
	$prenom = $_POST['prenom'];
	$age = $_POST['age'];
	$sql = "INSERT INTO table1 (prenom, nom)
	VALUES ('$prenom', '$nom')";

	if($connection->query($sql) === TRUE){
		echo "new entry added";
	}
	else{
		echo "erreur";
	}

	$connection->close();

	header('Location: index.php');
	exit;
?>