   
            <div class="block">
                <div class="ma-menu">
                <?php 
                if (urldecode($_SERVER["PHP_SELF"]) !== "/mms/index.php"){
                            echo '<a class="jbutton" href="http://mastermind.niitportharcourt.com/"">Questions</a>';
                        }
                    ?>
                                   <?php
                    if (($_SESSION["type"] != "guest") && (!strpos($_SERVER["REQUEST_URI"],'ask')) && (($_SESSION["type"] != "admin"))) {
                        echo "<a class='jbutton' href='http://mastermind.niitportharcourt.com/ask'>Ask Question</a>";
                    } else if ($_SESSION["type"] == "admin"){
                        echo "<a class='jbutton adminify'>Adminify</a>";
                    } else if (urldecode($_SERVER["PHP_SELF"]) !== "index.php") {
                        echo "";
                    } 
                ?>      
                       <!-- <a class="jbutton" href="http://mastermind.niitportharcourt.com/tags">Tags</a>
                        <a class="jbutton" href="http://mastermind.niitportharcourt.com/users">Users</a>
                        <a class="jbutton" href="http://mastermind.niitportharcourt.com/ranks">Ranks</a>
                            !-->
                    <?php
                     if($_SESSION["type"] !== "staff"){ 

                        if (strpos($_SERVER["PHP_SELF"], "staff")){ 
                           header("Location: http://mastermind.niitportharcourt.com/");
                        }
                        if (urldecode($_SERVER["PHP_SELF"]) !== "/assignments/index.php"){
                            echo '<a class="jbutton" href="http://mastermind.niitportharcourt.com/assignments">Assignments</a>';
                        } 
                    } else {
                        if (urldecode($_SERVER["PHP_SELF"]) !== "/staff/index.php"){
                            echo '<a class="jbutton" href="http://mastermind.niitportharcourt.com/staff/">Manage</a>';

                        }
                    }
                        

                       
                    ?>
                    <?php
                        if (urldecode($_SERVER["PHP_SELF"]) !== "/crumbles/index.php"){
                            echo '<a class="jbutton" style="color:#019494" href="http://mastermind.niitportharcourt.com/crumbles">Crumbles</a>';
                        }
                        
                    ?>
                        </div>
                     <?php
                        
                        if (urldecode($_SERVER["PHP_SELF"]) == "/index.php"){
                            echo '</div><div class="page">Questions</div>';
                        } 
                        if(strpos($_SERVER["REQUEST_URI"],'question')){
                            echo '</div><div class="page">' . $_SESSION["question"]. '</div>';
                        }
                         if(strpos($_SERVER["REQUEST_URI"],'crumbles')){
                            echo '</div><div class="page">Crumbles</div>';
                        }

                        if(strpos($_SERVER["REQUEST_URI"],'staff')){
                            echo '</div><div class="page">Manage Assignments</div>';
                        }

                         if(urldecode($_SERVER["PHP_SELF"]) == "/assign_submit/index.php"){
                            echo '</div><div class="page">Upload Assignment</div>';
                        }

                        if(strpos($_SERVER["REQUEST_URI"],'assignments')){
                            echo '</div><div class="page">Assignments</div>';
                        }
                        if (strpos($_SERVER["REQUEST_URI"],'ask')){
                             echo '</div><div class="page">Ask a question</div>';
                        }

                        if (strpos($_SERVER["REQUEST_URI"],'user')){
                             echo '</div><div class="page">User Profile</div>';
                        }

                        
                    ?>
                
                