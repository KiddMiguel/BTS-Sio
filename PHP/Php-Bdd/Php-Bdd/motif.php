<?php
     $numed= $_GET["numed"];
     $id = mysqli_connect("127.0.0.2","root","","hopital");
     $req="select * from medecins where numed = $numed";
     $res= mysqli_query($id,$req);
     $ligne = mysqli_fetch_assoc($res);
     $specialite= $ligne["specialite"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="motif.css">
    <title>motif</title>
</head>
<body>
    
    <div>
        <h1>Modifications</h1><hr>
        <form action="" method="get">
            <label>Nom:</label>
            <input type="text" name="nom" value="<?php echo $ligne["nom"]?>">
            <label>Prenom:</label>
            <input type="text" name="prenom" value="<?php echo $ligne["prenom"]?>">
            <label>specialité: </label>
            <select name="specialite">
                <?php
                    $req1= "select distinct from medecins order by specialite";
                    $res2= mysqli_query($id,$req1);
                    while ($ligne2 = mysqli_fetch_assoc($res2)){
                        if($ligne2["specialite"]== $specialite){
                            echo " <option value='jgsjqjddjqg'><?php echo ".$ligne2["specialite"]."?></option>";
                        }
                        else{
                            echo " <option><?php echo ".$ligne2["specialite"]."</option>";
                        }
                        
                    }
               

                ?>
            </select>
            <label>Service: </label>
            <input type="text" name="service" value="<?php echo $ligne["service"]?>">
            <input type="submit" value="Enregistrer" name="registrer" id="registrer">
        </form>
    </div>
</body>
</html>