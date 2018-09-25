<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "wissensdatenbank";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    if(!isset($_POST['firstname']) || empty($_POST['lastname'])){

        $answerArray = array();
        $usersArray = array();
        $placesArray = array();
        $datesArray = array();


        $sql = "SELECT id, vorname, nachname FROM user ORDER BY id DESC;";

        $query = $conn->query($sql);

        if ($query->num_rows > 0) {
            // output data of each row
            $counter = 0;
            while($row = $query->fetch_assoc()) {

                $usersArray += [ $counter => array("id"=>$row['id'], "firstname"=>$row['vorname'], "lastname"=>$row['nachname'])];
                $counter = $counter + 1;
            }
        } else {
            echo "0 results";
        }

        $answerArray += ["users" => $usersArray];

        $sql = "SELECT ort FROM event WHERE enable = 1 ORDER BY id DESC;";

        $query = $conn->query($sql);

        if ($query->num_rows > 0) {
            // output data of each row
            $counter = 0;
            while($row = $query->fetch_assoc()) {

                $placesArray += [ $counter => array("address"=>$row['ort'])];
                $counter = $counter + 1;
            }
        } else {
            echo "0 results";
        }

        $answerArray += ["places" => $placesArray];

        echo json_encode($answerArray);

    }else{

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        $pdo = new PDO('mysql:host=localhost;dbname=wissensdatenbank', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT id, vorname, nachname FROM user WHERE vorname LIKE '".$firstname."' AND nachname LIKE '".$lastname."';";

        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        $userId = $stmt->fetchColumn();

        echo  json_encode(array("userId" =>$userId));

    }


?>