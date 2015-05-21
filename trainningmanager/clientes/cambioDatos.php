<?php
session_start();
	include("../php/funciones/function.php");
	include ('../Mobile-Detect/Mobile_Detect.php');
	cabecera();
	$id_cliente=$_POST['cliente'];
	$sql="SELECT id_cliente, dni, telefono, telefono2, email,objetivos,comentarios, patologias, medicacion, direccion, nombre, apellido, domiciliado ,direccion,poblacion,provincia,c_p

	FROM `clientes` WHERE id_cliente=".$id_cliente;
	//echo $sql;
	$cho=ordensql($sql);
	$ban=false;
	echo "<script>";
	if($cho!=false)
	{
		while ($regi = $cho->fetch_array()) {
			echo "var nombre= '".$regi[10]."';";
			echo " var apellido= '".$regi[11]."';";
			echo  " var dni= '".$regi[1]."';";
			echo " var telefono= '".$regi[2]."';";
			echo " var telefono2= '".$regi[3]."';";
			echo " var domi= '".$regi[12]."';";
			echo " var direc= '".$regi[13]."';";
			echo " var pob= '".$regi[14]."';";
			echo " var pro= '".$regi[15]."';";
			echo " var cp= '".$regi[16]."';";;
			echo " var obj= '".$regi[5]."';";
			echo " var com= '".$regi[6]."';";
			echo " var pat= '".$regi[7]."';";
			echo " var med= '".$regi[8]."';";
			echo " var mail= '".$regi[4]."';";

		}
	}
	echo "</script>";
?>

			 <style>
		 	.contenedor{
		 		max-width: 50em;
		 	}
		 	#control{
				width: 50em;
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
		 </style>

	</head>
	<body>
		<?php 
		
		$id_cliente=$_POST['cliente'];

		echo "<script> var id=".$id_cliente."</script>";
		menu();

		?>
	<div id="control">
		<div id="contenedor">
		<div>
			<form method=POST id="form" class="form-horizontal center-block container "  action="cambioDatos2.php">
				<div class="contenedor center-block">
					<?php echo "<input type=hidden name=cliente value=$id_cliente>"?>
				<div style=text-center><h1>Modificar Cliente</h1></div>
				<div  > <div class="col-lg-6"><label>Nombre</label><input required  id='nombre' class="form-control  " title="Se necesita un nombre " type=text name=nombre /></div>
						<div class="col-lg-6"><label>Apellidos</label><input required id='apellido' class="form-control  " title="Apellido " type=text name=apellido /></div>
				</div>
				<div  ><label>DNI:</label><input required  id='dni' class="form-control  "   type=text name=dni  /></div>
				<div  ><label>Télefono movil:</label><input required id="telf1"  pattern='[0-9]{9}' class="form-control  "  type=text name=movil /></div>
				<div  ><label>Otro telefono:</label><input   id="telf2" class="form-control  " type=text name=otro  /></div>
				<div  ><label>Email:</label><input required id='mail' class="form-control  " type='email' name=mail /></div>
				
    			
    			<div  ><label>Dirección:</label><input required  class="form-control  "  id='direccion' type=text name=direccion  ></div>
				<div  ><label>Población:</label><input required  class="form-control  " id='pobla'  type=text name=poblacion ></div>
				<div  ><label>Provincia:</label><input  required class="form-control  "  id='pro'  type=text name=provincia  ></div>
				<div  ><label>Codigo postal:</label><input required pattern='[0-9]{5}' id='cp' class="form-control  " type=text name=codPostal ></div>
				<div><label>Objetivos:</label> <textarea class="form-control"  id='objetivos'  name=objetivos></textarea></div>
				<div><label>Comentarios:</label> <textarea class="form-control" id='comen' name=comentarios></textarea></div>
				<div><label>Patologias:</label> <textarea class="form-control" id='pa' name=patologias></textarea></div>
				<div><label>Medicación:</label> <textarea class="form-control" id='me' name=medicacion></textarea></div>
				<br/>
				<input type="submit"  class=" anchoMax  PATEON btn btn-success btn-block  RESET" id='boton' name="Enviar" value="Confirmar">
				<br/>
		</form>
      </div>

   </div></div></body>
		
			

    <script>
     $('#nombre').val(nombre);
     $('#apellido').val(apellido);
     $('#dni').val(dni);
     $('#telf1').val(telefono);
     $('#telf2').val(telefono2);
     $('#mail').val(mail);
     $('#direccion').val(direc);
     $('#pobla').val(pob);
     $('#pro').val(pro);
     $('#cp').val(cp);
     $('#objetivos').val(obj);
     $('#comen').val(com);
     $('#pa').val(pat);
     $('#me').val(med);
     //

    //console.dir(apellido);
    
	   
   </script>
