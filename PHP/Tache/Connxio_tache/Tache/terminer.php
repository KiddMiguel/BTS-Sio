

    <?php

    $id =  $_GET["id"];
    $connect_bdd = mysqli_connect("localhost","root","","service");
    $req = "select * from tache where id = $id";
    $req = "UPDATE tache SET etat = 'Terminer' WHERE id = $id";
    mysqli_query($connect_bdd,$req);
    header("refresh:0; url = Tache.php");
    ?>