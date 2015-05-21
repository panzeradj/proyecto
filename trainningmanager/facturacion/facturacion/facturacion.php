<?php include("../../php/funciones/function.php");
cabecera();
?>
<!DOCTYPE html>
<html lang="es">
<head>
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
    <?php menu(); ?>
    <div id="control">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <button class=" anchoMax  PATEON btn btn-primary btn-block  RESET" onclick="location.href='generarexcel.php'">Click aquí para generar archivo Excel</button>
                </div>
            </div>
        </div>
    </div>
</body>
</html>