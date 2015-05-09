<?php
    include("php/funciones/function.php");
    cabecera();
    login($_POST["pass"],$_POST["us"]);
?>

    </head>
    <body>
        <?php 
        menu();
        horariodia();
        ?>
   
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            </div>
        </div>
    </div>
</html>
