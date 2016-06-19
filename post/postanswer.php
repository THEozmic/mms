<?php
 require("../requires/querydb.php");
 $answerdetails = $_POST;// get form details from javascript



 $answer = $answerdetails["answer"];
 $questionID = $answerdetails["questionID"];
 $replierID = $_SESSION["details"]["userID"];
 $date = $answerdetails["date"];
 
 echo $answer;
 $sql = "INSERT into `answers` (answer, questionID, replierID, date) VALUES ('$answer', '$questionID', '$replierID', '$date')";

  $qry_result = mysql_query($sql) or die(mysql_error());
?>