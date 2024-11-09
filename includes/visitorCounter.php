<?php

include_once("../includes/db.php");

$ipAddr = $_SERVER['REMOTE_ADDR'];

$result = $mysqli->query("SELECT * FROM visitors WHERE ip_address='$ipAddr'")->fetch_row();
if(is_null($result)) {
    $mysqli->query("INSERT INTO visitors VALUES('$ipAddr')");
}

$result = $mysqli->query("SELECT COUNT(*) FROM visitors")->fetch_row();

$visitorCount = $result[0];