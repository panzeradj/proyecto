<?php
	function abre(){
		// Conectando con la BBDD
		$conexion = new mysqli("127.0.0.1", "root", 'root', "trainningmanager");
		if (mysqli_connect_errno()) {
    		die("Error grave: " . mysqli_connect_error());
		}
		return $conexion;
	}
	function altaproveedor($conexion,$nombre,$nif,$empresa,$tel,$direccion,$cp,$correo){
		//echo $usuario.$nombre.$direccion.$contrasena.$apellidos;
		if (existe($conexion,$nif)){
			return "errpro";
		}else{
			$orden="INSERT INTO proveedores (nombre,nif,empresa,telefono,direccion,cp,correo) VALUES ('$nombre','$nif','$empresa','$tel','$direccion',$cp,'$correo');";
			
			$conexion->query($orden);
			return "okprov";
			
		}
	}
	function altaproducto($conexion,$nombre,$des,$proveedor,$precio){
		//echo $usuario.$nombre.$direccion.$contrasena.$apellidos;
		
			$orden="INSERT INTO productos (nombre,descripcion,proveedor,valor_sin_iva) VALUES ('$nombre','$des',$proveedor,$precio);";
			
			$conexion->query($orden);
			return "okregpro";
			
		
	}
	function addproducto($conexion,$nfactura,$id_producto,$cantidad){
		$chorizo=$conexion->query("SELECT cantidad FROM lineas_factura where producto=$id_producto and factura=$nfactura ;");

		if ($chorizo->num_rows >=1){
				
			$orden="UPDATE lineas_factura SET  cantidad=$cantidad WHERE factura=$nfactura and producto=$id_producto;";
			$conexion->query($orden);
		}else{
			$orden="INSERT INTO lineas_factura (factura,producto,cantidad) VALUES ($nfactura,$id_producto,$cantidad);";
			$conexion->query($orden);
		}
		
	}
	
	function borrarproducto($conexion,$producto){
	
		
			$orden="UPDATE productos SET  off=1 where id_producto=$producto";
			
			$conexion->query($orden);
			return "okbogpro";
			
		
	}
	function borrarproveedor($conexion,$proveedor){
	
		
			$orden="delete from proveedores where id_proveedor=$proveedor";
			
			$conexion->query($orden);
			return "okborraprov";
			
		
	}

	
	function existe($conexion,$nif){
		$chorizo=$conexion->query("select * from proveedores where nif='".$nif."'");
		if ($chorizo->num_rows >=1){
			return true;
		}else{
			return false;
		}
	}


	function listarproveedores($conexion){
		$orden="SELECT id_proveedor,nombre FROM proveedores;";
		//echo $orden;
		
		if ($chorizo = $conexion->query($orden)){
			echo"<select class='form-control' name=proveedor>";
			while ($registro = $chorizo->fetch_array()) {
				echo  '<option value=' . $registro[0]. '>' . $registro[1] .'</option>';
			}
			echo "</select>";
		}	
	}


function precioproducto($conexion,$id){
	$orden="SELECT valor_sin_iva FROM productos where id_producto=$id;";
if ($chorizo = $conexion->query($orden)){
			
			while ($registro = $chorizo->fetch_array()) {
				return $registro[0];
			}
		}
}


function listarproductos($conexion){
		$orden="SELECT id_producto,nombre FROM productos where off=0;";
		
		
		if ($chorizo = $conexion->query($orden)){
			echo"<select class='form-control' name=producto>";
			while ($registro = $chorizo->fetch_array()) {
				echo  '<option value=' . $registro[0]. '>' . $registro[1] .'</option>';
			}
			echo "</select>";
		}	
	}
