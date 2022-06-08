<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hopital</title>
    <link rel="stylesheet" href="Untitled-1.css">
</head>
<body>
    <h1>Hopital</h1>
    <h2>Les Medecins</h2>
    <table>
        <tr>
            <th>Numero</th>
            <th>Nom</th>
            <th>prenom</th>
            <th>Specialité</th>
            <th>Service</th>

    <?php
      $id= mysqli_connect("127.0.0.1","root","","hopital");
      $req = "SELECT * FROM medecins order by nom";
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
</body>
</html>