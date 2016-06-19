<?php
session_start();
$where = $_SESSION["page"];
if($where == "404") {
	echo 'The page you are looking for does not exist.';
}
echo $_SERVER["HTTP_REFERER"];
?>