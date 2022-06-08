<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="Liste des clients.css">
</head>
<body>

    <h1>Liste des Clients</h1><hr>
    
    <table>
        <tr>
            <th>Image</th><th>Nom</th><th>Prenom</th> <th>Mail</th><th>Tel</th><th>Adresse</th><th>Ville</th><th>Code postal</th><th>modifier</th><th>Supprimer</th><th>
        </tr>
        <?php
    $connect_bdd= mysqli_connect("127.0.0.1","root","","boutique");
    $req= "SELECT * FROM client order by nom";
    $resultat = mysqli_query($connect_bdd, $req);

    while ($ligne = mysqli_fetch_assoc($resultat)){
        echo " <tr>
        <td><img src='images/".$ligne["image"]."' width='50' height='30'></td>
                    <td>".$ligne["prenom"]."</td>
                    <td>".$ligne["nom"]."</td>
                    <td>".$ligne["mail"]."</td>
                    <td>".$ligne["tel"]."</td>
                    <td>".$ligne["adresse"]."</td>   
                    <td>".$ligne["ville"]."</td>
                    <td>".$ligne["cp"]."</td>  
                    <td><a href='modif.php?idc=".$ligne["idc"]."'><img src='images/icone2.png' width='40'></a></td>
                    <td><a href='sup.php?idc=".$ligne["idc"]."'><img src='images/icone.png' width='20'></a></td>
        </tr>";
    }
?>
    </table>
    <p>y a <?php echo mysqli_num_rows($resultat);?> client(s)</p> 
</body>
</html>