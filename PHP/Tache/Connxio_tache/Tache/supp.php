<?php
   
 
    $id= $_GET["id"];
    $connect_bdd = mysqli_connect("127.0.0.1","root","","service");
        $req ="DELETE from tache WHERE id = $id";
        mysqli_query($connect_bdd,$req);
        header("refresh:0; url=tache.php");

?>