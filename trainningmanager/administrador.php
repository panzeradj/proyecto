<?php
session_start();
    include("php/funciones/function.php");
    include("busqueda/consultaMe.php");
    include ('Mobile-Detect/Mobile_Detect.php');
    include("notificaciones/funcionesNotificaciones.php"); 
    include("notificaciones/cumple.php"); 
    /*echo "<pre>";
    print_r($_SESSION);
    echo "</pre>";*/
    cabecera();
     if(!empty($_GET["dia"])){
        $_SESSION['dia']=$_GET["dia"];
       // echo "en el dia".$_SESSION['dia'];
     }else{
         $_SESSION['dia']=0;
     }
    
   
   
?>

   
<script type="text/javascript" src="alertify/lib/alertify.js"></script>
<link rel="stylesheet" href="alertify/themes/alertify.core.css" />
<link rel="stylesheet" href="alertify/themes/alertify.default.css" />
<?php
    $mensaje = "Bienvenido ".nombreEntrenador($_SESSION["us"])."";
    
    if(!(empty($_GET["mensaje"]))){
        $cuantos = $_SESSION['dia'];
        $fecha = date('Y-m-j');
        $nuevafecha = strtotime ( '+'.$cuantos.' day' , strtotime ( $fecha ) ) ;
        $nuevafecha = date ( 'j/m/Y' , $nuevafecha );
    }
    ?>
    <script type="text/javascript">
        function ok(){
            alertify.success("<?php echo $mensaje; ?>  <img src='iconos/usuario.png'>"); 
            return false;
        }
        function notificacionOrdenador(){
            alertify.log("Versión Ordenador  <img src='iconos/ordenador.png'>"); 
            return false;
        }
        function diaMasN(){
            alertify.log("Dia mas: <?php echo $nuevafecha; ?> "); 
            return false;
        }
        function diaMenosN(){
            alertify.log("Dia menos: <?php echo $nuevafecha; ?> "); 
            return false;
        }
        function notificacionMovil(){
            alertify.log("Versión Movil  <img src='iconos/movil.png'>"); 
            return false;
        }
        function notificacionTablet(){
            alertify.log("Versión Tablet  <img src='iconos/tablet.png'>"); 
            return false;
        }
        function alerta(){
            alertify.alert("(Notificación temporal)<br/>Leyenda:<span style=color:#ff34b3;font-size:160%>Uno</span>&nbsp;&nbsp;<span style=color:#ff3030;font-size:160%>Dos</span>&nbsp;&nbsp;<span style=color:#ffae1a;font-size:160%>Tres</span>", function () {
                    //aqui introducimos lo que haremos tras cerrar la alerta.
                });
        }
        function notificacionNo(){
            //un confirm
            alertify.confirm("<p>No hay notificaciones ¿Configurarlas ahora? <br><br><b>ENTER</b> y <b>ESC</b> corresponden a <b>Aceptar</b> o <b>Cancelar</b></p>", function (e) {
                if (e) {
                    
                    window.location.href="http://localhost/trainningmanager/notificaciones/configuraNotificacion.php";
                } else { alertify.error("Has cancelado la acción");
                }
            }); 
            return false;
        }
        function cumple(nombre,apellidos,email1){
            alertify.confirm("<p>Es el cumpleaños de "+nombre+" "+apellidos+" al correo "+email+" <br/>¿Desea enviarle un correo?<br><br><b>ENTER</b> y <b>ESC</b> corresponden a <b>Aceptar</b> o <b>Cancelar</b></p>", function (e) {
                if (e) {
            $.ajax({
                url:   'http://localhost/trainningmanager/notificaciones/correo.php',
                type:  'post',
                data: { email : email1 },
                error:function(error){
                    mailError();
                },
                success:  function (data) {
                    mailOk();
                    spam();
                }

            });
                } else { alertify.error("Has cancelado la felicitación");

                }
            }); 
            return false
        }
        function cumpleNo(){
            alertify.log("No hay cumpleaños");  
            return false
        }
        function mailOk(){
            alertify.success("Correo enviado");  
            return false
        }
        function mailError(){
            alertify.log("Error al enviar la felicitación");  
            return false
        }
        function spam(){
            alertify.log("Es posible que el correo enviado entre en SPAM"); 
            return false;
        }
    </script>
