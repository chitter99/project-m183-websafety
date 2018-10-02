<?php 
    include 'include/head.php';
?>           
<!-- Main -->
<div id="formLogin">
    <h2>Registration</h2>
    <form class="formLoginClass" method="post" action="include/submit.php">
        <div id="form-vorname" class="form-group-login">
            <label for="vorname">Vorname</label>
            <input type="text" class="form-control" id="vorname" placeholder="Jorge" name="vorname" required>
        </div>
        <div id="form-nachname" class="form-group-login">
            <label for="nachname">Nachname</label>
            <input type="text" class="form-control" id="nachname" placeholder="Frassati" name="nachname" required>
        </div>
        <div id="form-email" class="form-group-login">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="example@gmail.com" name="email" required>
        </div>
        <div id="form-password" class="form-group-login">
            <label for="password">Passwort</label>
            <input type="password" class="form-control" id="password" placeholder="Passwort..." name="password" required>
        </div>
        <div id="form-password" class="form-group-login">
            <label for="passwordWiederholen">Passwort wiederholen</label>
            <input type="password" class="form-control" id="password-wiederholen" placeholder="Passwort..." name="passwordWiederholen" required>
        </div>
        <ul class="actions">
            <li><input type="submit" value="Send" class="special" /></li>
        </ul>
    </form>
</div>
<?php 
    include 'include/footer.php' 
?>