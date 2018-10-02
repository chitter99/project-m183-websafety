<?php
include 'include/head.php';
$id = $_SESSION['id'];

$pdo = new PDO('mysql:host=localhost;dbname=wissensdatenbank', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$stmt = $pdo->prepare("SELECT * FROM user WHERE id =". $id);
$stmt->execute();

foreach(($stmt->fetchAll()) as $p=>$profilDetails) {
    ?>
    <!-- Main -->
    <div id="formLogin">
        <h2>Profil bearbeiten</h2>
        <form class="formLoginClass" method="post" action="updateProfil.php">
            <div id="form-vorname" class="form-group-login">
                <label for="vorname">Vorname</label>
                <input type="text" class="form-control" id="vorname" name="vorname" value="<?php echo $profilDetails['vorname']; ?>">
            </div>
            <div id="form-nachname" class="form-group-login">
                <label for="nachname">Nachname</label>
                <input type="text" class="form-control" id="nachname" name="nachname" value="<?php echo $profilDetails['nachname']; ?>">
            </div>
            <div id="form-email" class="form-group-login">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $profilDetails['email']; ?>">
            </div>
            <br>
            <p>Passwort kann bei der Loginseite zurückgesetzt werden, loggen sie sich dafür aus. </p>
            <ul class="actions">
                <li><input type="submit" value="Änderung speichern" class="special" /></li>
            </ul>
        </form>
    </div>
    <?php
}
include 'include/footer.php';
?>