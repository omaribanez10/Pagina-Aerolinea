<?php
 

$response = array();
 
// check for required fields
if (isset($_POST['idCliente']) && isset($_POST['nombreCliente']) && isset($_POST['lugarSalida']) && isset($_POST['lugarDestino'])  &&isset($_POST['numeroPasajeros']) && isset($_POST['numeroAsiento']) && isset($_POST['fechaSalida'])){
 
  
  date_default_timezone_set('America/Bogota');
  $id = $_POST['idCliente'];
  $nombre = $_POST['nombreCliente'];
	$lugSal=$_POST['lugarSalida'];
  $LugLleg = $_POST['lugarDestino'];
	$fechaRe=date("Y-m-d",time());
  $horaRe=date("H:i:s",time());
  $fechaSal=$_POST['fechaSalida'];
	$numPas=$_POST['numeroPasajeros'];
  $numAs=$_POST['numeroAsiento'];
	
 
   
    require_once __DIR__ . '/db_connect.php';
	require_once __DIR__ . '/db_config.php';
 
	 $mysqli = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);  
                    

    $result = mysqli_query($mysqli,"INSERT INTO reserva(Cliente_idCliente, nombreCliente, lugarSalida,lugarDestino,fechaReservado,HoraReserva,fechaSalida, numeroPasajeros,numeroAsiento) VALUES('$id', '$nombre','$lugSal','$LugLleg', '$fechaRe','$horaRe','$fechaSal','$numPas', '$numAs')");
    
     
    if ($result) {
      
       echo '<script> 
              alert("Tu reserva se ha hecho exitosamente");
              window.history.go(-2);
              </script>' ;
        
 
      
        echo json_encode($response);
    } else {
    
        echo '<script> 
              alert("La reserva ha fallado revise los valores ingresados");
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