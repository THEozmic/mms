

$('.vote-down, .vote-up').bind('click', function(event) {
            var ID = this.getAttribute("class");
            //check which of the votes is being clicked
            var vote = ID.search("up");
            //if ID doesn't contain "up" then vote will be == -1 else vote == index position of "u" in the string ID;

            //if vote !== -1 then set vote to 1; so that vote is either 1 or -1;
            if (vote != -1) {

            	vote = 1;
        	}
            //split the class into 4 parts, dividing them at the point where a space character occurs
            ID = ID.split(" ", 4);
            //split returns array, then pick the last element at index 3, which is the ID;
            ID = ID[3];

            //ID will be used to identify the particular answer being upvoted or downvoted;




            
            var replier = $("#my_account").text().trim();
            if (replier == ""){
                alert("You need to be logged in to vote.");
            } else {
            
           var questionID = location.href.split("?");
            questionID = questionID[1];
                $.ajax({
                    url: "http://mastermind.niitportharcourt.com/vote/vote.php",
                    type: "POST",
                    data: {
                        answerID: ID,
                        vote: vote,
                        questionID: questionID 
                    },
                    success:function(success){
                        console.log(success+" "+ID);
                        if (success == "false") {
                            alert("false");
                        } else { 
                           var a =  $("#"+ ID).text();
                           var total = parseInt(a) + parseInt(success);

                           $("#"+ ID).text(total);
                           remove
                           
                        }
                    }
                });
           
         }
     
         event.preventDefault();
         });

