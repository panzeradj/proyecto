<html>
<head>
<title>Registro Proveedor</title>
<meta charset='utf-8'>
 
  
</head>

<body>
<header> 
<h1 align="center">Registro Proveedor</h1>

</header> <article> 
<form name="form1" method="post" action="verificar.php" >
  
   <p>Nombre : 
    <input type="text" name="nombre" required>
  </p>
  <p>NIF: 
    <input type="text" name="nif">
    <br/>
  </p>
  <p>Empresa: 
    <input type="text" name="empresa" required>
    <br/>
  </p>
  <p>Teléfono: 
    <input type="password" name="tel" required>
  </p>
  
  <p>Direción: 
    <input type="password" name="direcion" required>
  </p>
  <p> 
    <input type="submit" name="Submit" value="registrar">
  </p>
  <br/>
</form>

<form name="form1" method="post" action="index.php">
<p><input type="submit" name="Submit" value="Volver">
        </p></form>
</article> 

</body>
</html>
