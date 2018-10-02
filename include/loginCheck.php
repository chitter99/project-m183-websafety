<?php
session_start();

    $pdo = new PDO('mysql:host=localhost;dbname=wissensdatenbank', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $userEmail = $_POST['email'];
    $password = $_POST['password'];


    $sql = "SELECT id, vorname, nachname, passwort FROM user WHERE email='$userEmail'";
    echo $sql;
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        // output data of each row
        foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$row) {
            if (password_verify($password, $row['passwort'])) {
                $_SESSION['id'] = $row['id'];
                $_SESSION['nachname'] = $row['nachname'];
                $_SESSION['vorname'] = $row['vorname'];
                
                header("Location: ../profil.php"); 
            } else {
                header("Location: ../login.php");
            }
        }
    } 
    else {
        header("Location: ../login.php"); 
    }   
?>