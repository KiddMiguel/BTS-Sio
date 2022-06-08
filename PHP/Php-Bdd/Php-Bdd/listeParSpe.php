<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <form action="" method="post">
        Specialité : <select name="specialite">
        <?php
        $id = mysqli_connect("127.0.0.1:3307","root","","hopital");
        $req = "select distinct specialite from medecins order by specialite";
        $resultat = mysqli_query($id, $req);
        while($ligne = mysqli_fetch_assoc($resultat))
        {
            echo "<option>".$ligne["specialite"]."</option>";
        }
        ?>
        </select>
        <input type="submit" value="Envoyer" name="bout">
    </form><hr>

    <?php
    if(isset($_POST["bout"]))
    {
       // echo $_POST["specialite"];
       $specialite = $_POST["specialite"];
     echo "<h1>Liste des $specialite(s) de l'hopital</h1><hr>
            <table>
            0.
            
            <tr>
                <th>Numero</th><th>Nom</th><th>Prénom</th>
                <th>Specialité</th><th>Service</th>
            </tr>";
    
    //Connexion à mysql et choix de la bdd
    $id = mysqli_connect("127.0.0.1:3307","root","","hopital");
    //Execution de la requete et récupération des infos dans $resultat
    $req = "select * from medecins 
            where specialite = '$specialite' order by nom";
    $resultat = mysqli_query($id, $req);
    //Récupération d'une ligne du resultat et positionnement du
    //curseur en dessous
    while($ligne = mysqli_fetch_assoc($resultat))
    {
    echo "<tr>
            <td>".$ligne["numed"]."</td>
            <td>".$ligne["nom"]."</td>
            <td>".$ligne["prenom"]."</td>
            <td>".$ligne["specialite"]."</td>
            <td>".$ligne["service"]."</td>
        </tr>";
    }
    ?>
    </table>
    Il y a <?php echo mysqli_num_rows($resultat);?> medecin(s)
   <?php
    }

    ?>

</body>
</html>