<?php
	require("../requires/database_connection.php");
	$details = $_POST;// get form details from javascript
    json_encode($details); 
    $commentID = rand();
    $commentID = $commentID.date("dd-ss");
    $comment = $details["comment"];
    $questionID = $details["questionID"];
    $commenterName = $details["commenterName"];
    $date = $details["date"];

	$sql = "INSERT into `comments` (questionID, comment, commentID, commenterName, date) VALUES ('$questionID', '$comment', '$commentID', '$commenterName', '$date')";
	$qry_result = mysql_query($sql) or die(mysql_error());
    echo "true";
?>