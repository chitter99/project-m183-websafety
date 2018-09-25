<?php
include 'include/head.php';
    $id = $_GET['id'];

    $pdo = new PDO('mysql:host=localhost;dbname=wissensdatenbank', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("SELECT * FROM event WHERE id =". $id); 
    $stmt->execute();

    foreach(($stmt->fetchAll()) as $e=>$eventDetails) { 
?>
<!-- Main -->
<div id="form-create-event">
    <h2>Event bearbeiten</h2>
    <form class="formCreateClass" method="post" action="updateEvent.php?id=<?php echo $id; ?>">
        <div id="form-event-titel" class="form-group-event">
            <label for="titel">Titel</label>
            <input type="text" class="form-control" id="titel" name="titel" value="<?php echo $eventDetails['eventTitel']; ?>" required>
        </div>
        <div class="form-group-event">
            <label for="titelfoto">Titelfoto</label>
            <input type="file" class="form-control" id="titelfoto" accept="image/*" name="titelfoto">
        </div>
        <div id="form-adresse" class="form-group-event">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="<?php echo $eventDetails['ort']; ?>" required>
        </div>
        <div id="form-beschreibung" class="form-group-event">
            <label for="beschreibung">Beschreibung</label>
            <textarea type="text" class="form-control" id="email" name="beschreibung" required><?php echo $eventDetails['beschreibung']; ?></textarea>
        </div>
        <div id="form-youtube-video" class="form-group-event">
            <label for="form-youtube-video">Promo Video Link</label>
            <input type="text" class="form-control" id="youtubevideourl" placeholder="<?php if(!isset($eventDetails['youtubeVideoId']) || $eventDetails['youtubeVideoId'] != ''){echo "https://www.youtube.com/watch?v=kKIOBNLMpaA&t=3s";}?>" value="<?php if(isset($eventDetails['youtubeVideoId']) && $eventDetails['youtubeVideoId'] != ''){echo "https://www.youtube.com/watch?v=" . $eventDetails['youtubeVideoId'];}?>" name="youtubevideourl"/>
            <input type="hidden" class="form-control" value="<?php echo $eventDetails['youtubeVideoId']?>" id="youtubevideo" name="youtubevideo"/>
        </div>
        <div class="form-group-event div50">
            <label for="datetime-local">Startdatum</label>
            <input type="datetime-local" class="form-control" id="startdate" name="startdate" value="<?php echo $eventDetails['start']; ?>">
        </div>
        <div class="form-group-event div50">
            <label for="datetime-local">Enddatum</label>
            <input type="datetime-local" class="form-control" id="enddate" name="enddate" value="<?php echo $eventDetails['ende']; ?>">
        </div>
        <div class="actions"> 
            <input type="submit" value="Bearbeiten" class="special" />
            <input name="SubmitButton" id="SubmitButton" type="submit" value="delete" class="special" />
        </div>
    </form>
</div>

<script>
    var videoLink;

    $('#youtubevideourl').keyup(function(e){
        setTimeout(function () {

            videoLink = $("#youtubevideourl").val();

            if(videoLink.length > 0){

                var videoLinkSplit = videoLink.split("?v=");

                videoLink = videoLinkSplit[1];
            }


            $("#youtubevideo").val(videoLink  && videoLink.length > 0 ? videoLink : null);

        }, 500);
    });
</script>

<?php
    }
    include 'include/footer.php'; 
?>