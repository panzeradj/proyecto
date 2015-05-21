<!DOCTYPE HTML>
<html>
<?php 
include ("../funciones/funciones.php");
$nfactura=$_POST['nfactura'];
?>
<head>
    <meta charset="ISO-8859-1">
    <title>FACTURAS PDF</title>
    <style>
        body {
            font-family: sans-serif, verdana, arial;
        } 
        
        table tr td:first-child
        {
            text-align: right;
        }
    </style>
</head>
<body>
<center>
<h3>GENERAR FACTURAS EN FORMATO PDF</h3>


<form method="post" action="facturas/facturas.php">
    <button type="submit">GENERAR FACTURA PDF</button>
    
    
    
<table>
 <tr>
    <td>ID de factura:</td>
    <td><input type="text" name="id_factura" value="1" size="5"></td>
 </tr>

 <tr>
    <td>Nombre de la tienda:</td>
    <td><input type="text" name="nombre_tienda" value="AC wellness S.L" size="50"></td>
 </tr>
 <tr>
    <td>Dirección de la tienda:</td>
    <td><input type="text" name="direccion_tienda" value="C/ Calle San José Obrero" size="50"></td>
 </tr>
 <tr>
    <td>Población de la tienda:</td>
    <td><input type="text" name="poblacion_tienda" value="Soria" size="25"></td>
 </tr>
 <tr>
    <td>Provincia de la tienda:</td>
    <td><input type="text" name="provincia_tienda" value="Soria" size="25"></td>
 </tr>
 <tr>
    <td>Código Postal de la tienda:</td>
    <td><input type="text" name="codigo_postal_tienda" value="42004" size="5"></td>
 </tr>
 <tr>
    <td>Teléfono de la tienda:</td>
    <td><input type="text" name="telefono_tienda" value="626 888 700" size="15"></td>
 </tr>
 
 <tr>
    <td>Identificacion Fiscal de la tienda:</td>
    <td><input type="text" name="identificacion_fiscal_tienda" value="72892920Z" size="15"></td>
 </tr>
 <tr>
    <td><hr></td>
    <td><hr></td>
 </tr>
 

</table>



<input type="hidden" name="unidades" value="<?php echo $unidades; ?>">
<input type="hidden" name="productos" value="<?php echo $productos; ?>">
<input type="hidden" name="precio_unidad" value="<?php echo $precio_unidad; ?>">
<!-- Campo que hace la llamada al script que genera la factura -->
<input type="hidden" name="generar_factura" value="true">
</form>
<br><br><br><br>
</center>
</body>

</html>