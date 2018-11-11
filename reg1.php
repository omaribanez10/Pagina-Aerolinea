<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// array for JSON response
$response = array();
 
// check for required fields
if (isset($_POST['nombreCliente']) && isset($_POST['idCliente']) || isset($_POST['telefonoCliente'])&& isset($_POST['mailCliente']) && isset($_POST['contrasenaCliente'])) {
 
    $nombre= $_POST['nombreCliente'];
    $id = $_POST['idCliente'];
	$telefono=$_POST['telefonoCliente'];
    $mail = $_POST['mailCliente'];
	$contraseña=$_POST['contrasenaCliente'];
	

	
 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
	require_once __DIR__ . '/db_config.php';
 
    // connecting to db
    //$db = new DB_CONNECT();
	 $mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);  
 
    // mysql inserting a new row
    $result = mysqli_query($mysqli,"INSERT INTO cliente(nombreCliente, idCliente, telefonoCliente,mailCliente,contrasenaCliente) VALUES('$nombre', '$id', '$telefono','$mail','$contraseña')");
 
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        echo '<script> 
              alert("Te has registrado exitosamente");
              window.history.go(-2);
              </script>' ;
 
        // echoing JSON response
        echo json_encode($response);
    } else {
        echo '<script> 
              alert("El registro ha fallado revise los valores ingresado");
              window.history.go(-1);
              </script>' ;
 
        // echoing JSON response
        echo json_encode($response);
    }
} else {
    // required field is missing
    $response["success"] = 0;
    $response["message"] = "Faltan datos";
 
    // echoing JSON response
    echo json_encode($response);
}
?>