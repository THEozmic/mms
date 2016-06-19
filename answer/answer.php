<?php
session_start();
if ($_SESSION["login"] == false) {
    header("Location: http://mastermind.niitportharcourt.com/login");
}

	require("../requires/querydb.php");
	$details = $_POST;// get form details from javascript
    json_encode($details); 
   	$questionID = $details["questionID"];
	$answers = "SELECT answer, replierID, answerID, date FROM answers WHERE questionID = '$questionID' ORDER BY `upvotes`, `date` DESC";
	$answer_result = mysql_query($answers) or die(mysql_error());

	    if (mysql_num_rows($answer_result)==0) {
            echo "<div class='item' id='no-answer'><div class='answer'>No answers. Be the first to answer this.</div></div>";
       }  else {
       	while($row = mysql_fetch_array($answer_result, MYSQL_ASSOC)){
        $studentID = $row["replierID"];
        $name_query = "SELECT `name`  FROM `students` WHERE `studentID` = '$studentID'";
        $name_result = mysql_query($name_query) or die(mysql_error());
        $row3 = mysql_fetch_array($name_result, MYSQL_ASSOC);
        $count = query("SELECT", "upvotes", "questions", "questionID = '$questionID'", "implode", null);
        $answerID = $row["answerID"];
        $date = $row["date"];
        $row["answer"] = urldecode($row["answer"]);
    	echo "<div id='info' style='visibility:hidden'>You've already answered this question. If you want to, you can <a href=''><b>edit</b></a> your answer.<div><button class='btn' id='cancel-info' onclick='close_info()'>No, thanks</button></div></div><div class='item'><span class='date'>".$date."</span></i><span class='replier'>". $row3["name"]. " </span><span class='answer'>". $row["answer"] ." <br /></div><div class='vote'><i class='vote-up fa fa-thumbs-up ".$answerID."'>1+</i><hr class='vertical'><span class='vote-count' id = '". $answerID."'>". $count ."</span><hr class='vertical'><i class='vote-down fa fa-thumbs-down ".$answerID."'>1-</i></div><i></div>";
    		}
	}


    
?>