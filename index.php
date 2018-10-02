<?php
    include 'include/head.php';

    $_SESSION['idEvent'] = '';

if(isset($_SESSION['titelfoto']) && isset($_SESSION['titel'])){
    $image = $_SESSION['titelfoto'];
    $name = $_SESSION['titel'];
}

$pdo = new PDO('mysql:host=localhost;dbname=wissensdatenbank', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

<!--Filter Menu-->
    <div id="filter">
    <form id="filterForm" class="form-inline inner" action="" method="post">
        <div id="form-veranstalter" class="form-group">
            <label for="veranstalter">Veranstalter:</label>
            <input list="veranstalter" name="veranstalter" oninput="getUser(this)" autocomplete="on">
                <datalist id="veranstalter"></datalist>
            <input type="hidden" name="veranstalterId" id="veranstalterId" value="">
        </div>
        <div id="form-group-without-left" class="form-group">
            <label for="ort">Ort:</label>
            <input list="ort" name="ort" autocomplete="on">
                <datalist id="ort"></datalist>
        </div>
        <div id="form-group-without-left" class="form-group">
            <label for="datum">Datum:</label>
            <input type="date" class="form-control" id="datum" name="datum">
        </div>
        <div id="form-group-without-left" class="form-group">
            <label for="suchen">Suchen:</label>
            <input type="submit" value="suchen" name="suchen" class="special margin-bottom-button" />
        </div>
    </form>
</div>
<?php
    $sql = "SELECT * FROM event WHERE enable = 1";
    $where = "";
    if (sizeof($_POST) > 1){
        if ($_POST['veranstalterId'] != '' && $_POST['ort'] != '' && $_POST['datum']!= '') {
            $where = " AND userId =".$_POST['veranstalterId']." AND ort = '".$_POST['ort']. "' AND start BETWEEN '". $_POST['datum']." 00:00:00' AND '". $_POST['datum']." 23:59:59'";
        } else if ($_POST['veranstalterId'] != '' && $_POST['ort'] != '' && $_POST['datum'] == ''){
            $where = " AND userId =".$_POST['veranstalterId']." AND ort ='".$_POST['ort']."'";
        } else if ($_POST['veranstalterId'] != '' && $_POST['ort'] == '' && $_POST['datum']!= '') {
            $where = " AND userId =".$_POST['veranstalterId']." AND start BETWEEN '". $_POST['datum']." 00:00:00' AND '". $_POST['datum']." 23:59:59'";
        } else if ($_POST['veranstalterId'] == '' && $_POST['ort'] != '' && $_POST['datum']!= '') {
            $where = " AND ort ='".$_POST['ort']. "' AND startBETWEEN '". $_POST['datum']." 00:00:00' AND '". $_POST['datum']." 23:59:59'";
        } else if ($_POST['veranstalterId'] != '' && $_POST['ort'] == '' && $_POST['datum'] == '') {
            $where = " AND userId = ".$_POST['veranstalterId'];
        } else if ($_POST['veranstalterId'] == '' && $_POST['ort'] != '' && $_POST['datum']== '') {
            $where = " AND ort = '".$_POST['ort']."'";
        } else if ($_POST['veranstalterId'] == '' && $_POST['ort'] == '' && $_POST['datum']!= '') {
            $where = " AND start BETWEEN '". $_POST['datum']." 00:00:00' AND '". $_POST['datum']." 23:59:59'";
        }
    }
?>
<!-- Main -->
<div id="main">
    <div class="inner">
        <section class="tiles">
            <?php
                $stmt = $pdo->prepare($sql . $where);
                $stmt->execute();

                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                $i = 0;
                foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$v) {
                    $_SESSION['idEvent'] = $v['id'];
                ?>
                <?php
                    if($i % 2 == 0){
                ?>
                    <article class="style4">
                <?php
                    } else {
                ?>
                    <article class="style6">
                <?php
                    } 
            ?>
                <span class="image">
                    <?php
                    $idEvent = $v['id'];
                    $stmt = $pdo->prepare("SELECT name FROM attachment WHERE eventId = '$idEvent'");
                    $stmt->execute();

                    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

                    foreach (($stmt->fetchAll()) as $t=>$titelfoto) {
                        ?>
                        <img src="images/<?php echo $titelfoto['name']?>" alt=""/>
                        <?php
                    }
                    ?>
                </span>
                <a href="event.php?id=<?php echo $v['id']; ?>">
                    <h2><?php echo $v['eventTitel']; ?></h2>
                    <div class="content">
                        <div class="textoverflow">
                            <p><?php echo $v['beschreibung']; ?></p>
                        </div>
                    </div>
                </a>
            </article>
            <?php
                $i++;
                } 
            ?>
        </section>
    </div>
</div>
<?php include 'include/footer.php' ?>
<script src="js/searchEngine.js">
    searchMachine.init();
</script>
