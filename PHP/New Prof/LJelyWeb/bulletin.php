<!DOCTYPE html>
<html>
<?php 
	if(isset($_POST['notes'])){
		$notes = $_POST['notes'];
	}
	else{
		$notes = 0;
	}
?>
<head>
	<meta charset="utf-8">
	<style type="text/css">
		body{
			width: 100%;
			display: flex;
			flex-direction: column;
			justify-content: center;
			align-items: center;
		}
		div{
		}
	</style>
</head>
<body>
	<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
		<label>Nombre de note à entrer ?</label>
		<input type="number" name="notes">
		<input type="submit" name="ok" value="ok">
	</form>

	<?php
		if($notes>0){
			echo "<form action='".htmlspecialchars($_SERVER["PHP_SELF"])."' method='post'>";
				for($i = 0; $i < $notes; $i++){
					echo "<label> Note $i </label><br>";
					echo "<input type='number' min='0' max='20' name='notesTab[]'><br>";
				}
			echo "<input type='submit' value='generer bulletin'>";
			echo "</form>";
		}

		if(isset($_POST['notesTab'])){
			$moyenne = 0;
			for($i = 0; $i<count($_POST['notesTab']); $i++){
				echo "<p>Note $i : ".$_POST['notesTab'][$i]."</p>";
				$moyenne += $_POST['notesTab'][$i];
			}
			$moyenne /= count($_POST['notesTab']);
			echo "<p><strong>Moyenne :</strong> $moyenne</p>";
		}
	?>
</body>
</html>