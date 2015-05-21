<?php
include("../../php/funciones/function.php");
/** Incluir la libreria PHPExcel */
require_once '../../phpexcel/Classes/PHPExcel.php';
// Crea un nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Establecer propiedades
$objPHPExcel->getProperties()
->setCreator("ACWellness")
->setLastModifiedBy("ACWellness")
->setTitle("Documento Excel de Prueba")
->setSubject("Documento Excel de Prueba")
->setDescription("Prueba de Excel con php.")
->setKeywords("Excel Office 2007 openxml php")
->setCategory("Pruebas de Excel");

//Orden para los datos csv
$listacliente=ordensql("SELECT nombre, genero, fecha_alta, fecha_baja, domiciliado, telefono, email,id_cliente,fecha_nacimiento, apellido from clientes;");
$objPHPExcel->setActiveSheetIndex(0)
->setCellValue('A1', 'Nombre')
->setCellValue('B1', 'Género')
->setCellValue('C1', 'Edad')
->setCellValue('D1', 'Horas totales')
->setCellValue('E1', 'Tarifa actual')
->setCellValue('F1', 'Fecha alta')
->setCellValue('G1', 'Fecha baja')
->setCellValue('H1', 'Domiciliado')
->setCellValue('I1', 'Pagado €')
->setCellValue('J1', 'Pendiente €')
->setCellValue('K1', 'Teléfono')
->setCellValue('L1', 'email');
$cont=2;
while ($resultado=$listacliente->fetch_array()){
	if($resultado[4]==0){
		$domiciliado='NO';
	}
	if($resultado[4]==1){
		$domiciliado='SI';
	}
	if($resultado[3]=="0000-00-00 00:00:00"){
		$fechabaja="";
	}else{
		$fechabaja=$resultado[3];
	}
	$listatarifa=ordensql("SELECT nombre from contratos, tarifas where cliente=".$resultado[7]." and tarifa=id_tarifa;");
	$resultadotarifa=$listatarifa->fetch_array();
	$listapagado=ordensql("SELECT sum(valor)*(1+iva/100) from facturas, iva where cliente=".$resultado[7]." and estado=1");
	$resultadopagado=$listapagado->fetch_array();	
	$pagado=$resultadopagado[0];
	if ($pagado<=0){
		$pagado=0;
	}
	$listapendiente=ordensql("SELECT sum(valor)*(1+iva/100) from facturas, iva where cliente=".$resultado[7]." and estado=0");
	$resultadopendiente=$listapendiente->fetch_array();
	$pendiente=$resultadopendiente[0];
	if ($pendiente<=0){
		$pendiente=0;
	}
	$edad=calcularEdad($resultado[8]);
	$objPHPExcel->setActiveSheetIndex(0)
	->setCellValue('A'.$cont, $resultado[0]." ".$resultado[9]) //Nombre y apellidos
	->setCellValue('B'.$cont, $resultado[1]) //genero
	->setCellValue('C'.$cont, $edad) //edad
	->setCellValue('D'.$cont, calcularHoras($resultado[7])) //horas hechas
	->setCellValue('E'.$cont, $resultadotarifa[0]) //tarifa
	->setCellValue('F'.$cont, date("Y-m-d",strtotime($resultado[2]))) //fecha alta
	->setCellValue('G'.$cont, $fechabaja) //fecha baja
	->setCellValue('H'.$cont, $domiciliado) //domiciliado
	->setCellValue('I'.$cont, round($pagado,2)."€") //pagado
	->setCellValue('J'.$cont, round($pendiente,2)."€") //pendiente
	->setCellValue('K'.$cont, $resultado[5]." ") //telefono
	->setCellValue('L'.$cont, $resultado[6]); //email
	$cont++;
}
$objPHPExcel->getActiveSheet()->setAutoFilter("A1:H".$cont);
$objPHPExcel->getActiveSheet()
	->getStyle('A1:L1')
	->applyFromArray(
	    array(
	        'fill' => array(
	            'type' => PHPExcel_Style_Fill::FILL_SOLID,
	            'color' => array('rgb' => '1D99D6')
	        )
	    )
);
foreach(range('A','J') as $columnID) {
    $objPHPExcel->getActiveSheet()->getColumnDimension($columnID)
        ->setAutoSize(true);
}
// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('Hoja 1');

// Establecer la hoja activa, para que cuando se abra el documento se muestre primero.
$objPHPExcel->setActiveSheetIndex(0);
$dia=date("Y").date("m").date("d");
// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="facturacion-'.$dia.'.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');

?>