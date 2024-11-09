<?php

if(isset($_GET["tags"])){
    $tags = substr($_GET["tags"], 0, -1);
    $tags = explode(",",$tags);
}

include_once("../includes/db.php");

if(isset($tags)){
    $query = "SELECT DISTINCT img.id, img.location, img.width, img.height FROM img";

    //First we get the images with either tags
    $tagIdsString = "";
    $tagIds = array();
    $result = $mysqli->query("SELECT * FROM tags");
    foreach($result->fetch_all() as $row){
        if(in_array($row[1], $tags)){
            array_push($tagIds, $row[0]);
            $tagIdsString .= "$row[0],";
        }
    }

    $tagIdsString = substr($tagIdsString, 0, -1);

    $query .= " INNER JOIN img_tag_link ON img.id = img_tag_link.img_id WHERE img_tag_link.tag_id in ($tagIdsString)";

    $result = $mysqli->query($query." ORDER BY img_tag_link.id DESC");
    $images = array();
    $images_id = array();
    foreach($result->fetch_all() as $row){
        $images[$row[0]] = array(
            "id"=>$row[0], 
            "src"=>$row[1], 
            "height"=>$row[3], 
            "width"=> $row[2],
            "tags"=> array());
    }
    
    //Then we get the linktable entries for the same images

    $query = "SELECT img_tag_link.img_id, img_tag_link.tag_id FROM img_tag_link";

    $query .= " INNER JOIN img ON img.id = img_tag_link.img_id WHERE img_tag_link.tag_id in ($tagIdsString)";

    $result = $mysqli->query($query);
    foreach($result->fetch_all() as $row){
        array_push($images[$row[0]]["tags"],$row[1]);
    }

    //Finally we rearrange the array for JS, only adding the entries with both tags
    $new_images = array();

    foreach($images as $image){
        if(!array_diff($tagIds, $image['tags'])){
            array_push($new_images, array(
                "id"=>$image['id'], 
                "src"=>$image['src'], 
                "height"=>$image['height'], 
                "width"=> $image['width']));
        }
    }

    echo json_encode($new_images);

} else {
    $query = "SELECT * FROM img ORDER BY id DESC";

    $result = $mysqli->query($query);
    $images = array();
    $images_id = array();
    foreach($result->fetch_all() as $row){
        array_push($images, array(
            "id"=>$row[0], 
            "src"=>$row[1], 
            "height"=>$row[3], 
            "width"=> $row[2]));
    }
    
    echo json_encode($images);
}
