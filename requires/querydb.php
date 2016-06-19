<?php
session_start();
require("database_connection.php");
//A function to query the database;
function query($type, $row, $table, $condition, $format, $glue) {
/*
*	$type to specify what type of query e.g insert;
*	$row to specify what row you wish to query;
*	$table to specify what table you want to query;
*	$condition to specify a condition for the query e.g username = elephant;
*	$format to specify what format you wish to get the result of the query e.g "print" to return array, "implode" to 
*	returnimploded form of the query, and raw to return an untouched result- you'll have to modify it in order make 
*	use of it;
*	
*	if you pick implode as your format then you have to specify your glue e.g comma or space character e.g 
*	this "," or this " ";
*	$condition and $glue can be set to null;
* 
*	if glue is set to null the space character will be used;
*	Always assign the result to a new variable so that you can easily carry it around in your code and avoid calling 
*	the function unessesarily; do this $name = query("SELECT", "`name`", "`names`", "nameID = 1", "implode", null);
*/

	if($condition !== null){
 $query = "$type $row FROM $table WHERE $condition";
} else {
	$query = "$type $row FROM $table";
}
 $query = mysql_query($query) or die(mysql_error());
		 if($format == "multiple"){
			 
			 	//$result = mysql_fetch_array($query, MYSQL_ASSOC);
			 	$n = 0;
			 	$a = "";
			 	while ($result = mysql_fetch_array($query, MYSQL_ASSOC)) {
			 		
			 		$a[$n] = $result;
			 		
			 		$n++;
			 		
			 		
			 	}
			 	return $a;
		}

		 if($format == "implode"){
		 	if($glue !== null){
		 		while($result = mysql_fetch_array($query, MYSQL_ASSOC)){
			 		$result = implode("", $result);
			 		return $glue.$result;
				}
			} else {
				while($result = mysql_fetch_array($query, MYSQL_ASSOC)){
			 		$result = implode("", $result);
			 		return " ".$result;
				}
			}


		}
		if($format == "raw"){
		 	while($result = mysql_fetch_array($query, MYSQL_ASSOC)){
			 	return $result;
			}
		}

}

function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
}
?>