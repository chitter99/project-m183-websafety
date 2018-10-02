<?php
$eventId =$_POST['eid'];
$userId = $_POST['uid'];
$favorite = $_POST['checked'];

$pdo = new PDO('mysql:host=localhost;dbname=wissensdatenbank', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if($favorite == "true") {
    $stmt = $pdo->prepare("INSERT INTO favoriteevent (userId, eventId) VALUES (?, ?)");
    $stmt->execute(array($userId, $eventId));
} else {
    $sql = 'DELETE FROM favoriteevent WHERE userId ="'.$userId.'" AND eventId ="'.$eventId.'"';

    $stmt = $pdo->prepare($sql);
    $stmt->execute();
}
?>