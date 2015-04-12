<!DOCTYPE html>
<html lang='es' xml:lang='es' xmlns="http://www.w3.org/1999/xhtml">
	<head>
		 <meta charset="utf-8">
		 <link rel="icon" type="image/png" href="imagenes/ico.png" />
		 <meta http-equiv="X-UA-Compatible" content="IE=edge">
		 <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		 
		  <link rel="stylesheet" href="css/bootstrap.css" type="text/css" />
		  <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css" />
		 <style>
		 	.container{
		 		max-width: 50em;
		 	}
		 </style>

		<link rel="stylesheet" href="style2.css"/>
		<script src="js/javaScript.js"></script>
		<script src="js/jquery-2.1.3.min.js"></script>
		<script src="js/jquery-ui-1.11.4.custom/jquery-ui.min.js"></script>
		<script src="js/jquery.datetimepicker.js"></script>
		<title>AC Wellness - Nuevo Cliente</title>
	    <link href="bootstrap/bootstrap.min.css"s rel="stylesheet">
	    <link href="bootstrap/logo-nav.css" rel="stylesheet">
	    <link rel="stylesheet" href="estilos/stylesadmin.css">

	</head>

	<body>
		<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="administrador.php">
                    <img src="imagenes/e.png" id="logo">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="clientes.php" class="dropdown-toggle" data-toggle="dropdown">Clientes <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="clientes.php">Clientes</a></li>
                            <li><a href="nuevoCliente.php">Nuevo Cliente</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Reservas <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="individuales.php">Individuales</a></li>
                          <li><a href="multiples.php">Multiples</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="calendario.php">Calendario</a>
                    </li>
                    <li>
                        <a href="#">Tarifas y bonos</a>
                    </li>
                    <li>
                        <a href="#">Configuracion</a>
                    </li>
                </ul>
            </div>

        </div>
    </nav>
</nav>
		<div>
			<form method=POST id="form" class="form-horizontal center-block container "  action="validarCliente.php">
				<div class="contenedor center-block">
				<div  ><label>Nombre y Apellidos: </label><input required  class="form-control  "  type=text name=nombre placeholder=TONTOELCULO/></div>
				<div  ><label>DNI:</label><input required  class="form-control  "  type=text name=dni placeholder="666666666"/></div>
				<div  ><label>Télefono movil:</label><input required  class="form-control  "  type=text name=movil placeholder="666666666"/></div>
				<div  ><label>Otro telefono:</label><input required  class="form-control  " type=text name=otro placeholder="9999999"/></div>
				<div  ><label>Email:</label><input required  class="form-control  " type=mail name=mail placeholder="ejemplo@hotmail.es"/></div>
				<div  > </div> <label>Genero:</label><select required  class="form-control  " name=genero> <option value=''>--</option><option value=F>Mujer</option><option value=H>Hombre</option></select></div>
				<div  ><label>Fecha de nacimiento:</label><input required  class="form-control  " type=date name=date></div>
				<!-- Tipo:(TARIFA) -->
				<div  ><label>Dirección:</label><input required  class="form-control  " type=text name=direccion placeholder="SORIA"></div>
				<div  ><label>Población:</label><input required  class="form-control  " type=text name=poblacion placeholder="Soria"></div>
				<div  ><label>Provincia:</label><input  required class="form-control  " type=text name=provincia placeholder="Soria"></div>
				<div  ><label>Codigo postal:</label><input required  class="form-control  " type=text name=codPostal placeholder="42003"></div>
				<div><label>Objetivos:</label> <textarea class="form-control" name=objetivos></textarea></div>
				<div><label>Comentarios:</label> <textarea class="form-control" name=comentarios></textarea></div>
				<div><label>Patologias:</label> <textarea class="form-control" name=patologias></textarea></div>
				<div><label>Medicación:</label> <textarea class="form-control" name=medicacion></textarea></div>
				<input type="submit"  class=" anchoMax  PATEON btn btn-primary btn-block  RESET" name="Enviar" value="Confirmar">
      </div>
			</div >
			</form>

		</div>
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	</body>
		

</html>