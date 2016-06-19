<?php
session_start();
if ($_SESSION["login"] == false) {
    header("Location: http://mastermind.niitportharcourt.com/login");
}
require("../requires/header.php");
require("../requires/dashboard.php");
?>
<script type="text/javascript" src="../scripts/shCore.js"></script>
            <script type="text/javascript" src="../scripts/shBrushJava.js"></script>
            <link type="text/css" rel="stylesheet" href="../styles/shCoreDefault.css"/>
            <script type="text/javascript">SyntaxHighlighter.all();</script>
    
 <div id="content">
     <?php
        require("../requires/submenu.php");
    ?>
    <div class="main">
        
        <div id="mid-section" style="border-top: 0;">
            <div class="lecture">
            	<div class= "title"><div class="date">Saturday, May 22, 2016</div><h3>Java Methods</h3></div>
            	
            	<div class="lecture-content"><p>Java MethodsJava MethodsJava MethodsJava Java MethodsJava MethodsMethodsJava MethodsJava Methods<br />Java MethodsJava MethodsJava MethodsJava MethodsJava Methods<p>Java Java MethodsMethodsJavaJavaJava</p> Methods Methods MethodsJava MethodsJava Methods<strong>Java MethodsJava Methods</strong></p></div>
            </div>
            <div class="lecture">
            	<div class= "title"><div class="date">Friday, May 21, 2016</div><h3>Java Data Types</h3></div>
            	
            	<div class="lecture-content"><p>Java Data TypesJavaJava Data Java Data TypesTypesJava Data Types Data TypesJava Data Types<br />Java Data TypesJava Data TypesJava Data Java Data Java Java Java Data TypesData TypesData TypesTypesTypes<strong>JavaJava DataJava Data Java Data TypesTypes Types Data Types</strong><i>Java Data Types</i><p>Java Data TypesJavaJava Data Java Data TypesTypesJava Data Types Data TypesJava Data Types<br />Java Data TypesJava Data TypesJava Data Java Data Java Java <pre class='brush: java;'>Java Data TypesData
TypesData TypesTypesTypes</pre><strong>JavaJava DataJava Data Java Data TypesTypes Types Data Types</strong><i>Java Data Types</i></p></p></div>
            </div>
        </div>
    </div>
    </div>
    </body>
<style type="text/css">
    .date {
    /* display: inline-block; */
    float: right;
    /* position: relative; */
    background-color: #FF9800;
    border-radius: 2px;
    font-size: 11px;
    margin-left: 10px;
}
</style>
    <?php
        require("../requires/footer.php");
    ?>

