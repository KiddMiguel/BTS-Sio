<?php
session_start();
if(!isset($_SESSION["pseudo"])){
    header("location:connect.php");
}
 $id= mysqli_connect("127.0.0.1","root","","monchat");
    if (isset($_POST["boutton"])){
       
        $pseudo= $_POST["pseudo"];
        $message = $_POST["message"];
        $req = "insert into messages values (null, '$pseudo','$message', now())";
        mysqli_query($id, $req);

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="chat.css">
    <title>ChatBox</title>
</head>
<body>
    <div id="container">
       <header>
            <h1>Bienvenue dans le chatBox  <?php echo $_SESSION["pseudo"]; ?> Vous êtes génial </h1>
       </header>
       <div id="content">
            <ul>
                <?php
                // Je me connecte au serveur
                  
                // Je lance la requete de recuperation
                    $req= "select * from messages order by date desc";
                    // Je crée une variable pour récuperer des messages
                    $res= mysqli_query($id, $req);

                // Je fais une boucle pour recuperer mes messages pour
                while($ligne = mysqli_fetch_assoc($res)){

                    $date = $ligne["date"];
                    $pseudo = $ligne["pseudo"];
                    $message = $ligne["message"];   
                     echo "<li> $date -<strong> $pseudo: </strong>$message</li>" ;

                }
                ?>
                
                
            </ul>
       </div>
       <div id="form">
           <form action="" method="post">
                <input type="text" name="pseudo" placeholder="Pseudo" required> <br>   
                <input type="text" name="message" placeholder="Message :" required><br>

                <input type="submit" name="boutton" value="Envoyer">
           </form>
            <a href="deconnect.php" id="">Deconnexion</a>
       </div>
        
    </div>
</body>
</html>