<!DOCTYPE HTML> 
<html>
<head>
<style>
.error {color: #FF0000;}
</style>
</head>
<body> 

<?php
require("requires/querydb.php");
// define variables and set to empty values
$fullnameErr = $randnumErr = "";
$randnum = $loginErr = $fullname = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   if (empty($_POST["fullname"])) {
     $fullnameErr = "Full Name is required.";
   } else {
     $fullname = test_input($_POST["fullname"]);
     // check if name only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$fullname)) {
       $fullnameErr = "Only letters and white space allowed."; 
     }
   }
   

   if (empty($_POST["randnum"])) {
     $randnumErr = "Random Numbers are required.";
   } else {
     $randnum = test_input($_POST["randnum"]);
   // check if name only contains letters and whitespace
  }

  $details = query("SELECT", "*", "users", "randnum = '$randnum' AND name = '$fullname'", "raw", null);
if($details == "") {
  $loginErr = "Sorry, your details do not match our records.";
  echo $loginErr;
} else {
 $_SESSION["details"] = $details;
 header("Location: http://localhost/mms/questions");

}
}
?>

<h2>PHP Form Validation Example</h2>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
   Full Name: <input type="text" name="fullname" value="<?php echo $fullname;?>">
   <span class="error">* <?php echo $fullnameErr;?></span>
   <br><br>
   Random Numbers: <input type="text" name="randnum" value="<?php echo $randnum;?>">
   <span class="error">* <?php echo $randnumErr;?></span>
   <br><br>
   <input type="submit" name="submit" value="Submit"> 
</form>
</body>
</html>