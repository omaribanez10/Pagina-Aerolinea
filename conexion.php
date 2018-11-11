<?php
   

	require_once __DIR__ . '/db_connect.php';
	require_once __DIR__ . '/db_config.php';
 
    // connecting to db
    //$db = new DB_CONNECT();
	$conexion = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);  
		  
   	mysqli_select_db($db, $con) or die ("No se encontro la base de datos. ");
	$query = "SELECT * FROM reserva";
	$resultado = mysqli_query($query);
		   
	while ($fila = mysql_fetch_array($resultado)) {
		echo " <tr>";
		echo "<td> $fila[idReserva] 	</td>
		<td> $fila[Cliente_idCliente] </td>
		<td> $fila[numeroAsiento] 	</td> 
		<td> $fila[lugarSalida] 	</td>
		<td> $fila[lugarDestino] 	</td>
		<td> $fila[numeroPasajeros] </td>
	    <td> $fila[fechaReservado]	</td>
	    <td> $fila[HoraReserva]		</td>
	    <td> $fila[fechaSalida] 	</td>
	    <td> $fila[nombreCliente] 	</td>
			";
			   echo "</tr>";
		   }
?>