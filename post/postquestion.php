<?php
 require("../requires/querydb.php");

 $sql = "INSERT into `questions` (question, title, replierID, date) VALUES ('$answer', '$questionID', '$replierID', '$date')";

  $qry_result = mysql_query($sql) or die(mysql_error());
?>