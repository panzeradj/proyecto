<?php
session_start();
    include("php/funciones/function.php");
    // if(!empty($_POST["pass"])){
    login($_POST["pass"],$_POST["us"]);

    cabecera();
   
?>
<style type="text/css">
    #control{
    
    }
    body{
        
        width: 100%;

        display: inline-flex;
        display: -webkit-inline-flex;
        display: -moz-inline-flex;
        display: -ms-inline-flex;

        justify-content:center; 
        -webkit-justify-content:center; 
        -moz-justify-content:center; 
        -ms-justify-content:center; 

        flex-wrap: wrap;
        -webkit-flex-wrap: wrap;
        -moz-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
    }
</style>
</head>
<body>
    <div id="control">
        <?php 
        menu();
        horariodia();
        ?>
    </div>
</html>
