<?php
$con = mysql_connect("localhost", "ardevelo_sai", "tatvamasi");
$db  = mysql_select_db("ardevelo_saiprema", $con);
date_default_timezone_set('Asia/Kolkata');
mysql_set_charset('utf8', $con);
?>
