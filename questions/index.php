<?php 
require("../requires/querydb.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>NIIT Online Community</title>
</head>
<body>

<div> Welcome <?php echo $_SESSION["details"]["name"]?></div>
<?php 
    
    //query all data in questions table
    $questions = query("SELECT", "*", "questions LIMIT 30", null, "multiple", "<br>");
    
    //loop through the array of questions returned from the above and output each question
    // I did this so I can easily style each question.
    $i = 0;
    while ($i <= count($questions) - 1) {
        $questionTitle = $questions[$i]["title"];
        $questionID = $questions[$i]["questionID"];
        echo "<div>Question: <a href= ../question/?" . $questionID . " >" . $questionTitle . "</a></div>";
        $i++;        
    }

?>

</body>