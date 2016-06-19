<?php
session_start();
    if ($_SESSION["login"] == false) {
    header("Location: http://mastermind.niitportharcourt.com/login");
    }

    require("../requires/querydb.php");


    $details = $_POST;// get form details from javascript
    json_encode($details); 

    $answer = $details["answer"];
    $date = $details["date"];
    $questionID = $details["questionID"];
    $replier = $details["replier"];
   
    if ($_SESSION["type"] == "staff") {
        $replierID = query("SELECT", "staffID", "staffs",  "name = '$replier'", "implode", null); 
    } else {
    $replierID = query("SELECT", "studentID", "students",  "name = '$replier'", "implode", null); 
}


    $replierID = trim($replierID);

    $sql = "INSERT into `answers` (answer, questionID, replierID, date) VALUES ('$answer', '$questionID', '$replierID', '$date')";

    $qry_result = mysql_query($sql) or die(mysql_error());
     
	echo "true";

?>