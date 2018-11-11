<?php



	$cedula = $_POST['idCliente'];
	$pass   = $_POST['contrasenaCliente']; 
  

  $conexion=mysqli_connect("localhost", "root", "", "aerolinea");
  $consulta="SELECT * FROM cliente WHERE idCliente = '$cedula ' and contrasenaCliente = '$pass'"; 
  $resultado=mysqli_query($conexion,$consulta);
  

  $filas=mysqli_num_rows($resultado);

  if($filas>0){
    header("location:index1.html");
  }
  else{
    echo '<script> 
              alert("Cedula o contraseña son incorrectas");
              window.history.go(-1);
              </script>' ;
  }
  mysqli_free_result($resultado);
  mysqli_close($conexion);

?>