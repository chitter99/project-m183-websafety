<?php 
    include 'include/head.php';

    if(isset($_SESSION['vorname']) && isset($_SESSION['nachname'])){
?>           
<!-- Main -->
<div id="formLogin">
    <h2>Nachricht senden</h2>
    <form class="formLoginClass" method="post" action="include/submit.php">
        <div id="form-vorname" class="form-group-login">
            <label for="vorname">Betreff</label>
            <input type="text" class="form-control" id="betreff" placeholder="Uhrzeit Event" name="betreff">
        </div>
        <div id="form-beschreibung" class="form-group-event">
            <label for="nachricht">Nachricht</label>
            <textarea type="text" class="form-control" id="nachricht" placeholder="Wir fahren mit dem Velo nach Stuttgart und wieder zurück." name="nachricht"></textarea>
        </div>
        <ul class="actions">
            <li><input type="submit" value="senden" class="special" /></li>
        </ul>
    </form>
</div>
<?php 
    }
    else {
?>
<div id="formLogin">
    <h2>Nachricht senden</h2>
    <form class="formLoginClass" method="post" action="include/submit.php">
        <div id="form-vorname" class="form-group-login">
            <label for="betreff">Betreff</label>
            <input type="text" class="form-control" id="betreff" placeholder="Uhrzeit Event" name="betreff">
        </div>
        <div id="form-email" class="form-group-login">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" placeholder="example@gmail.com" name="email">
        </div>
        <div id="form-beschreibung" class="form-group-event">
            <label for="nachricht">Nachricht</label>
            <textarea type="text" class="form-control" id="nachricht" placeholder="Wir fahren mit dem Velo nach Stuttgart und wieder zurück." name="nachricht"></textarea>
        </div>
        <ul class="actions">
            <li><input type="submit" value="senden" class="special" /></li>
        </ul>
    </form>
</div>
<?php 
    }
    include 'include/footer.php' 
?>