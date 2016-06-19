<?php
	require("../requires/querydb.php");
	$questiondetails = $_POST;// get form details from javascript
	$questionID = $questiondetails["questionID"];
	$offset = $questiondetails["offset"];
	$offset = 1;
	/*offset relevant for pagination*/
	$answers = query("SELECT", "*", "answers", "questionID = '$questionID' LIMIT $offset,10", "multiple", null);
	
	
	$n = 0;
	if($answers != "" ) {
		while ($n <= count($answers) -1) { 
			$replierID = $answers[$n]["replierID"];
			$replierName = query("SELECT", "name", "users", "userID = '$replierID'", "implode", null);

			echo "<div>".$answers[$n]["answer"]."-<span>". $replierName ."</span>  <span>(". $answers[$n]["date"].")</span></div>";
			$n++;
		}
 	} else {
 		echo "No answers";
 	}
?>