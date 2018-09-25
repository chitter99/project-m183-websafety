<?php 
    include 'include/head.php';
?>        
<!-- Main -->
<div id="formLogin">
    <h2>Passwort zurücksetzen</h2>
        <form class="formLoginClass" method="post" action="/include/sendMail.php">
            <div id="form-email" class="form-group-login">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" placeholder="Ihre Mailadresse" name="email">
            </div>
            <ul class="actions">
                <li><input type="submit" value="Send" class="special" /></li>
            </ul>
        </form>
    <p>Noch nicht registriert? Dann registrier dich hier: <a href="registration.php">Registration</a></p>
</div>
<?php include 'include/footer.php' ?>