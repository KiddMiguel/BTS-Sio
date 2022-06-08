<?php
session_start();
    if (isset($_POST["submit"])){

        $pseudo = $_POST["pseudo"];
        $mdp = $_POST["mdp"];
        $id = mysqli_connect("127.0.0.1","root","","monchat");
        $req= "select * from Users where pseudo = '$pseudo' and mdp = '$mdp'";
        $res = mysqli_query($id,$req);
        if(mysqli_num_rows($res)>0){
            $_SESSION["pseudo"] = $pseudo;
            header("location:Chat.php");
            
        }
        else{
            echo "<h3> Erreur de pseudo ou mot de passe<h3>";
        }
    }


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div>
        <h1>Connexion</h1><hr><br>

        <form action="" method="post">
            <input type="text" name="pseudo" id="pseudo" placeholder="Pseudo" required><br>

            <input type="password" name="mdp" id="mpd" placeholder="Mot de passe" required><br>
            <input type="submit" value="Connexion" name="submit">
        </form>
    </div>
</body>
</html>