<?php

 session_start();
if (($_SESSION["login"] == false) || ($_SESSION["type"] == "guest")) {
header("Location: http://mastermind.niitportharcourt.com/login");
}

require("../requires/header.php");
require("../requires/dashboard.php");
require("../requires/querydb.php");
$staff = $_POST["staff"];
$target_dir = "uploads/student/";
$target_file = $_FILES["file-1"]["name"][0];
$allowedExts = array(
  "pdf"
); 

$allowedMimeTypes = array( 
  'application/pdf'
);

function stopExecution($error) {
	echo $error."<a href='../assignments'><div class='btn'>Ok</div></a></div></body>";
	require("../requires/footer.php");
	die();

}
?>
       <div id="content">
     <?php
        require("../requires/submenu.php");
    ?>
    </div>
       <div id="mid-section" style="border-top: 0;">
         <?php

$extension = end(explode(".", $_FILES["file-1"]["name"][0]));
if (file_exists($target_dir.$target_file)) {

    
    stopExecution("I think you've already submitted, you can't submit twice.");
   
}

if ( $_FILES["file-1"]["size"][0] > 10000000 ) {
 
      stopExecution("This file exceeds the maximum allowed size (10 mb).");

}

if ( ! ( in_array($extension, $allowedExts ) ) ) {
	
    stopExecution("You can't submit files other than pdf files.");
}

if ( in_array( $_FILES["file-1"]["type"][0], $allowedMimeTypes ) ) 
{      
	$n = 0;
	while ($n < count($_FILES["file-1"]["name"])) {
		
		 move_uploaded_file($_FILES["file-1"]["tmp_name"][$n], $target_dir . $_FILES["file-1"]["name"][$n]);
		 $directory = $target_dir.$target_file;
		 $trimmedstaff = trim($staff);
		 $staffID = query("SELECT", "staffID", "staffs", "name = '$trimmedstaff'", "raw", null);
		 $staffID = $staffID["staffID"];
		 $fileType = $extension;
		 $studentID = $_POST["studentID"];
		 $class = trim($_POST["class"]);
		 $studentID = trim($studentID);
			$sql = "INSERT into `uploads` (directory, staffID, fileType, studentID, class) VALUES ('$directory', '$staffID', '$fileType', '$studentID', '$class')";
			$qry_result = mysql_query($sql) or die(mysql_error());
			
			$n++;
		}
		 echo "Great and thanks for submiting. ".$staff." will see your assignment shortly."; 
}
else
{
    stopExecution("Please provide another file type.");
}
?>
       <a href="../assignments"> <div class="btn">Ok</div></a>
   
    </div>
    </body>

    <?php
        require("../requires/footer.php");
    ?>

       