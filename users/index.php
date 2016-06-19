<?php
	session_start();
    if ($_SESSION["login"] == false) {
    header("Location: http://mastermind.niitportharcourt.com/login");
    }
    
    require("../requires/header.php");
    require("../requires/dashboard.php");
    require("../requires/querydb.php");
    query("SELECT", "name", "students", null, "implode", null);
?>