<style type="text/css">

    #control{
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
    body, h1{
        
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
    #botones{
        width: 100%;

        display: inline-flex;
        display: -webkit-inline-flex;
        display: -moz-inline-flex;
        display: -ms-inline-flex;

        justify-content:space-around; 
        -webkit-justify-content:space-around; 
        -moz-justify-content:space-around; 
        -ms-justify-content:space-around; 

        flex-wrap: wrap;
        -webkit-flex-wrap: wrap;
        -moz-flex-wrap: wrap;
        -ms-flex-wrap: wrap;
    }
    #botones button{
        color: #fff;
        background-color: #428BCA;
        padding: 6px 12px;
        margin-bottom: 0px;
        font-size: 14px;
        font-weight: 400;
        line-height: 1.42857;
        text-align: center;
        white-space: nowrap;
        vertical-align: middle;
        cursor: pointer;
        -moz-user-select: none;
        background-image: none;
        border: 1px solid transparent;
        border-radius: 4px;
    }
    #botones button:hover{
        background-color: #3071A9;
        border-color: #285E8E;
    }
    .alertify{
        border: 10px solid #77B6D5;
    } 
    .alertify a{
        color: #fff !important;
        text-decoration: 
        box-shadow: none;
    }
    .alertify a:link {   
     text-decoration:none;   
    }
    #leyenda{
        margin-top: 5px;
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
    #leyenda span{
        font-weight: bold;
    } 
</style>
 <script src="http://localhost/trainningmanager/js/jsadministradore.js"></script>
</head>
<body>

    <?php echo "<script type=text/javascript>ok();</script>" ?>
    <?php
        $detect = new Mobile_Detect();
        if ($detect->isTablet()) {
            echo "<script type=text/javascript>notificacionTablet();</script>";
        }else{
            if ($detect->isMobile()) {
                echo "<script type=text/javascript>notificacionMovil();</script>";
            }else{
                echo "<script type=text/javascript>notificacionOrdenador();</script>";
            }
        }
    menu();  
        if(!(empty($_GET["mensaje"]))){
            if($_GET["mensaje"]=="mas"){
                echo "<script type=text/javascript>diaMasN();</script>";
            }
            if($_GET["mensaje"]=="menos"){
                 echo "<script type=text/javascript>diaMenosN();</script>";
            }
        }
        if(!($detect->isMobile())) {
            $hayNotificaciones = compruebaNotificacion();
            if($hayNotificaciones=="no"){
                echo " <script type=text/javascript>notificacionNo();</script>";
                
            }else{
                if($hayNotificaciones=="esta"){

                }else{
                    $cumples = compruebaNotificaciones();
                    if(empty($cumples[0])){
                        echo " <script type=text/javascript>cumpleNo();</script>";
                    }else{
                        foreach ($cumples as $key) {
                            // código php
                            echo "<script>var variableJavascript1 = '".$key['nombre']."'; var variableJavascript2 = '".$key['apellido']."'; var email = '".$key['email']."';
                            cumple(variableJavascript1,variableJavascript2,email);</script>";
                        }
                    }
                }
            }
        }
    ?>
<div id="control">
 
        <div id='calendario'></div>
    <div style="text-center"><h1>Calendario de hoy&nbsp;&nbsp;<img src='iconos/hoy.png'></h1></div>
    <div id="botones">
       <button id="menos" onClick=diaMenos()>Dia menos</button>
       
        <button id="mas" onClick=diaMas()>Dia mas</button>
    </div>
    <p id="leyenda">Leyenda:&nbsp;<span style=color:#ff34b3;>Uno</span>&nbsp;&nbsp;<span style=color:#ff3030;>Dos</span>&nbsp;&nbsp;<span style=color:#ffae1a;>Tres</span></p>
        <?php 
        horariodia($_SESSION['dia']);
        ?>
</div>
    </body>
</html>
