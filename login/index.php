<?php
    session_start();
   session_destroy();
    require("../requires/header.php");
    require("../requires/dashboard.php");
?>



<div id="content" style="visibility:hidden">
   
          
<div id="login-content">
                  
                        <form name="sentMessage" id="loginForm" novalidate>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Ciroma Chukwuma Adekunle" id="name" required data-validation-required-message="Please enter your name.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <div class="row control-group">
                                <div class="form-group col-xs-12 floating-label-form-group controls">
                                    <label>Random Numbers</label>
                                    <input type="text" class="form-control" name="randnum" placeholder="123456789" id="randnum" required data-validation-required-message="Please enter your random numbers.">
                                    <p class="help-block text-danger"></p>
                                </div>
                            </div>
                            <br>
                            <div id="success"></div>
                            <div class="row">
                                <div class="form-group col-xs-12">
                                    <button type="submit" class="btn" id="btnSubmit">Student Login</button>
                                    <button class="btn staff-btn secondary-btn">Staff Login</button>
                                </div>
                            </div>
                            <a href="http://alem.com.ng" style="display: none;text-align: justify;float: right; margin: 15px;"class="jbutton">Developer</a>
                        </form>
                    </div>
                </div>
                    </div>
                    </div>
        
        <script type="text/javascript">
    
        $("#content, #login-content").css({"visibility":"visible"});
    </script>

    
<style type="text/css">
    body {
        background: url("http://mastermind.niitportharcourt.com/img/cover.jpg") no-repeat;
    }
</style><script src="http://mastermind.niitportharcourt.com/js/jqBootstrapValidation.js"></script><script src="http://mastermind.niitportharcourt.com/js/login.js" async></script><script src="http://mastermind.niitportharcourt.com/js/main.js"></script><link href="http://mastermind.niitportharcourt.com/css/bootstrap.min.css" rel="stylesheet">
    </body>

    

