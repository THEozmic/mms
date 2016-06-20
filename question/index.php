
<?php 
    require("../requires/querydb.php");
    $questionID = test_input($_SERVER['QUERY_STRING']);
    $question = query("SELECT", "*", "questions", "questionID = '$questionID'", "raw", null);
    echo "Question Title: ". $question["title"]. "<br>";
    echo "Question Body: ". $question["question"]. "<br>";
    echo "Question Asker: ". $question["asker"]. "<br>";
    echo "Question Upvotes: ". $question["upvotes"]. "<br>";
    echo "Question Downvotes: ". $question["downvotes"]. "<br>";
    echo "Question Status: ". $question["status"]. "<br>";
?>
All answers: <div id="allanswers">...fetching answers...</div>
page: 
<div> 
<?php 
    $n = 1;
    $questioncount = query("SELECT", "COUNT(*)", "answers", "questionID = '$questionID'", "implode", null);
    $m = $questioncount/5;
   do { 
    echo "<a class='page' href='#".$n."'>". $n. "</a> ";
    $n++;
}while ($n <= $m);
        
    
?>

</div>

<!--angular js for answer preview (to be further developed...) !-->
<div ng-app="">
 
<p> Your answer</p>

<!-- Display answer preview here...!-->
<p ng-bind="name" id="youranswer"></p>

<!-- answer textarea to collect user answers!-->
<p><textarea ng-model="name" id = "newanswer"></textarea></p>

</div>
<script src="http://localhost/mms/js/jquery.js"></script>

<button onclick="do_newanswer()" id="postanswerbtn">Post Answer</button>
<script src="http://localhost/mms/js/angular.min.js" async></script>
<?php require("../js/corejs");?>