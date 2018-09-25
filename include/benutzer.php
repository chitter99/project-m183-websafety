<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wissensdatenbank";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $userEmail = $_POST['email'];

    $password = $_POST['password'];


    $sql = "SELECT vorname, nachname FROM user WHERE email='$userEmail'";
    
    $query = $conn->query($sql);

    if ($query->num_rows > 0) {
        // output data of each row
        while($row = $query->fetch_assoc()) {
            if (password_verify($password, $row['passwort'])) {
                header("Location: ../profil.php");    
            } else {
                echo $password.'<br/>';
                echo $row['passwort'].'<br/>';
                echo 'Passwort war falsch.';
            }
        }
    } else {
        echo "0 results";
    }   
?>