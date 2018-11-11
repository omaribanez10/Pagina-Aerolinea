<?php
 

$response = array();
 
// check for required fields
if (isset($_POST['nombreCliente']) && isset($_POST['mailCliente']) &&isset($_POST['telefonoCliente'])){
 
  
  
  
  $nombre = $_POST['nombreCliente'];
	$mail=$_POST['mailCliente'];
  $tel = $_POST['telefonoCliente'];
 
   
  require_once __DIR__ . '/db_connect.php';
	require_once __DIR__ . '/db_config.php';
 
	 $mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);  
                    

    $result = mysqli_query($mysqli,"INSERT INTO suscripcion(nombreCliente, mailCliente,telefonoCliente) VALUES('$nombre','$mail','$tel')");
    
     
    if ($result) {
      
       echo '<script> 
              alert("Tu suscripcion se ha hecho exitosamente");
              window.history.go(-2);
              </script>' ;
        
 
      
        echo json_encode($response);
    } else {
    
        echo '<script> 
              alert("Fallo al suscribirse");
              window.history.go(-1);
              </script>' ;
 
 
  
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