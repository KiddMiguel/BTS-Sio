<?php
    // On fais une manipulation nécessaire pour savoir si belle qui est connecté à la page 
    // et on fais une condition si il à pu se connéter ou pas sinon il le ramène à la page de connexion
    session_start();
    if(!isset($_SESSION["pseudo"])){
        header("location:connexion.php");
    }
    // On se connecte à la base de données
    $connect_bdd= mysqli_connect("127.0.0.1","root","","service");
    // On fais une réquête pour afficher les éléments dans la table 'tache'
    $req= "select * from tache";
    $res = mysqli_query($connect_bdd, $req);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tache</title>
    <link rel="stylesheet" href="Tache.css">
</head>
<body>
  <a class="nav1" href="../Connexion.php">Deconnexion</a>


    <h1>Bonjour <!-- Pour acfficher le nom de l'utilateur connecté --> <span><?php echo $_SESSION["pseudo"]; ?></span> , voici la liste des taches !</h1><hr>
    <table>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Etat</th>
            <th>Actions</th>
            <th class='td_class_supp'>Supp</th>
        </tr>
        <?php
            // On fais une boucle qui affichera tous les éléments de la table 'tache' qui se trouve dans la base de donnée
            while ($ligne = mysqli_fetch_assoc($res)){
                echo "<tr '>
                        <td>".$ligne["id"]."</td>
                        <td >".$ligne["nom"]."</td>
                        <td class='td_class'>".$ligne["etat"]."</td>
                        <td class='td_class1'><a href='En_attente.php?id=".$ligne["id"]."'><img src='Image/pause.png' width='38'></a>
                        <a href='en_cours.php?id=".$ligne["id"]."'><img src='Image/fleche.png' width='52'></a>
                        <a href='terminer.php?id=".$ligne["id"]."'><img src='Image/validation.png' width='50'></a></td>
                        <td class='a_modif1'><a class='a_modif' href='supp.php?id=".$ligne["id"]."'>Supprimer</td>
                </tr>";
            }
          

            
?>
                  
    </table><br>
    <a href="Ajoute_tache.php" class="nav2">Ajouter une tache</a> 
</body>
</html>