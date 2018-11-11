<html>
<head>
<title>mostrar datos</title>
</head>
<body>
<div>
<fieldset>
      <legend>Datos de tabla</legend>
	  <div>
	  <?php
	  include("conexion.php");
	  $Con = new conexion();
	  $Con->recuperarDatos();
	  ?>
      </div>
</fieldset>
</div>
</body>
<footer>
</footer>
</html>