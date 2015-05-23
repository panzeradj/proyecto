<?php
include ("../../funciones/funciones.php");
$conexion=abre();
if ($_POST["generar_factura"] == "true")
{

//Recibir detalles de factura

$nfactura=$_POST["nfactura"];
//echo $nfactura;
$orden="SELECT fecha  FROM facturas f WHERE id_factura=".$nfactura.";";
    $chorizo=$conexion->query($orden);
    $registro = $chorizo->fetch_array();
$fecha_factura = $registro[0];


//Recibir los datos de la empresa
$nombre_tienda = "AC wellness S.L";
$direccion_tienda = "C/ Calle San José Obrero";
$poblacion_tienda = "Soria";
$provincia_tienda = "Soria";
$codigo_postal_tienda = "42004";
$telefono_tienda = "626 888 700";
$identificacion_fiscal_tienda = "72892920Z";

//Recibir los datos del cliente
$orden="SELECT c.nombre,c.apellido  FROM facturas f,clientes c WHERE f.cliente=c.id_cliente and f.id_factura=".$nfactura.";";
$chorizo=$conexion->query($orden);
$registro = $chorizo->fetch_array();
$nombre_cliente = $registro[0];
$apellidos_cliente =$registro[1];


//variable que guarda el nombre del archivo PDF
$archivo="factura-$nfactura.pdf";

//Llamada al script fpdf
require('fpdf.php');


$archivo_de_salida=$archivo;

$pdf=new FPDF();  //crea el objeto
$pdf->AddPage();  //añadimos una página. Origen coordenadas, esquina superior izquierda, posición por defeto a 1 cm de los bordes.


//logo de la tienda
$pdf->Image('../empresa.jpg' , 0 ,0, 40 , 40,'JPG', 'http://php-estudios.blogspot.com');

// Encabezado de la factura
$pdf->SetFont('Arial','B',14);
$pdf->Cell(190, 10, "FACTURA", 0, 2, "C");
$pdf->SetFont('Arial','B',10);
$pdf->MultiCell(190,5, "Número de factura: $nfactura"."\n"."Fecha: $fecha_factura", 0, "C", false);
$pdf->Ln(2);

// Datos de la tienda
$pdf->SetFont('Arial','B',12);
$top_datos=45;
$pdf->SetXY(40, $top_datos);
$pdf->Cell(190, 10, "Datos de la tienda:", 0, 2, "J");
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(190, //posición X
5, //posición Y
$nombre_tienda."\n".
"Dirección: ".$direccion_tienda."\n".
"Población: ".$poblacion_tienda."\n".
"Provincia: ".$provincia_tienda."\n".
"Código Postal: ".$codigo_postal_tienda."\n".
"Teléfono: ".$telefono_tienda."\n".

"Indentificación Fiscal: ".$identificacion_fiscal_tienda,
 0, // bordes 0 = no | 1 = si
 "J", // texto justificado 
 false);


// Datos del cliente
$pdf->SetFont('Arial','B',12);
$pdf->SetXY(125, $top_datos);
$pdf->Cell(190, 10, "Datos del cliente:", 0, 2, "J");
$pdf->SetFont('Arial','',9);
$pdf->MultiCell(
190, //posición X
5, //posicion Y
"Nombre: ".$nombre_cliente."\n".
"Apellidos: ".$apellidos_cliente, 
0, // bordes 0 = no | 1 = si
"J", // texto justificado
false);

//Salto de línea
$pdf->Ln(2);



// extracción de los datos de los productos a través de la función explode
$e_productos = explode(",", $productos);
$e_unidades = explode(",", $unidades);
$e_precio_unidad = explode(",", $precio_unidad);

//Creación de la tabla de los detalles de los productos productos
$top_productos = 110;
    $pdf->SetXY(15, $top_productos);
    $pdf->Cell(40, 5, 'CODIGO', 0, 1, 'C');
    $pdf->SetXY(50, $top_productos);
    $pdf->Cell(40, 5, 'PRODUCTO', 0, 1, 'C');
    $pdf->SetXY(85, $top_productos);
    $pdf->Cell(40, 5, 'CANTIDAD', 0, 1, 'C'); 
    $pdf->SetXY(115, $top_productos);
    $pdf->Cell(40, 5, 'PRECIO UNIDAD', 0, 1, 'C'); 
    $pdf->SetXY(145, $top_productos);
    $pdf->Cell(40, 5, 'PRECIO TOTAL', 0, 1, 'C');   
 
$precio_subtotal = 0; // variable para almacenar el subtotal
$y = 115; // variable para la posición top desde la cual se empezarán a agregar los datos
$x=0;

$orden="SELECT p.nombre, p.valor_sin_iva,l.cantidad,l.producto FROM productos p,lineas_factura l
where p.id_producto=l.producto and l.factura=".$nfactura.";";
$chorizo = $conexion->query($orden);
while($registro = $chorizo->fetch_array())
{
$pdf->SetFont('Arial','',8);
    $pdf->SetXY(15, $y);
    $pdf->Cell(40, 5, $registro[3], 0, 1, 'C');
    $pdf->SetXY(50, $y);
    $pdf->Cell(40, 5, $registro[0], 0, 1, 'C');
    $pdf->SetXY(85, $y);
    $pdf->Cell(40, 5, $registro[2], 0, 1, 'C');
    $pdf->SetXY(115, $y);
    $pdf->Cell(40, 5, $registro[1]." ", 0, 1, 'C');
    $pdf->SetXY(145, $y);
    $pdf->Cell(40, 5, $registro[1]*$registro[2]." ", 0, 1, 'C');

//Cálculo del subtotal 	
$subtotal=$registro[1]*$registro[2]+$subtotal;

// aumento del top 5 cm
$y = $y + 5;
}
$orden="SELECT producto from lineas_factura where factura=".$nfactura." and producto<200000";
if ($chorizo = $conexion->query($orden)){
            
            
        // Recorremos el resultset fila a fila
         while ($registro = $chorizo->fetch_array()) {
                    $cod_clase=$registro[0];
                    $orden="SELECT anyo, mes, dia, cliente, cancelada from reservas where id_reserva=".$registro[0].";";
                    if ($reserva = $conexion->query($orden)){
                        $fecha= $reserva->fetch_array();
                        //echo $fecha[0].$fecha[1].$fecha[2].$fecha[3];
                        $estadoclase=$fecha[4];
                        if ($fecha[1]<10){
                            if ($fecha[2]<10) {
                                $dia=$fecha[0]."-0".$fecha[1]."-0".$fecha[2];
                            }else{
                                $dia=$fecha[0]."-0".$fecha[1]."-".$fecha[2];
                            }
                        }else{
                            if ($fecha[2]<10) {
                                $dia=$fecha[0]."-".$fecha[1]."-0".$fecha[2];
                            }else{
                                $dia=$fecha[0]."-".$fecha[1]."-".$fecha[2];
                            }
                        }
                        $orden="SELECT valor_sin_iva,p.tarifa from precios_tarifas p,contratos c
                                    where c.tarifa=p.tarifa and cliente=".$fecha[3]."
                                    and fecha_inicial<'".$dia."'
                                    order by fecha_inicial desc limit 1;";
                                    //echo $orden;
                        $listavalor= $conexion->query($orden);
                        $resultadoprecio=$listavalor->fetch_array();
                        $precio=$resultadoprecio[0];
                        $tarifa=$resultadoprecio[1];
                        $orden="SELECT nombre FROM tarifas p where id_tarifa=".$tarifa.";";
                        $des= $conexion->query($orden);
                        $nombre=$des->fetch_array();
                        $nombretarifa="Clase ".$nombre[0]." (".$dia.")";

                        if($estadoclase==2){
                            $nombretarifa="Clase ".$nombre[0]." (".$dia.") (Con recargo)";
                        }

                        $pdf->SetFont('Arial','',8);

                        $pdf->SetXY(15, $y);
                        $pdf->Cell(40, 5, $cod_clase, 0, 1, 'C');   
                        $pdf->SetXY(50, $y);
                        $pdf->Cell(40, 5,$nombretarifa, 0, 1, 'C');
                        $pdf->SetXY(85, $y);
                        $pdf->Cell(40, 5, 1, 0, 1, 'C');
                        $pdf->SetXY(115, $y);
                        $pdf->Cell(40, 5, $precio." ", 0, 1, 'C');
                        $pdf->SetXY(145, $y);
                        $pdf->Cell(40, 5, $precio." ", 0, 1, 'C');

                    //Cálculo del subtotal
                        $subtotal=$precio+$subtotal;
                         $y = $y + 5; 

                    }
                    
         }
}

$orden="SELECT p.descripcion, p.valor,p.id_producto FROM productos_libres p,lineas_factura l
where p.id_producto=l.producto and l.factura=".$nfactura.";";
$chorizo = $conexion->query($orden);
while($registro = $chorizo->fetch_array())
{
$pdf->SetFont('Arial','',8);

    $pdf->SetXY(15, $y);
    $pdf->Cell(40, 5, $registro[2], 0, 1, 'C');   
    $pdf->SetXY(50, $y);
    $pdf->Cell(40, 5, $registro[0], 0, 1, 'C');
    $pdf->SetXY(85, $y);
    $pdf->Cell(40, 5, 1, 0, 1, 'C');
    $pdf->SetXY(115, $y);
    $pdf->Cell(40, 5, $registro[1]." ", 0, 1, 'C');
    $pdf->SetXY(145, $y);
    $pdf->Cell(40, 5, $registro[1]." ", 0, 1, 'C');

//Cálculo del subtotal  
$subtotal=$registro[1]+$subtotal;

// aumento del top 5 cm
$y = $y + 5;
}
$orden="SELECT f.valor,f.descuento, (f.valor/100)*f.descuento as descuento_aplicado,i.iva FROM facturas f, iva i where f.id_factura=".$nfactura.";";
               
        if ($chorizo = $conexion->query($orden)){
            
        // Recorremos el resultset fila a fila
                $registro = $chorizo->fetch_array();
                //echo $orden;
                $suma=$subtotal;
                $descuento=($suma/100)*$registro[1];
                $des=$registro[1];
                $subtotal=$suma-$descuento;
                $iva=$registro[3];
                $ivacal=$subtotal/100*$registro[3];
                $total=$subtotal+$ivacal;
    }

//Cálculo del Impuesto
//$add_iva = $precio_subtotal * $iva / 100;
$descuento=round($descuento, 2);
$ivacal=round($ivacal, 2);
$subtotal=round($subtotal, 2);
$total=round($total, 2);
//Cálculo del precio total
//$total_mas_iva = round($precio_subtotal + $add_iva + $gastos_de_envio, 2);

$pdf->Ln(4);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(190, 5, "Descuento: $des %", 0, 1, "C");
$pdf->Cell(190, 5, "Descuento efectivo: $descuento ", 0, 1, "C");
$pdf->Cell(190, 5, "I.V.A: $iva %", 0, 1, "C");
$pdf->Cell(190, 5, "Valor del I.V.A.: $ivacal ", 0, 1, "C");
$pdf->Cell(190, 5, "Subtotal: $subtotal ", 0, 1, "C");
$pdf->Cell(190, 5, "TOTAL: ".$total." €", 0, 1, "C");


$pdf->Output($archivo_de_salida);//cierra el objeto pdf

//Creacion de las cabeceras que generarán el archivo pdf
header ("Content-Type: application/download");
header ("Content-Disposition: attachment; filename=$archivo");
header("Content-Length: " . filesize("$archivo"));
$fp = fopen($archivo, "r");
fpassthru($fp);
fclose($fp);

//Eliminación del archivo en el servidor
unlink($archivo);
}