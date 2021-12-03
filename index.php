<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">	
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<link rel="stylesheet" type="text/css" href="css/inicio_pantalla.css?1.0" media="all">
	<link rel="stylesheet" type="text/css" href="css/inicio_index.css?1.0" media="all">
		
	<title>Furry Friends Pets</title>
</head>
<?php			
	$usuario= "root";
	$password="";
	$servidor="localhost";
	$database="veterinaria 2";
	
	// Create connection
	$conn = mysqli_connect($servidor, $usuario, "", $database);
	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	} 	
	
	$conn -> set_charset("utf8");		
	
?>	           

<body background="img/blanco.jpg"> <!--background="img/blanco.jpg"-->
	<div id="general"> <!--Contiene todo-->		
		
		<br><header>
			<h1>Furry Friends Pets &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</h1>	
		</header>				
	
	
		<nav class="navegacion">
			<ul class="menu">

			<li class="first-item">
				<a href="inicio_sesion_u.php">
					<img src="img/perros.jpg" alt="" class="imagen">
					<span class="text-item">Usuario</span>
					<span class="down-item"></span>
				</a>
			</li>

			<li>
				<a href="inicio_sesion_d.php">
					<img src="img/verinari.jpg" alt="" class="imagen">
					<span class="text-item">Veterinario</span>
					<span class="down-item"></span>
				</a>
			</li>

				<li>
					<a href="inicio_sesion_a.php">
						<img src="img/funciones-veterinario.jpg" alt="" class="imagen">
						<span class="text-item">Administrador</span>
						<span class="down-item"></span>
					</a>
				</li>

				<li>
					<a href="Productos/veterinaria.html">
						<img src="img/productos.jpg" alt="" class="imagen">
						<span class="text-item">Productos</span>
						<span class="down-item"></span>
					</a>
				</li>

			
			</ul>
		</nav>			
	</div>
	<br><br>

	<div id="perfil">
		<center>				
			<img src="css/WhatsApp Image 2021-01-21 at 22.15.06.jpeg" width= "200" height= "250">						
			<label id="masco_cita"><b>&nbsp;Recomendaciones:</b></label> &nbsp;	<br><br>				
			<label>Los gatos y perros deben tratarse contra parásitos internos cada 3 meses, y muy especialmente cuando son cachorros, y antes de vacunarse. Será mejor que lo consultes con el veterinario. Así tendremos a nuestro amigo limpio por dentro y por fuera.</label> <br>&nbsp;					
		</center>
		
	</div>			
	
	<?php
		$count=$conn->query("select *from post  order by id_Post DESC");	
		
		while ($datos = mysqli_fetch_array($count)){																		
			echo "<br><br><div id='mascotas'>						
				<div id='izq'>		
					<br><label><b>$datos[Titulo]</b></label><br>
					<br>
					<label>$datos[Post]</label> &nbsp;&nbsp;&nbsp; 	
					<br>
				</div>
			
				<div id='der'><br>					
					<img src=$datos[imagen_link] width= '220' height= '150'>					
				</div>								
			</div>";			
		}
	?>
</body>
</html>