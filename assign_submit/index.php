<?php
 session_start();
if (($_SESSION["login"] == false) || ($_SESSION["type"] == "guest")) {
header("Location: http://mastermind.niitportharcourt.com/login");
}
require("../requires/header.php");
require("../requires/dashboard.php");
require("../requires/querydb.php");
$assignmentID =  urldecode($_SERVER["QUERY_STRING"]);
    if (stripos($assignmentID, "'")) {
            die("Sorry, an error occured. Click <a href='../'>here</a> to go try again");
        }
$staff = query("SELECT", "assigner", "assignments", "assignmentID = '$assignmentID'", "implode", null);
?>
<div id="content">
     <?php
        require("../requires/submenu.php");
    ?>
    </div>
<script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
<link rel="stylesheet" type="text/css" href="../css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="../css/demo.css" />
		<link rel="stylesheet" type="text/css" href="../css/component.css" />
<!--<form action="http://mastermind.niitportharcourt.com/assign_submit/uploader.php" method="post" enctype="multipart/form-data">
    <div class="big">Select Assignment file(s) to upload</div>
					<input type="file" name="file-1[]" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" multiple required="required" />
					<label for="file-1"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg> <span>Choose a file&hellip;</span></label>
    <input type="text" name="staff" style="display: none;" value="<?php echo $staff?>"></input>
    <input type="text" name="studentID" style="display: none;" value="<?php echo $_SESSION['studentID']?>"></input>
    <input type="text" name="class" style="display: none;" value="<?php echo $_SESSION['class']?>"></input>
    <input type="submit" class="btn" id="upload-btn" value="Upload Assignment" name="submit" required="required">
    <button class="btn back" style="display: flex; margin-top: 10px; background-color: #a42d08;">I don't want to submit now</button>

    <br><span>You can upload only <strong style="color: #FF5722">PDF</strong> files. Click <a href="http://mastermind.niitportharcourt.com/crumbles#file-conversion" class="jbutton">here</a> to find out how to convert other files to PDF.</span>

</form>!-->
<script src="../js/custom-file-input.js"></script>
    </div>
    </body>

    <?php
        require("../requires/footer.php");
    ?>

