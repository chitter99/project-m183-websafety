<?php 
    include 'include/head.php';
?>         
<!-- Main -->
<div id="form-create-event">
    <h2>Neuen Event</h2>
    <form class="formCreateClass" method="post" action="include/submitEvent.php" enctype="multipart/form-data">
        <div id="form-event-titel" class="form-group-event">
            <label for="titel">Titel</label>
            <input type="text" class="form-control" id="titel" placeholder="Velo fahren" name="titel" required>
        </div>
        <div class="form-group-event">
            <label for="titelfoto">Titelfoto:</label>
            <input type="file" class="form-control" id="titelfoto" accept="image/*" name="titelfoto" required>
        </div>
        <div id="form-adresse" class="form-group-event">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" id="adresse" placeholder="In der Ey 50 8048 Zürich" name="adresse" required>
        </div>
        <div id="form-beschreibung" class="form-group-event">
            <label for="beschreibung">Beschreibung</label>
            <textarea class="form-control" id="email" placeholder="Wir fahren mit dem Velo nach Stuttgart und wieder zurück." name="beschreibung" required></textarea>
        </div>
        <div class="form-group-event div50">
            <label for="datetime-local">Startdatum:</label>
            <input type="datetime-local" class="form-control" id="startdate" placeholder="05-08-19 19:20" name="startdate" required/>
        </div>
        <div class="form-group-event div50">
            <label for="datetime-local">Enddatum:</label>
            <input type="datetime-local" class="form-control" id="enddate" placeholder="16/08/19" name="enddate"/>
        </div>
        <div id="form-youtube-video" class="form-group-event">
            <label for="form-youtube-video">Promo Video Link</label>
            <input type="text" class="form-control" id="youtubevideourl" onpaste="getLinkID()" placeholder="https://www.youtube.com/watch?v=kKIOBNLMpaA&t=3s" name="youtubevideourl"/>
            <input type="hidden" class="form-control" id="youtubevideo" name="youtubevideo"/>
        </div>
        <div class="actions">
            <input type="submit" value="Erstellen" class="special" />
        </div>
    </form>
</div>

<script>
        var videoLink;

        function getLinkID() {
            setTimeout(function () {

                videoLink = $("#youtubevideourl").val();

                var videoLinkSplit = videoLink.split("?v=");

                videoLink = videoLinkSplit[1];

                $("#youtubevideo").val(videoLink && videoLink.length > 0 ? videoLink : null);
            }, 100);

        }
</script>

<?php
    include 'include/footer.php';
?>