<?php
    include("php/funciones/function.php");
    session_start();
    login($_POST["pass"],$_POST["us"]);
    cabecera();
?>

    </head>
    <body>
        <?php 
        menu();
        ?>
   
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            </div>
        </div>
    </div>
</html>