function mostrarproductos($conexion,$nfactura,$producto){
	$orden="SELECT producto FROM lineas_factura where factura=$nfactura;";
		
		if ($chorizo = $conexion->query($orden)){
			
			while ($registro = $chorizo->fetch_array()) {
				echo  '<option value=' . $registro[0]. '>' . $registro[1] .'</option>';
			}
			echo "</select>";
		}	

	$orden2="SELECT p.nombre, l.cantidad, p.valor_sin_iva,(l.cantidad*p.valor_sin_iva)as total FROM lineas_factura l,productos p where l.producto=$producto and l.factura=$factura;";
}
function imprimproductos($conexion,$nfactura){
		
		// Ejecutamos la orden y obtenemos un resultset
		$orden="SELECT p.nombre, p.valor_sin_iva,l.cantidad,(l.cantidad*p.valor_sin_iva)as total,l.producto FROM productos p,lineas_factura l
where p.id_producto=l.producto and l.factura=".$nfactura.";";
		
				
		if ($chorizo = $conexion->query($orden)){
			
				echo "<table class='table table-hover'>";
				echo "<thead><tr>";
				echo "<td>Producto</td><td>Precio sin iva</td><td>Cantidad</td><td>Total</td><td>Borrar Producto</td>";
				echo "</tr></thead>";
			
			
		// Recorremos el resultset fila a fila
				while ($registro = $chorizo->fetch_array()) {
				
				
	
				
				echo "<td>".$registro[0]."</td><td>".$registro[1]."€</td><td>".$registro[2]."</td><td>".$registro[3]."€</td><td><form action=quitarproducto.php method=post>
	
				<input type=hidden name=producto value=".$registro[4].">
				<input type=hidden name=nfactura value=".$nfactura.">
			    <input type=submit class='btn btn-danger' value=Borrar />
				</form>
				</td>";
					echo "</tr>";
				}
				
				echo "</table>";
		
						
		}
	}
function fijartotal($conexion,$nfactura){
	$orden="SELECT valor FROM facturas where id_factura=".$nfactura.";";
	$chorizo=$conexion->query($orden);
	$registro = $chorizo->fetch_array();
	$total=$registro[0];
	

	$orden="SELECT sum(l.cantidad*p.valor)as total FROM productos_libres p,lineas_factura l
	where p.id_producto=l.producto  and l.factura=".$nfactura.";";
	$chorizo=$conexion->query($orden);
	$registro = $chorizo->fetch_array();
	$total=$total+$registro[0];

	$orden="SELECT sum(l.cantidad*p.valor_sin_iva)as total FROM productos p,lineas_factura l
	where p.id_producto=l.producto  and l.factura=".$nfactura.";";
	$chorizo=$conexion->query($orden);
	$registro = $chorizo->fetch_array();
	$total=$total+$registro[0];
	
	return $total;
	

}


function impritotales($conexion,$nfactura){
		
		
		$orden="SELECT f.valor,f.descuento, (f.valor/100)*f.descuento as descuento_aplicado,i.iva FROM facturas f, iva i where f.id_factura=".$nfactura.";";
		
				
		if ($chorizo = $conexion->query($orden)){
			
			
			
			
		// Recorremos el resultset fila a fila
				$registro = $chorizo->fetch_array();
				
				$suma=fijartotal($conexion,$nfactura);
				$descuento=($suma/100)*$registro[1];

				$subtotal=$suma-$descuento;
				$iva=$subtotal/100*$registro[3];
				$total=$subtotal+$iva;
				
				$descuento=round($descuento, 2);
				$iva=round($iva, 2);
				$subtotal=round($subtotal, 2);
				$total=round($total, 2);

				echo "<table class='table table-hover'>";
				echo "<thead><tr>";
				echo "<td>Valor sin descuento</td><td>Descuento en %</td><td>Descuento</td><td>Sub Total sin iva</td>";
				echo "</tr></thead>";
				
				echo "<td>".$suma."€</td><td>".$registro[1]."%</td><td>".$descuento."€</td><td>".$subtotal."€</td></td>";
				echo "</tr>";
				echo "</table>";
				echo "</br>";

				echo "<table class='table table-hover'>";
				echo "<thead><tr>";
				echo "<td>I.V.A.</td><td>Valor del I.V.A.</td><td>Importe Total </td>";
				echo "</tr></thead>";
				echo "<tr>";
				echo "<td>".$registro[3]."%</td><td>".$iva."€</td><td>".$total."€</td>";
				echo "</tr>";	
				echo "</table>";	
					
		}
	}
