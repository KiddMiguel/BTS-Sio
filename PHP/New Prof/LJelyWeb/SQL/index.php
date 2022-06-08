<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "cmsProject";

	$database = new mysqli($servername, $username, $password, $dbname);
	if($database->connect_error){
		die("bye bye");
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>title</title>
</head>

<body>
	<form method="post" action="addEntry.php">
		<label>Nom</label>
		<input type="text" name="nom">
		<label>Prenom</label>
		<input type="text" name="prenom"><br>
		<input type="submit" name="submit">
	</form>
	<?php
		$sql = "SELECT id, prenom, nom FROM table1";
		$result = $database->query($sql);
		echo "<table>
			<tr>
				<th>id</th>
				<th>prenom</th>
				<th>nom</th>
			</tr>";
		foreach($result as $row){
			echo "<tr>
				<td>{$row["id"]}</td>
				<td>{$row["prenom"]}</td>
				<td>{$row["nom"]}</td>
			</tr>";
		}
		echo "</table>";
	?>
</body>	

</html>