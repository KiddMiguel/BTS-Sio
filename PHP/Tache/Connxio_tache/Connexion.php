<?php
    session_start();
    // On récupère les valeurs saisies
    if(isset($_POST["button"])){
        $pseudo = $_POST["pseudo"];
        $mdp = $_POST["mdp"];
        // On se connecte à la base de donnée 
        $connect_bdd= mysqli_connect("127.0.0.1","root","","service");

        // On lance la réquête de recuperation des valeurs saisies
        $req= "select * from travailleurs where pseudo = '$pseudo' and mdp= '$mdp'";
        $res= mysqli_query($connect_bdd,$req );
        
        // On fais une conndition au cas où les données saisie sont juste ou fausses
        if(mysqli_num_rows($res)>0){
            $_SESSION["pseudo"] = $pseudo;
            // si les informations saisies sont juste on l'envoi dans une autre page
            header("location:Tache/Tache.php");
        }
        else{
            echo "Error";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Connexion.css">
    <title>Connexion</title>
</head>
<body>
    <div>
    <form action="" method="post">
        <h1>Connexion</h1><hr>
        <label>Identifiant</label><br>
        <input type="text" name="pseudo" required  ><br>
        <label>Mot de passe</label><br>
        <input type="password" name="mdp" required ><br>
        <button type="submit" name="button">Se connecter</button>

        <a href="Form_connect.php">Créer un compte</a>
    </form>
    </div>
</body>
</html>