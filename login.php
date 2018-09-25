<?php 
    include 'include/head.php';
?>        
<!-- Main -->
<div id="formLogin">
    <h2>Login</h2>
        <form class="formLoginClass" method="post" action="include/loginCheck.php">
            <div id="form-email" class="form-group-login">
                <label for="email">Email</label>
                <input type="email" class="form-control resonsive-field-login" id="email" placeholder="example@gmail.com" name="email" required>
            </div>
            <div id="form-password" class="form-group-login">
                <label for="password">Passwort</label>
                <input type="password" class="form-control resonsive-field-login" id="password" placeholder="Passwort..." name="password" required>
            </div>
            <ul class="actions">
                <li><input type="submit" value="Send" class="special" /></li>
            </ul>
        </form>
    <p>Noch nicht registriert? Dann registrier dich hier: <a href="registration.php">Registration</a></p>
    <p>Passwort vergessen? Dann klick hier: <a href="passwortVergessen.php">Passwort zurücksetzen</a></p>
</div>
<?php include 'include/footer.php' ?>