<?php
require("../requires/querydb.php");

$class = test_input($_SESSION["details"]["class"]);
 $assignments = query("SELECT", "*", "uploads", "class = '$class' AND uploadType = 'staff'", "mulptiple", null);

 print_r($assignments);
 print_r (trim($class));
?>