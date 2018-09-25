<?php 
    
    $pdo = new PDO('mysql:host=localhost;dbname=wissensdatenbank', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id;

    if(isset($_GET["id"])){
        $id = $_GET["id"];
        if($_POST['password'] == $_POST['passwordWiederholen']){
            $passwort = $_POST['password'];
            $encryptedpw = password_hash($passwort, PASSWORD_DEFAULT);
            $sql = "UPDATE user SET passwort = '" . $encryptedpw . "' WHERE id = $id";
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $statement = $pdo->prepare($sql);
            $statement->execute();  

            header("Location: ../");
        } else {
            echo "Falsches Passwort";
        }
    }

    include 'include/head.php';
    $key;
    if(isset($_GET["Key"])){
      $key = $_GET["Key"];
        

        $stmt = $pdo->prepare("SELECT fk_user FROM keytable WHERE `key` = '$key'"); 
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
        foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$row){ 
            $id = $row["fk_user"];
        }
        
    } else if(isset($_SESSION["id"])){
        $id = $_SESSION["id"];
    } else {
        header("Location: ../");
    }
    if(!isset($id)){
        header("Location: ../");
    }

    $sql = "DELETE FROM keytable WHERE `key` = '$key'";
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $statement = $pdo->prepare($sql);
    $statement->execute();
?>        
<!-- Main -->
<div id="formLogin">
    <h2>Passwort ändern</h2>
        <form class="formLoginClass" method="post" action="./PasswortAendern.php?id=<?php echo $id;?>">
            <div id="form-password" class="form-group-login">
            <label for="password">Passwort</label>
            <input type="password" class="form-control" id="password" placeholder="Passwort..." name="password">
            </div>
            <div id="form-password" class="form-group-login">
                <label for="passwordWiederholen">Passwort wiederholen</label>
                <input type="password" class="form-control" id="password-wiederholen" placeholder="Passwort..." name="passwordWiederholen">
            </div>
            <ul class="actions">
                <li><input type="submit" value="Send" class="special" /></li>
            </ul>
        </form>
    </div>
<?php include 'include/footer.php' ?>