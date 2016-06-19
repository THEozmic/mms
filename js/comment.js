 $('#post-comment').bind('click', function(event) {
            var comment = document.getElementById("comment-box").value;
            var commenterName = document.getElementById("my_account").innerHTML;
            var questionID = location.href.split("?");
            questionID = questionID[1];
            comment = escape(comment);
            var date = moment().format();
            if(comment == "" || comment == " "){
                console.log("nope!");
            } else {


            $.ajax({
                    url: "http://mastermind.niitportharcourt.com/comments/comment.php",
                    type: "POST",
                    data: {
                        comment: comment,
                        commenterName: commenterName,
                        questionID: questionID,
                        date: date
                    },
                    success:function(success){
                        console.log(success);
                        
                        if(success == "true") {
                            get_comments();
                             $( "#post-comment" ).prop( "disabled", true ); //Disable
                             $("#comment-box").prop("disabled", true) // Disable
                                setInterval(function(){
                               $( "#post-comment" ).prop( "disabled", false ); //Enable
                               $("#comment-box").prop("disabled", false) //Enable
                            }, 15000);
                        }
                    },
                error: function() {
                    alert("false");
                
                   }

                });

        } 
        document.getElementById("comment-box").value = "";
        event.preventDefault();
        });

 setInterval(function(){
                get_comments();
            }, 5000);
var questionID = location.href.split("?");
            questionID = questionID[1];
            function get_comments() {
                $.ajax
                ({
                    url: '../comments/index.php',
                    type: 'POST',
                    data: {questionID},
                    success:function(response)
                    {
                        document.getElementById("comments").innerHTML = response;
                        var n = 0;
             var ab;
                while ( n != $(".comment, .answer").length) {
             ab = $(".comment, .answer")[n].innerHTML;
                    ab = unescape(ab);
                   $(".comment, .answer")[n].innerHTML = ab;  
                   n++;
               }   n = 0;
                    while (n != $(".replier").length) {
                         if ($(".replier")[n].innerHTML.trim() == $("#my_account").text().trim()) {
                                $(".replier")[n].innerHTML = "You";
                               
                            }
                             $(".replier").css({"visibility":"visible"});
                            n++;
                    }
                    
                    }
                });
            }

            get_comments();