function creafatura($conexion){

	$orden="insert into facturas (cliente,estado,valor,descuento) values (1,0,0,0);";
		$conexion->query($orden);
		$orden="SELECT LAST_INSERT_ID()";
		$chorizo=$conexion->query($orden);
		$registro = $chorizo->fetch_array();
		return $registro[0];
}
function addproductolibre($conexion,$nfactura,$id_producto){
		
			$orden="INSERT INTO lineas_factura (factura,producto,cantidad) VALUES ($nfactura,$id_producto,1);";
			$conexion->query($orden);
		
		
	}


function imprimconceptos($conexion,$nfactura){
		
		// Ejecutamos la orden y obtenemos un resultset
		$orden="SELECT p.descripcion, p.valor,p.id_producto FROM productos_libres p,lineas_factura l
where p.id_producto=l.producto and l.factura=".$nfactura.";";
				
		if ($chorizo = $conexion->query($orden)){
			
				echo "<table class='table table-hover'>";
				echo "<thead><tr>";
				echo "<td>Concepto</td><td>Precio sin iva</td><td>Borrar Producto</td>";
				echo "</tr></thead>";
			
			
		// Recorremos el resultset fila a fila
				while ($registro = $chorizo->fetch_array()) {
				
				
	
				
				echo "<td>".$registro[0]."</td><td>".$registro[1]."€</td><td><form action=quitarproducto.php method=post>
	
				<input type=hidden name=producto value=".$registro[2].">
				<input type=hidden name=nfactura value=".$nfactura.">
			    <input type=submit class='btn btn-danger' value=Borrar />
				</form>
				</td>";
					echo "</tr>";
				}
				
				echo "</table>";
		
						
		}
	}
function totalstock($conexion,$producto){

	$orden="SELECT sum(cantidad) FROM stock s where accion=0 and producto=".$producto.";";
	$chorizo=$conexion->query($orden);
	$registro = $chorizo->fetch_array();
	$total=$registro[0];
	$orden="SELECT sum(cantidad) FROM stock s where accion=1 and producto=".$producto.";";
	$chorizo=$conexion->query($orden);
	$registro = $chorizo->fetch_array();
	$total=$total-$registro[0];

	return $total;

}
function vermovimientos($conexion,$producto){
	$orden="SELECT cantidad,accion,cuando FROM stock s where  producto=".$producto.";";

	if ($chorizo = $conexion->query($orden)){
			
		echo "<table align=center border='1'>";
		echo "<tr>";
		echo "<td>Acción</td><td>Cantidad</td><td>Cuando</td>";
		echo "</tr>";
				
			while ($registro = $chorizo->fetch_array()) {

				if($registro[1]==0){
					$medida="Compra";
				}else{
					$medida="Venta";
				}

				
				echo "<tr>";
				echo "<td>".$medida."</td><td>".$registro[0]."</td><td>".$registro[2]."</td>";
				echo "</tr>";

				}
			echo "</table>";	
	}
}	
function nombreproducto($conexion,$producto){
			
			$orden="select nombre from productos where id_producto=$producto;";
			//echo $orden;
			$chorizo =$conexion->query($orden);
			$registro = $chorizo->fetch_array();
			
		return $registro[0];
	}
function listarproductostock($conexion,$producto){
		$orden="SELECT id_producto,nombre FROM productos where id_producto!=$producto and off=0;";
		//echo $orden;
		
		if ($chorizo = $conexion->query($orden)){
			echo"<select name=producto>";
			while ($registro = $chorizo->fetch_array()) {
				echo  '<option value=' . $registro[0]. '>' . $registro[1] .'</option>';
			}
			echo "</select>";
		}	
}
	

function cierra($conexion){
	$conexion->close();
}
?>