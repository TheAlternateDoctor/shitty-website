<?php
    $id = $_GET["id"];
    include_once("db.php");
    $image = $mysqli->query("SELECT * FROM img WHERE id=" . $id)->fetch_row();
    if(!is_null($image)){
        $tagsUnordered = $mysqli->query("SELECT tags.name FROM img_tag_link INNER JOIN tags ON tags.id = img_tag_link.tag_id WHERE img_tag_link.img_id = " . $id)->fetch_all();
        $tags = array();
        foreach ($tagsUnordered as $tag) {
            array_push($tags, $tag[0]);
        }
        include_once("image_actual.php");
    } else{
        include_once("../404.html");
    }
?>
