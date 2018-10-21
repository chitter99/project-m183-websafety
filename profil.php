<?php 
    include 'include/head.php';
    include 'authenticate.php';

    if(isset($_SESSION['vorname']) && isset($_SESSION['nachname'])){
        $vorname = $_SESSION['vorname'];
        $nachname = $_SESSION['nachname'];
        $id = $_SESSION['id'];
    } else {
        header ("Location: index.php");
    }
?>         
<!-- Profil Menu-->
<div id="anzeige">
    <form id="filterForm" class="form-inline">
        <div id="form-benutzer" class="form-group">
            <label for="benutzer"><a href="editProfil.php"><span class="glyphicon glyphicon-user"></span></a>
                <?php 
                if($nachname != null && $vorname != null){
                    echo " ". $vorname. " ". $nachname; 
                } else {
                    echo "Nicht möglich!";
                }?>
            </label>
        </div>
        <div id="form-new-event" class="form-group">
            <label for="benutzer">Neuen Event erstellen: <a href="createEvent.php?id=<?php echo $id; ?>"><span class="glyphicon glyphicon-plus-sign"></span></a></label>
        </div>
    </form>
</div>
<!-- Main -->
<div id="main">
    <div class="inner">
        <div class="profil_eigene">
             <p class="p_eigeneEvents"><b>Eigene Events</b></p>
        </div>
        <section class="tiles">
           <?php
    
            $pdo = new PDO('mysql:host=localhost;dbname=wissensdatenbank', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare("SELECT * FROM event WHERE userId = $id AND enable = 1"); 
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
                }
            ?>
            <div class="profil_favorite">
                <p class="p_favoriten"><b>Favoriten</b></p>
            </div>
            <?php
                        
            $stmt = $pdo->prepare("SELECT eventId FROM favoriteevent WHERE userId = $id"); 
            $stmt->execute();

            $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

            foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$r){

                $stmt = $pdo->prepare("SELECT * FROM event WHERE id=".$r["eventId"] . " AND enable = 1"); 
                $stmt->execute(); 
                
                $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
                foreach(new RecursiveArrayIterator($stmt->fetchAll()) as $k=>$event){         
            ?>
            <article class="style4">
                <span class="image">
                     <?php
                     $idEvent = $r['eventId'];
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
                <a href="event.php?id=<?php echo $event['id']; ?>&eventInfo=saved">
                    <h2><?php echo $event['eventTitel']; ?></h2>
                    <div class="content">
                        <div class="textoverflow">
                            <p><?php echo $event['beschreibung']; ?></p>
                        </div>
                    </div>
                </a>
            </article>
            <?php
                }
            }
            ?>
        </section>
    </div>
</div>
<?php include 'include/footer.php' ?>