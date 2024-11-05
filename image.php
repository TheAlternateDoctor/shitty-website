<?php

$id = $_GET["id"];

$dbHost = "localhost";
$dbUser = "website";
$dbPass = "website";
$dbName = "gallery";

$mysqli = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

$result = $mysqli->query("SELECT * FROM img WHERE id=" . $id)->fetch_row();

echo "<img src='$result[1]' style='max-width:50%'>";
echo "<span id='id'>$result[0]</span>";
?>

<div class="tags-gallery">
    <h2>TAGS</h2>
    <p>Drawn by:</p>
    <button type="button" id="me" onClick="addTag('me')">Me</button>
    <button type="button" id="others" onClick="addTag('others')">Others</button>
    <p>Type:</p>
    <button type="button" id="sketch" onClick="addTag('sketch')">Sketch</button>
    <button type="button" id="unshaded" onClick="addTag('unshaded')">Simple</button>
    <button type="button" id="full" onClick="addTag('full')">Full</button>
    <p>OC:</p>
    <button type="button" id="matt" onClick="addTag('matt')">Matt</button>
    <button type="button" id="thierry" onClick="addTag('thierry')">Thierry</button>
    <button type="button" id="diode" onClick="addTag('diode')">Diode</button>
    <button type="button" id="cathode" onClick="addTag('cathode')">Cathode</button>
    <button type="button" id="camp" onClick="addTag('camp')">Camp</button>
</div>

<script>
    function addTag(tag) {
        id = document.getElementById("id").innerHTML;
        fetch('update.php?id='+id+'&tag='+tag)
    }
</script>