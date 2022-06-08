<?php
    session_start();
    $connect_bdd= mysqli_connect("127.0.0.1","root","","service");
    //On recupère les valeurs entrées dans notre formulaire et on les remplaces par des varibales
    if(isset($_POST['submit']))// On fais la condition du <<si il appuie sur le button d'envoi >>
    {
        $nom= $_POST['nom'];
        $prenom= $_POST['prenom'];
        $email= $_POST['email'];
        $mdp= $_POST['mdp'];
        $pseudo= $_POST['pseudo'];
        //On fais une réquête d'insersion des valeurs recupérés dans la base de donnée
        $req= "insert into travailleurs values (null, '$nom','$prenom', '$email', '$mdp', '$pseudo' )";
        mysqli_query($connect_bdd,$req);
        // On fais une réquête d'affichage uniquement des pseudo et mot de passe existant dans la base de donnée
        $req= "select * from travailleurs where pseudo = '$pseudo' and mdp= '$mdp'";
        $res= mysqli_query($connect_bdd,$req );
        
            $_SESSION["pseudo"] = $pseudo;
            header("location:Tache/Tache.php");
    
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Form_connect.css">
    <title>Formulaire de</title>
</head>
<body>
    <div>
    <h1>Inscription</h1><hr>
    <form action="" method="post">
        <label>Votre nom</label><br>
        <input type="text" name="nom" id=""  required><br>
        <label>Votre prenom</label><br>
        <input type="text" name="prenom" id=""  required><br>
        <label>Votre pseudo</label><br>
        <input type="text" name="pseudo" id="" required><br>
        <label>Votre E-mail</label><br>
        <input type="text" name="email"  required><br>
        <label>Mot de passe </label><br>
        <input type="password" name="mdp" id="" required><br>
        
      
        <button type="submit" name="submit" id="submit">Create</button>
        <a href="Connexion.php">Connexion</a>
    </form>
    </div>
</body>
</html>