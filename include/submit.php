<?php
    $pdo = new PDO('mysql:host=localhost;dbname=wissensdatenbank', 'root', '');
    
    $vorname = $_POST["vorname"];
    $nachname = $_POST["nachname"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $passwordWiederholung = $_POST["passwordWiederholen"];    
    
    if($password != $passwordWiederholung) {
        include('passwort.php');
    } else {
        include('registrationInsert.php');
    }
?>