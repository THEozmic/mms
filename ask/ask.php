<?php
session_start();
	require("../requires/database_connection.php");
	$details = $_POST;// get form details from javascript
    json_encode($details); 
    $questionID = rand();
    $questionID = $questionID.date("dd-ss");
    $title = strip_tags(addslashes($_POST["title"]));
    $question = strip_tags(addslashes($_POST["question"]));
    $status = "unanswered";
    $asker = $_SESSION["user_name"];
    $tags = strip_tags(addslashes($_POST["tags"]));
    $date = strip_tags(addslashes($_POST["date"]));
    if(!empty($question) || !empty($title)) {
	$sql = "INSERT into `questions` (questionID, title, question, status, asker, date, tags) VALUES ('$questionID', '$title', '$question', '$status', '$asker', '$date', '$tags')";
	$qry_result = mysql_query($sql) or die(mysql_error());
    header("location: http://mastermind.niitportharcourt.com/");
} else {
    header("Location: http://mastermind.niitportharcourt.com/");
}
?>