<?php
    $id= mysqli_connect("127.0.0.1","root","","monchat");
    if(isset($_POST["submit"])){
        $message = $_POST["message"];
        $req= "insert into messages value (null, '$message', now() )";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Chat</title>
</head>
<body>
    <div class="centre">
                <form action="" method="post">
                <div class="user">
                        <?php
                            $days= date('d');
                            $month= date('m');
                            $year= date('Y');

                            $hour= date('H');
                            $minute= date('i');

                            echo '<label>👨‍💼 🟢 Users '.$hour.'h '.$minute.'min ';
                        ?>
                    <select>
                        <option value="🔽" >🔽</option>
                        <option value="User1" name="User1" >User1</option>
                        <option value="User2" name="User2" >User2</option>
                    </select>
                    <ul>
                        
                    </ul>
                </div>
                <div class="chat">
                    <label class="message">✉ Messages</label><br>
                    <div class="messages">
                        <ul>
                        <?php
                            $req= "SELECT * from messages order by desc";
                            $res= mysqli_query($id, $req);
                            if(isset($_POST["submit"])){
                            while ($ligne = mysqli_fetch_assoc($res)){
                                $date= $ligne["date"];
                                $message= $ligne["message"];
                                echo "<li> $date -<strong> :</strong> $message </li>";
                            }
                        }
                        ?>
                        </ul>
                    </div>
                    <input type="text" name="message" id="message" placeholder="Entrer votre message">
                    <input type="submit" value="​📃​" name="submit">
                </div>
        </form>
    </div>
</body>
</html>