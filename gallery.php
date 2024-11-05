<?php

// img TABLE DB STRUCTURE:
// id
// location
// width
// height
if(isset($_GET["tags"])){
    $tags = explode(",",$_GET["tags"]);
}

// select * from img 

$dbHost="localhost";
$dbUser="website";
$dbPass="website";
$dbName="gallery";

$mysqli = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

$query = "SELECT * FROM img";

if(isset($tags)){
    $tagIds = "";
    $result = $mysqli->query("SELECT * FROM tags");
    foreach($result->fetch_all() as $row){
        if(in_array($row[1], $tags)){
            $tagIds .= $row[0].",";
        }
    }

    $tagIds = substr($tagIds, 0, -1);

    $query .= " INNER JOIN img_tag_link ON img.id = img_tag_link.img_id WHERE img_tag_link.tag_id in (".$tagIds.")";

}

$result = $mysqli->query($query);
$images = array();
foreach($result->fetch_all() as $row){
    array_push($images, array("src"=>$row[1], "height"=>$row[3], "width"=> $row[2]));
}
echo json_encode($images);

?>