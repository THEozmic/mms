<?php

	session_start();
	$type = $_SESSION["type"];
	$name = urldecode($_SERVER["QUERY_STRING"]);
	if (stripos($name, "'")) {
			header("Location: /mms/");
		}	
	require("../requires/querydb.php");
	
	if (!$type) {
		header("Location: /mms/login");
	}

	require("../requires/header.php");
	require("../requires/dashboard.php");

	
	$userDetails = query("SELECT", "*", "users", "name = '$name'", "raw", null);
	$userID = trim($userDetails["userID"]);
	$user = trim($userDetails["name"]);
	
	$tags = query("SELECT", "tags", "questions", "asker = '$user'", "multiple", null);
	$n = 0; 
	/*while ($n < count($tags)) {
		$a[$n] = $tags[$n]["tags"];
		$n++;
	}
	$n = 0;
	while($n < count($a)) {
		$b = implode(",",$a);
		$n++;
	}

	$c = explode(",", $b);
	$d = array_count_values($c);
	//$number1 = $d["java"];
	//$number2 = $d["Java"];
	//echo max($number1, $number2);*/
	?>
	<div id="content">
     <?php
        require("../requires/submenu.php");
    ?>
    
    <div id="coverPhoto">
    	
    </div>
    <div id="profileImage">
    	<img <?php if($userDetails['gender'] == 'Male') {
    		echo 'src="http://mastermind.niitportharcourt.com/img/male.jpg">';
    	} 
    	if($userDetails['gender'] == 'Female'){
    	 echo 'src="http://mastermind.niitportharcourt.com/img/female.jpg">';
    	 }
    	 ?>
    </div>
    <div id="infoSnippet">
    	<div id="userName"><?php echo $user;?></div>
    	<div id="userCourse"> <?php  if($userDetails["accountType"] == "staff") {
    			echo "Currently a staff @ NIIT";
    		} else {
    			echo "Currently Studying ".$userDetails["course"];
    		}
    		?></div>
    </div>
    <div id="profileContent">
    <div id ="userStats">
    	<div class="caption">
    	<span>Stats</span>
    	</div>
    	<div class="bodyText">
    		<div><?php echo query("SELECT COUNT(", "question)", "questions", "asker = '$user'", "implode", null);?> question(s) asked</div>
    		<div><?php echo query("SELECT COUNT(", "answer)", "answers", "replierID = '$userID'", "implode", null);?> answer(s) given</div>
    		<div><?php echo query("SELECT COUNT(", "answer)", "answers", "status = 1 AND replierID = '$userID'", "implode", null);?> correct answer(s)</div>
    	</div>
    </div>
    <div id ="userAbout">
    	<div class="caption">
    	<span>About</span>
    	</div>
    	<div class="bodyText">

    		<div class="<?php if($user == $_SESSION["user_name"]) {echo "editable";}?>">
    		<i class="fa fa-phone"></i> 
    		<?php 
    		if(isset($_SESSION["user_name"])) {
    			if($user == $_SESSION["user_name"]) {
    				echo '
    		<input class="aboutInput" class="required" id="phone" type="text" maxlength="11" pattern="([0-9]|[0-9]|[0-9])" name="phone" value="'.$userDetails["phone"].'" />';
    			} else {
    				echo $userDetails["phone"];
    			}
    		}
    		?>
    		</div>

    		<div class="<?php if($user == $_SESSION["user_name"]) {echo "editable";}?>">
    		<i class="fa fa-envelope"></i> 
    		<?php 
    		if(isset($_SESSION["user_name"])) {
    			if($user == $_SESSION["user_name"]) {
    				echo '<input class="aboutInput" value="'.$userDetails["email"].'"/>';
    			} else {
    				echo $userDetails["email"];
    			}
    		}
    		?>
    		</div>
    		
    		<div>
    		<i class="fa fa-transgender" aria-hidden="true"></i><?php echo $userDetails["gender"];?>
    		</div>
    	</div>
    </div>
    <!--<div id="userInterest">
    	<div class="caption">
    	<span>Interests</span>
    	</div>
    	<div class="bodyText">
			<span class="tag"><a href="http://mastermind.niitportharcourt.com/tag/?java" class="jbutton">java</a></span>
			<span class="tag"><a href="http://mastermind.niitportharcourt.com/tag/?sql" class="jbutton">sql</a></span>
			<span class="tag"><a href="http://mastermind.niitportharcourt.com/tag/?html" class="jbutton">html</a></span>
    	</div>
    </div>!-->
    </div>
    <script type="text/javascript">
    	$(".editable").each(function(){
    		$(this).hover(function(){$(this).append("<i style='float: right; font-size: 12px; padding:5px' class='fa fa-pencil pencil'></i>");
    			$(this).click(function() {
    				$(".aboutInput").css({"border":"1px solid #b5b5b5","border-radius":"2px"});
    			});
    	}, function(){ 
    		$(".pencil").remove();
    		$(".aboutInput").css({"border":"0"});
    });
    	});

    	$("#phone").keyup(function() {
		    $("#phone").val(this.value.match(/[0-9]*/));
		});
    </script>
<?php
require("../requires/footer.php");
?>

