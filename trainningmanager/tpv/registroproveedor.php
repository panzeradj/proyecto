<?php include("../php/funciones/function.php"); include ('../Mobile-Detect/Mobile_Detect.php');
cabecera();    
?>
<html>
<head>
<title>Registro Proveedor</title>
<script type="text/javascript" src="../alertify/lib/alertify.js"></script>
<link rel="stylesheet" href="../alertify/themes/alertify.core.css" />
<link rel="stylesheet" href="../alertify/themes/alertify.default.css" />
<meta charset='utf-8'>
<style type="text/css">
#control{
  width: 50em;
}
hr {
  width: 100%;
  height: 2px;
  margin-left: auto;
  margin-right: auto;
  background-color:#1D99D6;
  color:#FF0066;
  border: 0 none;
}
td{
  text-align: center;
  background-color: #ffffff;
} 
thead td{
  background-color: #eeeeee;
}
</style>
<script type="text/javascript">
    function okprov(){
        alertify.success("Proveedor registrado"); 
        return false;
    }
    function errprov(){
        alertify.error("El Proveedor ya existe"); 
        return false;
    }
    function okborraprov(){
        alertify.error("Proveedor Eliminado"); 
        return false;
    }
</script>
</head>

<body>
<?php menu();?>
<?php 
if(isset($_GET["mensaje"])){
  if($_GET["mensaje"]=="okprov"){
   echo "<script type=text/javascript>okprov();</script>";
  }
  if($_GET["mensaje"]=="errprov"){
     echo "<script type=text/javascript>errprov();</script>";
  }
  if($_GET["mensaje"]=="okborraprov"){
     echo "<script type=text/javascript>okborraprov();</script>";
  }
}
?>
<div id="control">
  <div style="text-center"><h1>Registro Proveedor&nbsp;&nbsp;<img class="img-rounded" src='../iconos/proveedor.png'></h1></div>
  <article> 
  <form name="form1" method="post" action="verificarp.php" >
    
    <label for="sel1">Nombre : </label>
    <input type="text" class="form-control" title="Se necesita un nombre" name="nombre" required maxlength="45">

    <label for="sel1">NIF: </label>
    <input type="text" class="form-control" title="12345678A" pattern="(\d{8})([-]?)([A-Z]{1})" name="nif" maxlength="9" required>

    <label for="sel1">Empresa: </label>
    <input type="text" class="form-control" title="Se necesita una empresa" name="empresa" required  maxlength="45">

    <label for="sel1">Teléfono: </label>
    <input type="number" class="form-control" name="tel" title="Se necesita un telefono" required  maxlength="9">

    <label for="sel1">Direción: </label>
    <input type="text" class="form-control" name="direccion" title="Se necesita una direccion" required  maxlength="128">
    
    <label for="sel1">Código Postal: </label>
    <input type="number" class="form-control" name="cp" title="Se necesita un codigo postal" required  maxlength="5">

    <label for="sel1">Correo Electronico: </label>
    <input type="text" class="form-control" title="correo@servidor.dominio" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$" name="correo" required  maxlength="128">

    <br/>

    <input type="submit" class=" anchoMax  PATEON btn btn-success btn-block  RESET" name="Submit" value="Registrar proveedor">
    <br/>

  </form>
  <hr>
  <h1 align="center">Borrado de proveedores&nbsp;&nbsp;<img class="img-rounded" src='../iconos/borrar.png'></h1>
  <form name="form1" method="post" action="borrado.php">
  <?php
      include ("./funciones/funciones.php");
      $conexion=abre();
      listarproveedores($conexion);
     ?> 
     <br/>
    <input type="submit"class=" anchoMax  PATEON btn btn-danger btn-block  RESET" name="Submit" value="Eliminar proveedor"><br/><br/>
    </form>
    </article> 
</div>
</body>
</html>
