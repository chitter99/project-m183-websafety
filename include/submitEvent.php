<?php
session_start();
    $pdo = new PDO('mysql:host=localhost;dbname=wissensdatenbank', 'root', '');

    if(!empty($_FILES["titelfoto"])) {

        $temp = explode(".", $_FILES["titelfoto"]['name']);

        $path = $_SERVER['DOCUMENT_ROOT']. '/project133/images/' . round(microtime(true)) . '_Upload' . '.' . end($temp);
        if (move_uploaded_file($_FILES["titelfoto"]['tmp_name'], $path)) {
            echo "The file " . basename($_FILES["titelfoto"]['name']) .
                " has been uploaded";
        } else {
            echo "There was an error uploading the file, please try again!";
        }
    } else {
        $path = 'ging/nicht';
    }

    $titel = $_POST["titel"];
    $titelfoto = $path;
    $adresse = $_POST["adresse"];
    $beschreibung = $_POST["beschreibung"];
    $startdatum = $_POST["startdate"];
    $enddatum = $_POST["enddate"];
    $userId = $_SESSION['id'];
    $youtubevideo = $_POST['youtubevideo'] == '' ? NULL : $_POST['youtubevideo'];

    //hier muss noch eine Überprüfung hin
    //ob es sich um ein Bild handelt oder andere Dateien!

    list($speicherort, $titelfoto_name) = explode("images/", $path);

    try{
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $statement = $pdo->prepare("INSERT INTO event (eventTitel, beschreibung, start, ende, ort, youtubeVideoId, userId) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $statement->execute(array($titel, $beschreibung, $startdatum, $enddatum, $adresse, $youtubevideo, $userId));

        $lastId = $pdo->lastInsertId();

        $statementAttachment = $pdo->prepare("INSERT INTO attachment (name, isHub, speicherort, eventId) VALUES (?, ?, ?, ?)");
        $statementAttachment ->execute(array($titelfoto_name, true, $speicherort, $lastId));

        header("Location: ../index.php");

    } catch(PDOException $e) {
        echo "<br>" . $e->getMessage();
    }
?>