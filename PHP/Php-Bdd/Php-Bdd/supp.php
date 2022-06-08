<?php
   
 
    $numed= $_GET["numed"];
    echo 'Nous venons de supprimer '.$numed.'.';

    $id = mysqli_connect("127.0.0.2","root","","hopital");
        $req ="DELETE from medecins WHERE numed = $numed";
        mysqli_query($id,$req);
        header("refresh:3; url=listeMedecins.php");

?>