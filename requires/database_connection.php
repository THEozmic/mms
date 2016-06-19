<?php
require 'app_config.php';

//$db = mysql_connect(DATABASE_HOST, DATABASE_USERNAME, DATABASE_PASSWORD)
//or
// die(mysql_error() . mysql_errno());

$db = mysql_connect(DATABASE_HOST, DATABASE_USERNAME)
or
 die(mysql_error() . mysql_errno());
 
 
 
 mysql_select_db(DATABASE_NAME,$db);
 

 
?>