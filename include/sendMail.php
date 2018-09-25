<?php
    $pdo = new PDO('mysql:host=localhost;dbname=wissensdatenbank', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $userEmail = $_POST['email'];
    
    $date = new DateTime();
    $timestamp = $date->getTimestamp();
    $key = md5($timestamp);
    $userid;
    $vorname;
    $nachname;

    $stmt = $pdo->prepare("SELECT id, vorname, nachname FROM user WHERE email = '$userEmail'"); 
    $stmt->execute(); 
                
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$row){
        $userid = $row["id"];
        $vorname = $row["vorname"];
        $nachname = $row["nachname"];
    }

    if(isset($userid)){
        $sql = "INSERT INTO keytable (`fk_user`, `key`) VALUES ($userid, '$key')";
        $statement = $pdo->prepare($sql);
        $statement->execute(); 

        $subject = "Event Agenda: Passwort Zuruecksetzen";
        $body = "Hallo $vorname $nachname \n \n Hier kannst du dein Passwort zuruecksetzen:\n http://eventagenda.ch/PasswortAendern.php?Key=$key \n PS: Dieser Key ist einmalig, das heisst, man kann den nur einmal anwenden! \n Viel Spass!\n Dein Entwicklerteam";
        $sql = 'SELECT COUNT(email) FROM user WHERE email ="'.$userEmail.'"';

        $stmt = $pdo->prepare($sql); 
        $stmt->execute();

        $count = $stmt->fetchColumn();

        if(mail($userEmail, $subject, $body) ) {
            header("Location:../");
        } 
    } else {
        $message = "wrong answer";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
?>