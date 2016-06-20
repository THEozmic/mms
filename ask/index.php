<textarea id="question" name="question"></textarea>
<button id="postquestion">Post Question</button>

<script src="../js/jquery.js"></script>
<script type="text/javascript" defer>
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

    $("#postquestion").click(function(){
        var question = $("#question").val();
        question = question.trim();
        if(question !== ""){
            $.post("../post/postquestion.php", 
            {
                question: question,
                date: date

            }, function(response){
                if(response == 1) {
                    location.href = "../questions/index.php";
                } else {
                    /*let the user know an error has occured*/
                }
            });
        }
    });
</script>