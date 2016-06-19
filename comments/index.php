<?php
session_start();
if ($_SESSION["login"] == false) {
    header("Location: http://mastermind.niitportharcourt.com/login");
}

	require("../requires/database_connection.php");
	$details = $_POST;// get form details from javascript
    json_encode($details); 
   	$questionID = $details["questionID"];
	$comment = "SELECT `comment`, `commenterName` FROM `comments` WHERE `questionID` = '$questionID' ORDER BY `date` DESC";
	$comment_result = mysql_query($comment) or die(mysql_error());

	if (mysql_num_rows($comment_result)==0) {
            echo "<div class='item'><div class='comment'>No comments.</div></div>";
       } else {
       	while($row = mysql_fetch_array($comment_result, MYSQL_ASSOC)){ 
		echo "<div class='item'><span class='replier'>" . $row["commenterName"] . "</span><div class='comment'>" . $row["comment"] . "</div></div>";

	}
}

    
?>