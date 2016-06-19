
	var questionIDCookie = getCookie("questionID");
	//console.log(questionIDCookie);

        var questionID = location.href.split("?");
        questionID = questionID[1];
        var n = 0
        while (n != $(".replier").length) {
                         if ($(".replier")[n].innerHTML.trim() == $("#my_account").text().trim()) {
                                $(".replier")[n].innerHTML = "You";
                               console.log($(".replier")[n].innerHTML);
                            }
                             $(".replier").css({"visibility":"visible"});
                            n++;
                    }
    
        $('.btnAnswer').bind('click', function(event) {
        	
            var answer = document.getElementById("answer").value;
            answer = escape(answer);
           
            var replier = $("#my_account").text().trim();
            if (replier == ""){
                var replier = "Guest";
            }
            var url = "http://mastermind.niitportharcourt.com/answer/index.php";
            
            var date = moment().format();
            
            
            if(answer == "" || answer == " "){
                $(".text-danger").text("Please write something.");
            } else {
            $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        answer: answer,
                        replier: replier,
                        date: date,
                        questionID: questionID
                    },
                    success:function(success){
                        console.log(success);
                        location.reload();
                     },
                error: function() {
                    alert("false");
                
                   }
                });
           
         }
           //}
            event.preventDefault();
         });


//setInterval(function(){
    //            get_Answers();
  //          }, 5000);

        function get_Answers () {
        	  $.ajax
                ({
                    url: '../answer/answer.php',
                    type: 'POST',
                    data: {questionID},
                    success:function(response)
                    {
                    	document.getElementById("answers").innerHTML = response;
                    	n = 0;
                    	$(".date").each(function() {
                                var element =  $(this).text().trim();
                                if (element.search("ago") == -1) {
                               	var d_date = moment(element);


                                this.innerHTML =  d_date.fromNow();
                            }
                            });
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

      //      get_Answers();

