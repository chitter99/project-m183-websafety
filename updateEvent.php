<?php
    $pdo = new PDO('mysql:host=localhost;dbname=wissensdatenbank', 'root', '');
    
    $titel = $_POST["titel"];
    $titelfoto = $_POST["titelfoto"];
    $adresse = $_POST["adresse"];
    $beschreibung = $_POST["beschreibung"];
    $startdatum = $_POST["startdate"];
    $enddatum = $_POST["enddate"];
    $youtubevideo = $_POST["youtubevideo"];


    $id = $_GET['id'];

    if($_POST['SubmitButton'] == "delete"){
        $sql = "UPDATE event SET enable = 0 WHERE id = $id";
        try{
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $statement = $pdo->prepare($sql);

            $statement->execute();  

            header("Location: profil.php");

        } catch(PDOException $e) {
            echo "<br>" . $e->getMessage();
        } 
    }
try{
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = "UPDATE event SET eventTitel = '" . $titel . "',  beschreibung = '". $beschreibung."', start = '". $startdatum. "', ende = '".$enddatum ."', ort = '". $adresse . "', youtubeVideoId =  NULLIF('".$youtubevideo."','') WHERE id = $id";
    
    $statement = $pdo->prepare($sql);
    $statement->execute();  

    header("Location: profil.php");

} catch(PDOException $e) {
    echo "<br>" . $e->getMessage();
} 