<?php
session_start();
if (($_SESSION["login"] == false) || ($_SESSION["type"] == "guest")) {
header("Location: http://mastermind.niitportharcourt.com/login");
}
require("../requires/header.php");
require("../requires/dashboard.php");
?>

                
    
        <div id="content">
            <?php
        require("../requires/submenu.php");
    ?>
            <div class="main">
            
               
                        <div id="lg">
                            <form name="sentMessage" id="askForm" method="POST" action="http://mastermind.niitportharcourt.com/ask/ask.php" novalidate>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Question</label>
                                        <input type="text" class="form-control" id="title"  name="title" placeholder="Question Title" required data-validation-required-message="You've not typed in a title." required="required"></input>
                                        <p class="help-block text-danger"></p>
                                        <textarea type="text" class="form-control" name="question"  placeholder="Your question" id="question" required data-validation-required-message="You've not typed in a question." required="required"></textarea>
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>
                                <div class="row control-group">
                                    <div class="form-group col-xs-12 floating-label-form-group controls">
                                        <label>Tag</label>
                                            <input type="text" class="form-control" name="tags" placeholder="e.g (Java, xml, sql). " id="tag" required data-validation-required-message="Help others find your question faster." required="required" />
                                            <p class="help-block text-danger"></p>
                                            <input type="text" id="asker" name = "asker" style="display: none"value="<?php echo $_SESSION['user_name'];?>" required="required"/>
                                            <input type="text" name = "date" id= "today" style="display: none" value="" required="required"/>
                                        </div> 
                                    </div>
                                <br>
                                <div id="success"></div>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <button type="submit" class="btnAsk btn">Ask</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
         <script type="text/javascript">
                        var a  = moment(moment().format());
                    $("form").submit(function(){
                        $("#today").val(a._i);
                    });
                    $("#today").val(a._i);
                </script>
        <?php
        require("../requires/footer.php");
    ?>
      
        
