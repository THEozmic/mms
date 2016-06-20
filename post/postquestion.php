<?php
 require("../requires/querydb.php");

 /*Declare and instanciate all variables needed*/
 $questionID = rand();
 $questionID = $questionID.date("dd-ss-mm");
 /*the above code generates random digits(not sure how many) and appends that to the current date, second and minute (repeated twice)*/

 /*Since users may not like the idea of having to give their question a topic, we programatically generate it...*/

 /*firstly, get the question and its details given to this script by the js code @ ask/index.php*/

 $details = $_POST;
 $question = $details["question"];
 $question = test_input($question);
 /*I know we could just access the data from _POST but for understanding sake, let's call it details*/

/*now for the title..*/
$title = substr($question, 0, 40);
if(strlen($title) == 40) {
$title = $title." ...";
}
/*above code just takes out all characters that make the question greater than 40 characters long and replaces them with " ..." */

$status = "unanswered";

/*asker just stores the name of the asker and we get this data from when the user logs in (SESSION), this method makes it impossible for guests to answer*/
$asker = $_SESSION["details"]["name"];

$date = $details["date"];

 
 $sql = "INSERT into `questions` (question, title, status, asker, questionID, date) VALUES ('$question', '$title', '$status', '$asker', '$questionID', '$date')";

  $qry_result = mysql_query($sql) or die(mysql_error());

  echo $qry_result;
?>