<?php

$id=$_GET['id'];
$tag=$_GET['tag'];

$dbHost="localhost";
$dbUser="website";
$dbPass="website";
$dbName="gallery";

$mysqli = mysqli_connect($dbHost, $dbUser, $dbPass, $dbName);

$result = $mysqli->query("SELECT * FROM tags WHERE name LIKE '$tag'")->fetch_row();

$mysqli->query("INSERT INTO img_tag_link (img_id, tag_id) VALUES($id,$result[0])");