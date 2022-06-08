<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste par P</title>
    <link rel="stylesheet" href="Unti
    tled-1.css">
</head>
<body>
    <form action="" method="post">

        <p>Specialite: <select name="specialite" id="">
        <?php
          $id= mysqli_connect("127.0.0.1","root","","hopital");
             $req = "SELECT distinct  specialite from medecins order by specialite";
             $result=mysqli_query($id, $req);
             
       
              while(  $ligne= mysqli_fetch_assoc($result))
             { 
                 echo "<option>".$ligne["specialite"]."</option>";
             }
        ?>
</select>
 
<input type="submit" value="Envoyer" name="button">
</p> 
    </form><hr>
    <?php
        if(isset($_POST["button"]))
        {
            echo $_POST["specialite"];
            $specialite= $_POST["specialite"];
            
         echo   "<h1>Hopital</h1>
    <h2>Les $specialite(s) </h2>
    <table>
        <tr>
            <th>Numero</th>
            <th>Nom</th>
            <th>prenom</th>
            <th>Specialité</th>
            <th>Service</th>
       </tr>";

      $id= mysqli_connect("127.0.0.1","root","","hopital");
      $req = "SELECT * FROM medecins where specialite = '$specialite' order by nom";
      $result=mysqli_query($id, $req);
      

       while(  $ligne= mysqli_fetch_assoc($result))
      { 
      echo "<tr>
           <td>".$ligne["numed"]."</td>
           <td>".$ligne["nom"]."</td>
           <td>".$ligne["prenom"]."</td> 
           <td>".$ligne["specialite"]."</td>
           <td>".$ligne["service"]."</td>
          <tr>";
      }
    ?>
    </table>
    il y a <?php echo mysqli_num_rows($result); ?> medecins(s).
    <?php
        }
    ?>   
</body>
</html>