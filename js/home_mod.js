 setInterval(function(){
                get_questions();
            }, 5000);
            function get_questions() {
                $.ajax
                ({
                    url: 'questions/index.php',
                    type: 'GET',
                    success:function(response)
                    {
                        document.getElementById("questions").innerHTML = response;
                        var a = $(".question").length;
                        var n = 0;
                        var d_date;

                        
                             
                            $(".date").each(function() {
                                var element =  $(this).text().trim();
                                d_date = moment(element);
                                this.innerHTML =  d_date.fromNow();
                            });
                            while (n != a) {
                            $(".date").css({"float" : "right"});
                           // document.getElementById(".date")[n].innerHTML =
                            if ($("#a-asker"+n).text().trim() == $("#my_account").text().trim()) {
                                $("#a-asker"+n).text("You");
                                
                            }
                            n++;

                        }
                    }
                });
            }
            get_questions();
            
