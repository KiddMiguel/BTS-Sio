<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Ajoute_tache.css">
    <title>Ajouter une tache</title>
</head>
<body>
    <div>
        <h1>Ajouter une tache</h1><hr>

        <form action="" method="post">
            <input type="text" name="nom" id="" placeholder="Nom de la tache">
            <select name="tache" id="tache">
                Etat:<option value="En attente" selected>En attente</option><br>
            </select>
            <button type="submit" name="submit">Enregister</button>

            <?php
                $connect_bdd= mysqli_connect("127.0.0.1", "root","","service");

                if(isset($_POST["submit"])){
                    $nom= $_POST["nom"];
                    $tache = $_POST["tache"];

                    $req= "insert into tache values (null, '$nom', '$tache' )";
                    mysqli_query($connect_bdd,$req);

                    header("location:Tache.php");
                }
            ?>

        </form>
    </div>
</body>
</html>