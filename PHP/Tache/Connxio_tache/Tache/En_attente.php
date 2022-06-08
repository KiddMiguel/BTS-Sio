<?php
    //Bon ici je sais pas trop comment expliquer ça 😂 
    // Mais on défini d'abord la variable $id on lui donne un GET
    $id =  $_GET["id"];

    // On se connecte à la base de donnée 
    $connect_bdd = mysqli_connect("localhost","root","","service");
    // On lance une réquête pour récupérer l'élément sélectionné ($i)
    $req = "select * from tache where id = $id";

    // On fais un UPDATE pour pouvoir modifier l'élément "etat" dans la base de donnée
    $req = "UPDATE tache SET etat = 'En attente' WHERE id= $id";
    mysqli_query($connect_bdd,$req);

    // on fais un refresh de la page pour révenir sur la même page automatique et voir le changement
    header("refresh:0; url = Tache.php");
?>
