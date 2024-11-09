<?php

include_once("../includes/db.php");

$result = $mysqli->query("SELECT * FROM tags WHERE name LIKE '$tag'")->fetch_row();

$mysqli->query("INSERT INTO img_tag_link (img_id, tag_id) VALUES($id,$result[0])");