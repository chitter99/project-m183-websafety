<?php
$pdo = new PDO('mysql:host=localhost;dbname=wissensdatenbank', 'root', '');
 
$statement = $pdo->prepare("SELECT start FROM event");
$statement->execute(array());  
    while($row = $statement->fetch()) {
       $date = new DateTime($row['start']);
       echo $date->format('d.m.y H:i:s')."<br />";
    }
?>