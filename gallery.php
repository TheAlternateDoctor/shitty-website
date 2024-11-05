<?php

// img TABLE DB STRUCTURE:
// id
// location
// width
// height

$dbHost="localhost";
$dbUser="website";
$dbPass="website";
$dbName="gallery";

$mysqli = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

$result = $mysqli->query("SELECT * FROM img");
$images = array();
foreach($result->fetch_all() as $row){
    array_push($images, array("src"=>$row[1], "height"=>$row[3], "width"=> $row[2]));
}
echo json_encode($images);

?>