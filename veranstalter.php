<?php
    $userId =$_POST['uid'];

    echo $eventId;
            
    $pdo = new PDO('mysql:host=localhost;dbname=wissensdatenbank', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $stmt = $pdo->prepare("SELECT * FROM event WHERE enable = 1 AND userId =". userId);
    $stmt->execute(array( $eventId));  

?>