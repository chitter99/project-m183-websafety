<?php
    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
    
    $statement = $pdo->prepare("INSERT INTO user (vorname, nachname, email, passwort) VALUES (?, ?, ?, ?)");
    $statement->execute(array($vorname, $nachname, $email, $encrypted_password));  

    header("Location: ../login.php"); 
?>