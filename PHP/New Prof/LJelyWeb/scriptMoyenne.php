<?php
	$notes = array(12, 14, 9, 10, 4);
	$moyenne = 0;

	for($i = 0; $i < count($notes); $i++){
		$moyenne += $notes[$i];
	}

		$moyenne /= count($notes);

		echo "Votre moyenne : ".$moyenne."<br>";

	if($moyenne >= 10){
		echo "Bravo !";
	}
	else{
		echo "La prochaine fois peut etre....";
	}
?>