<textarea id="questionbody" name="questionbody"></textarea>
<button id="postquestion">Post Question</button>

<script src="../js/jquery.js"></script>
<script type="text/javascript" defer>
    $("#postquestion").click(function(){
        var questionbody = $("#questionbody").val();
        questionbody = questionbody.trim();
        if(questionbody !== ""){
            $.post("../post/postquestion.php", questionbody, function(response){
                alert(response);
            });
        }
    });
</script>

