<html>
<?php
 
/*
 * Following code will create a new product row
 * All product details are read from HTTP Post Request
 */
 
// array for JSON response
$response = array();
 
// check for required fields

 
    // include db connect class
    require_once __DIR__ . '/db_connect.php';
	require_once __DIR__ . '/db_config.php';
 
    // connecting to db
    //$db = new DB_CONNECT();
	 $conexion = new mysqli(DB_SERVER, DB_USER, DB_PASSWORD, DB_DATABASE);  
 

    $reservas = "SELECT * FROM reserva WHERE Cliente_idCliente = 9600 ";
    // mysql inserting a new row
    $result = $conexion->query($reservas);
    // check if row inserted or not
    if ($result) {
        // successfully inserted into database
        
 
        echo json_encode($response);
    }
    else {'<script> 
              alert("Usted no tiene reservas ");
              window.history.go(-2);
              </script>' ;
 
    // echoing JSON response
    echo json_encode($response);
         }
?>

<head>
<title>mostrar reservas</title>
<meta charset="utf-8">
<link rel="stylesheet" href="css/reset.css" type="text/css" media="all">
<link rel="stylesheet" href="css/layout.css" type="text/css" media="all">
<link rel="stylesheet" href="css/style1.css" type="text/css" media="all">
<script type="text/javascript" src="js/jquery-1.4.2.js" ></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/cufon-replace.js"></script> 
<script type="text/javascript" src="js/Myriad_Pro_italic_600.font.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_italic_400.font.js"></script>
<script type="text/javascript" src="js/Myriad_Pro_400.font.js"></script>
</head>
<body>
<div class="body1">
	<div class="main">
<!-- header -->
		<header>
			<div class="wrapper">
				<h1>
					<a href="index.html" id="logo">Aerolinea</a><span id="slogan">Todo se cae</span>
				</h1>
				<div class="right">
					<nav>
						<ul id="top_nav">
							<li><a href="index.html"><img src="images/img1.gif" alt=""></a></li>
							<li><a href="contacto.html"><img src="images/img2.gif" alt=""></a></li>
							<li class="bg_none"><a href="#"><img src="images/img3.gif" alt=""></a></li>
						</ul>
					</nav>
					<nav>
						<ul id="menu">
							<li id="menu_active"><a href="index.html">Inicio</a></li>
							<li><a href="aerolineas.html">Aerolineas</a></li>
							<li><a href="fullscreen-login/login.html">Ingresa</a></li>
							<li><a href="registro.html">Registrate</a></li>
							<li><a href="contacto.html">Contacto</a></li>
						</ul>
					</nav>
				</div>
			</div>
		</header>
	</div>
</div>

<table border="1px">
    <thead>
        <th>idReserva</th>
        <th>Cliente_idCliente</th>
        <th>numeroAsiento</th>
        <th>lugarSalida</th>
        <th>lugarDestino</th>
        <th>numeroPasajeros</th>
        <th>fechaReservado</th>
        <th>HoraReserva</th>
        <th>fechaSalida</th>
        <th>nombreCliente</th>
          
    </thead>
          
    <tbody>
        <?php while ($user = mysqli_fetch_array($result)) {
            ?>
              <tr>
                  <td><?php echo $user['idReserva']; ?></td>
                  <td><?php echo $user['Cliente_idCliente']; ?></td>
                  <td><?php echo $user['numeroAsiento']; ?></td>
                  <td><?php echo $user['lugarSalida']; ?></td>
                  <td><?php echo $user['lugarDestino']; ?></td>
                  <td><?php echo $user['numeroPasajeros']; ?></td>
                  <td><?php echo $user['fechaReservado']; ?></td>
                  <td><?php echo $user['HoraReserva']; ?></td>
                  <td><?php echo $user['fechaSalida']; ?></td>
                  <td><?php echo $user['nombreCliente']; ?></td>
              </tr>
              
                    
               

            <?php
            
        }
        ?>
    </tbody>
</table>
<div class="body2">
	<div class="main">
<!-- footer -->
		<footer>
			<a >Aerolinea todo se cae</a><br>
			<a >2017</a>
		</footer>
<!-- / footer -->
	</div>
</div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>