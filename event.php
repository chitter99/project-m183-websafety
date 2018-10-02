<?php 
    include 'include/head.php';
    $id = $_GET['id'];
    $userId;
?>
<!-- Main -->
    <div id="main">
        <div class="inner">
    <?php

    $pdo = new PDO('mysql:host=localhost;dbname=wissensdatenbank', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT * FROM event WHERE id = $id"); 
    $stmt->execute();

    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC); 
    foreach(($stmt->fetchAll()) as $k=>$v) { 
        $userId = $v['userId'];
        $ort = $v['ort'];
        $stm = $pdo->prepare("SELECT vorname, nachname FROM user WHERE id ='$userId'"); 
        $stm->execute();
        foreach(($stm->fetchAll()) as $i=>$u) { 
    ?>
    <h1><?php    
            echo $v['eventTitel'];
            if(isset($_SESSION['id'])){
                if($_SESSION["id"] == $userId){
                    ?><a href="editEvent.php?id=<?php echo $id; ?>">
                    <span class="glyphicon glyphicon-edit"></span></a>
                    <?php
                }
            }
            ?>
    </h1>
    <span class="image-main">
        <?php
        $stmt = $pdo->prepare("SELECT name FROM attachment WHERE eventId = '$id'");
        $stmt->execute();

        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

        foreach (($stmt->fetchAll()) as $t=>$titelfoto) {
            ?>
            <img class="center-fit" src="images/<?php echo $titelfoto['name']?>" alt="Titelfoto"/>
            <?php
        }
        ?>
    </span>
    <div class="description">
        <p><?php echo $v['beschreibung']; ?></p>
    </div>
    </div>

    <div class="infos">
        <table class="table table-infos">
            <tr>
                <td>Wann? </td>
                <td><?php echo $v['start'] . ' Uhr'; ?>
                    <?php
                        if($v['ende'] == "0000-00-00 00:00:00"){
                            echo '';
                        } else {
                            echo 'bis ' . $v['ende'];
                        }
                    ?>
                </td>
            </tr>
            <tr>
                <td>Veranstalter: </td>
                <td><?php echo $u['vorname']. ' '. $u['nachname']; ?></td>
            </tr>
            <tr <?php if(!isset($_SESSION['id'])){ echo "style=\"display: none;\"";} ?>;>
                <td colspan="2">
                    <div id="checkbox">
                        <input type="hidden" id="eid" name="eventId" value="<?php echo $v['id']; ?>">
                        <input type="hidden" id="uid" name="userId" value="<?php echo $_SESSION['id']; ?>">
                        <?php
            
                            if(isset($_GET["eventInfo"])){
                                 echo '<input type="checkbox" id="saveFavorites" name="favorites" value="favorites" onclick="processForm()" checked>';
                            } else {
                                 echo '<input type="checkbox" id="saveFavorites" name="favorites" value="favorites" onclick="processForm()" >';
                            }
                        ?>
                           
                        <label for="saveFavorites">Event speichern</label>                        
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6_4ZoGkqFN_v-iloSs9tONTPKI-85DM4&callback=initialize"></script>

    <!--
    <script>

        var geocoder;
        var map;
        var address = "London";

        function initialize() {
            var mapOptions = {
                center: new google.maps.LatLng(51.5, -0.12),
                zoom: 10,
                mapTypeControl: true,
                mapTypeControlOptions: {
                    style: google.maps.MapTypeControlStyle.DROPDOWN_MENU
                },
                navigationControl: true,
                mapTypeId: google.maps.MapTypeId.HYBRID
            }
            var map = new google.maps.Map(document.getElementById("map"), mapOptions);

            if (geocoder) {
                geocoder.geocode({
                    'address': address
                }, function(results, status) {

                    console.log(results);

                    if (status == google.maps.GeocoderStatus.OK) {
                        if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                            map.setCenter(results[0].geometry.location);

                            var infowindow = new google.maps.InfoWindow({
                                content: '<b>' + address + '</b>',
                                size: new google.maps.Size(150, 50)
                            });

                            var marker = new google.maps.Marker({
                                position: results[0].geometry.location,
                                map: map,
                                title: address
                            });
                            google.maps.event.addListener(marker, 'click', function() {
                                infowindow.open(map, marker);
                            });

                        } else {
                            alert("No results found");
                        }
                    } else {
                        alert("Geocode was not successful for the following reason: " + status);
                    }
                });
            }
        }
        google.maps.event.addDomListener(window, 'load', initialize);
    </script>
    -->

    <script type="text/javascript">
        var geocoder;
        var map;
        var address = "<?php echo $ort; ?>";
        function initialize() {
            geocoder = new google.maps.Geocoder();
            var latlng = new google.maps.LatLng(-34.397, 150.644);
            var myOptions = {
                zoom: 12,
                center: latlng,
                mapTypeControl: true,
                mapTypeControlOptions: {style: google.maps.MapTypeControlStyle.DROPDOWN_MENU},
                navigationControl: true,
                mapTypeId: google.maps.MapTypeId.ROADMAP
            };
            map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
            if (geocoder) {
                geocoder.geocode( { 'address': address}, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (status != google.maps.GeocoderStatus.ZERO_RESULTS) {
                            map.setCenter(results[0].geometry.location);

                            var infowindow = new google.maps.InfoWindow(
                                { content: '<b>'+address+'</b>',
                                    size: new google.maps.Size(150,50)
                                });

                            var marker = new google.maps.Marker({
                                position: results[0].geometry.location,
                                map: map,
                                title:address
                            });
                            google.maps.event.addListener(marker, 'click', function() {
                                infowindow.open(map,marker);
                            });

                        } else {
                            alert("No results found");
                        }
                    } else {
                        alert("Geocode was not successful for the following reason: " + status);
                    }
                });
            }
        }
    </script>
    <div class="maps">
        <table class="table table-maps">
            <tr>
                <td>Wo?</td>
                <td><?php echo $v['ort']; ?></td>
            </tr>
            <tr style="margin-left: auto; text-align: center; padding-left: auto; ">
                <td style="width: 100%;" colspan="2">
                    <div id="map_canvas" style="width: 100%; height: 250px"></div>
                </td>
            </tr>
            <tr <?php if($v['youtubeVideoId'] == ''){ echo "style=\"display: none;\"";} ?>>
                <td>Promo Video</td>
                <td></td>
            </tr>
            <tr style="margin-left: auto; text-align: center; padding-left: auto; <?php if($v['youtubeVideoId'] == ''){ echo "display: none;";} ?>;">
                <td style="width: 100%;">

                    <iframe width="100%" height="300" src="https://www.youtube.com/embed/<?php echo $v['youtubeVideoId']; ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

                </td>
            </tr>
        </table>
    </div>
        <?php
    }
}
?>
    <br style="clear:both;"/>
</div>
<script>
    function processForm() {
       $.ajax( {
        type: 'POST',
        url: 'include/checkbox.php',
        data: { eid : $("#eid").val(),uid : $("#uid").val(),checked : $("#saveFavorites").is(':checked') },

        success: function(data) {
            $('#message').html(data);
        }
        } );
    }
</script>
<?php include 'include/footer.php' ?>