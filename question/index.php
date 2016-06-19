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
All answers: <div id="allanswers"></div>
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
<div id="warning" style="display: none; background-color: red">You've already answered<span style="background-color:grey;" id="warningclose">x</span></div>
<!--angular js for answer preview (to be further developed...) !-->
<div ng-app="">
 
<p> Your answer</p>
h
<!-- Display answer preview here...!-->
<p ng-bind="name" id="youranswer"></p>

<!-- answer textarea to collect user answers!-->
<p><textarea ng-model="name" id = "newanswer"></textarea></p>

</div>

<script src="http://localhost/mms/js/jquery.js"></script>
<script src="http://localhost/mms/js/angular.min.js" async></script>
<button onclick="do_newanswer()" id="postanswerbtn">Post Answer</button>
<script type="text/javascript">
    var offset = 0; 
        $(".page").click(function(event) {
            var page = $(this).attr("href");
            page = page.replace("#","");
            offset = parseInt((page*5)-5);
            getanswers();
            event.preventDefault();
        });
      
      

    function getanswers(){
        $.post("../get/getanswers.php",{
                questionID: <?php echo '"'.$questionID.'"'?>,
                offset: offset
              },
              function(data) {
                $("#allanswers").html(data);
              });
    }
    getanswers();
    var do_newanswer =  function() {
        if (getCookie("questionID") == <?php echo '"'.$questionID.'"'?>) {
            /*Tell user that they've answered this question before*/
            $("#warning").show();

        } else {
       

            /*get the value of the textarea*/
            var answer = document.getElementById("newanswer").value;

            /*purify answer to remove all unwanted characters*/
            answer = purify(answer);

            /* Some tricky logic (in next code)
                AIM: modify javascript "Date array" to suit our needs

                1. create a js date object. note: Date function returns array to we pick only parts of the array
                    we need.
                2. take away and modify the time part of the date array since what we have is something like this: 09:22:45. we only want 09:22
                3. join the time part back to the date variable, but before that, determine what time of day 
                    it is (AM or PM); add that to the array
                4. add an "at" to the array
                5. convert everything to string which will be put to database.
            */
            
             /*Disable textarea and post button to prevent accidental multiple submit*/
            $("#newanswer").val("").prop('disabled',true);
            /*be careful where to put the above code since it changes the value of the answer*/
            $("#postanswerbtn").prop('disabled',true);

            var date = Date().split(" ", 5);
            var time = date[4].split(":", 3);
            var hours = parseInt(time[0]);

                /*determining time of day...*/
            if(hours >= 0 && hours < 12) {
                date.splice(5, 0, "am");  /*morning*/
             }
             else if(hours >= 12 && hours <= 24) {
                hours = hours - 12;
                date.splice(5, 0, "pm"); /*after morning and noon*/
             }

             /* picking out the first part of the time e.g "09" and putting our brand new hour to it...*/
             time[0] = hours.toString();

             /* removing the "45" part of the time...*/
             time.pop(2);

             /* converting back to string...*/
             date[4] = time.join(":");

             /*adding the "at" to it...*/
             date.splice(4, 0, "at");

             /*finally, bringing it all together...*/
             date = date.join(" ");
             
            if (answer !== "") {
                $.post("../post/postanswer.php",
                  {
                    answer:answer,
                    questionID: <?php echo '"'.$questionID.'"'?>,
                    date: date

                  },
                  function(data){
                        $("#youranswer").text("");

                        getanswers();

                        /*Enable textarea and answer post button + add a cookie to notify user that they've already posted answer for that question*/

                        $("#postanswerbtn, #newanswer").prop('disabled',false);

                        /*Store the questionID as a cookie for a year*/
                        setCookie("questionID", <?php echo '"'.$questionID.'"'?>, 365 );

                    });
                
                } else {
                    $("#youranswer").text("invalid answer.");
            }
        }

        /*don't forget to remove the warning if it ever gets shown*/
        $("#warningclose").click(function(){
            $("#warning").hide();

        });
    }

    /* THE PURIFIER */
    function purify(input) {
        input = input.toLowerCase().trim();
        return input;
    }
      
    /*cookie setter*/
    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+d.toUTCString();
        document.cookie = cname + "=" + cvalue + "; " + expires;
    }

    /*cookie getter*/
    function getCookie(cname) {
        var name = cname + "=";
        var ca = document.cookie.split(';');
        for(var i=0; i<ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0)==' ') c = c.substring(1);
            if (c.indexOf(name) == 0) return c.substring(name.length, c.length);
        }
        return "";
    }
  
</script>