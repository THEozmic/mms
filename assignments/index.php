<?php
 session_start();
if (($_SESSION["login"] == false) || ($_SESSION["type"] == "guest")) {
header("Location: http://mastermind.niitportharcourt.com/login");
}
require("../requires/header.php");
require("../requires/dashboard.php");
require("../requires/querydb.php");
?>

        <div id="content">
            <?php
        require("../requires/submenu.php");?>
        <div id = "get-assign">
        <?php
        $class = trim($_SESSION["class"]); 
        $assignments = "SELECT title, directory, assignmentID, assigner, dateDue, dateGiven FROM assignments WHERE assignee = '$class'ORDER BY `dateGiven` DESC";
        
        	  $assignments_result = mysql_query($assignments) or die(mysql_error());
        	while($assignments = mysql_fetch_array($assignments_result, MYSQL_ASSOC)){ 
        		echo "<a download href = '".$assignments["directory"]."'><div class='assignment'>" . $assignments["title"] . "</a><div class='assign'>Due<span class='date'>". $assignments["dateDue"] ."</span></div><div class=' assign'>Given<span class='date'>". $assignments["dateGiven"] ."</span></div><div class='assign replier' >".$assignments["assigner"]."</div></div>";
        	}
        ?>
        </div>
        <script type="text/javascript">
             $(".date").each(function() {
                                var element =  $(this).text().trim();
                                var d_date = moment(element);
                                this.innerHTML =  d_date.fromNow();
                            });
        </script>
<?php require("../requires/footer.php");
?>

<!--<a href='http://mastermind.niitportharcourt.com/assign_submit/uploader.php?".$assignments["assignmentID"]."'><div class='btn assign' id='". $assignments["assignmentID"]."'>View</div></a>!-->