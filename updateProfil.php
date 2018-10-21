<?php
session_start();
include 'authenticate.php';
$pdo = new PDO('mysql:host=localhost;dbname=wissensdatenbank', 'root', '');

$vorname = $_POST["vorname"];
$nachname = $_POST["nachname"];
$email = $_POST["email"];

$id = $_SESSION['id'];

try{
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "UPDATE user SET vorname = '".$vorname."', nachname = '".$nachname."', email = '".$email ."' WHERE id = $id";

    $_SESSION['vorname'] = $vorname;
    $_SESSION['nachname'] = $nachname;

    $statement = $pdo->prepare($sql);

    $statement->execute();

    header("Location: profil.php");

} catch(PDOException $e) {
    echo "<br>" . $e->getMessage();
}