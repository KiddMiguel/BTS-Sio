
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <link rel="stylesheet" href="formulaire.css">
</head>
<body>
    <div>
    <h1>Formulaire D'inscription</h1><hr>
    <!-- (p>[input tupe=text name=val$])*10 -->
    <form action="" method="post" enctype="multipart/form-data">
               <input type="text" placeholder="Prenom" name="prenom" id="" required > 
               <input type="text" placeholder="Nom" name="nom" id="" required > 
               <input type="text" name="mail" placeholder="Mail" id="" required >  
               <input type="password" placeholder="Mot de passe" name="mdp" required> 
       
                <input type="text" name="tel"placeholder="telephone" id="" required> 
                <input type="text" name="adresse" placeholder="Adresse" id="" required>
                <input type="text" name="ville" placeholder="Ville" id="" required> 
                <input type="text" name="cp" placeholder="code postal" required> 
    
                <input type="file" name="image" id="" > 
                <p>Photo d'identity</p>
                <input type="submit" name="button" value="Envoyer">
    </form>
<?php
    $connect_bdd= mysqli_connect("127.0.0.1", "root","", "boutique");

    // $test = "Hello world!";
    // echo "$test<br>";
    //  echo substr($test,6, 4); // on prend à partir du 6ème caractère

    // $po = strpos($test, "/"); C'est genre faire une  recherche 

    if(isset($_POST['button'])){
        var_dump($_POST); //ça sert à voir toutes les informations contenue dans $_POST
        var_dump($_FILES); //ça sert à voir toutes les informations contenue dans les fichiers
        extract($_POST); //ça sert à extraire toutes les informations contenue dans $_POST, en gros ça fais le même boulot que $nom =$_POST["nom"];
        
        extract($_POST);
        $pos = strpos($_FILES["image"]["type"],"/");
        $type = substr($_FILES["image"]["type"], $pos+1);
        if($type!="png" && $type!="jpg" && $type!="jpeg"){
            echo "Format non pris en charge, veuillez entrer du jpg ou png Merci!!!";
        }else{
        // if($_FILES["image"]["size"] >30000) echo "Fichier trop lourd";
        // else echo "Image bien uploadé";
            echo "ok";
        // $res = move_uploaded_file($_FILES["image"]["tmp_name"], "images/$nom.png");

        }
          // C'est un deplacement d'image, en même temps u le renomme avec $nom(C'est le nom qu'il à ecris dans l'indice $nom)
         //Le tmp_name c'est un indice obligatoire pour signifier que l'on veux le deplacer dans le dossier où se trouve l'image 
         // L'indice image c'est pour signifier que l'on prend image.

        //  $nom = $_POST["nom"];
        //  $nom = addslashes($nom);
        //  $prenom = $_POST["prenom"];
        //  $prenom = addslashes($prenom);
        //  $mail = $_POST["mail"];
        //  $mail = addslashes($mail);
        //  $mdp = $_POST["mdp"];
        //  $tel = $_POST["tel"];
        //  $adresse = $_POST["adresse"];
        //  $adresse = addslashes($adresse);
        //  $ville = $_POST["ville"];
        //  $ville = addslashes($ville);
        //  $image = $_FILES["image"];
         $req= "insert into client values (null, '$prenom','$nom', '$mail', '$mdp', '$tel' ,'$adresse','$ville', '$cp','' )";
         mysqli_query($connect_bdd,$req);
         $req = "select max(idc) as maxi from client"; // On fais une réqu$tte
         $res= mysqli_query($connect_bdd,$req); // On recupère son max ID
         $ligne = mysqli_fetch_assoc($res);
         $idc = $ligne["maxi"];
         $image = $idc.".".$type;

        $req = "update client set image = '$image' where idc= '$idc'";
        mysqli_query($connect_bdd,$req);
        $resimg = move_uploaded_file($_FILES["image"]["tmp_name"], "Images/$image");

    }
    
?>
</div>
</body>
</html>