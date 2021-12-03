<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">	
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<link rel="stylesheet" type="text/css" href="css/sesion usuario/inicio_admin.css?1.0" media="all">	
	<link rel="stylesheet" type="text/css" href="css/sesion usuario/menu_admin.css?1.0" media="all">	
	<link rel="stylesheet" type="text/css" href="css/sesion usuario/registro_doc.css?1.0" media="all">	
	<title>Administrador</title>
</head>

<script type="text/javascript">
	function Productos(){		
		document.getElementById("productos_panel").style.display ="block";
		document.getElementById("veterinario").style.display ="none";
		document.getElementById("usuario_modo").style.display ="none";
		document.getElementById("mascotas_Ver").style.display ="none";		
		document.getElementById("reportes").style.display ="none";
		document.getElementById("post_panel").style.display ="none";
		document.getElementById("contenido").style.display ="none";		
		document.getElementById("Doctor").style.display ="none";	
		document.getElementById("mascotas_Ver").style.display ="none";			
	}			
	function Cita(){			
		document.getElementById("veterinario").style.display ="block";
		document.getElementById("productos_panel").style.display ="none";		
		document.getElementById("contenido").style.display ="none";
		document.getElementById("usuario_modo").style.display ="none";
		document.getElementById('recetaMedica').style.display ='none';			
		document.getElementById("reportes").style.display ="none";
		document.getElementById("post_panel").style.display ="none";
		document.getElementById("Doctor").style.display ="none";			
		document.getElementById("mascotas_Ver").style.display ="none";	
	}			
	
	function Mascota_panel(){		
		document.getElementById("usuario_modo").style.display ="block";
		document.getElementById("contenido").style.display ="none";		
		document.getElementById("veterinario").style.display ="none";
		document.getElementById('recetaMedica').style.display ='none';			
		document.getElementById("reportes").style.display ="none";
		document.getElementById("post_panel").style.display ="none";
		document.getElementById("productos_panel").style.display ="none";	
		document.getElementById("Doctor").style.display ="none";				
		document.getElementById("mascotas_Ver").style.display ="none";		
	}			
	
	
	function altaProducto(){		
		document.getElementById("altaProd").style.display ="block";		
		document.getElementById("modProd").style.display ="none";
		document.getElementById("cambiar").style.display ="none";
	}				
	
	function modificarProd(){		
		document.getElementById("modProd").style.display ="block";				
		document.getElementById("altaProd").style.display ="none";		
		document.getElementById("cambiar").style.display ="none";
	}
	
	function consultaMedica(){		
		document.getElementById("Doctor").style.display ="block";		
	}				
	
	
	function Salir(){		
		location.href='index.php'
	}	
	
	function consultaMascota(){
		document.getElementById("mascotas_Ver").style.display ="block";		
	}
	
	function MostrarInfor(){
		document.getElementById("contenido").style.display ="block";		
	}
	
	function Post(){		
		document.getElementById("post_panel").style.display ="block";
		document.getElementById("productos_panel").style.display ="none";
		document.getElementById("veterinario").style.display ="none";
		document.getElementById("usuario_modo").style.display ="none";
		document.getElementById("mascotas_Ver").style.display ="none";	
		document.getElementById("reportes").style.display ="none";
		document.getElementById("mascotas_Ver").style.display ="none";	
	}			
	
	function altaPost(){		
		document.getElementById("altaPost").style.display ="block";		
		document.getElementById("modPost").style.display ="none";
		document.getElementById("cambiarPost").style.display ="none";
	}				
	
	function modificarPost(){		
		document.getElementById("modPost").style.display ="block";				
		document.getElementById("altaPost").style.display ="none";	
		document.getElementById("cambiarPost").style.display ="none";		
	}
	
	function Reportes(){		
		document.getElementById("reportes").style.display ="block";
		document.getElementById("post_panel").style.display ="none";
		document.getElementById("productos_panel").style.display ="none";
		document.getElementById("veterinario").style.display ="none";
		document.getElementById("usuario_modo").style.display ="none";
		document.getElementById("mascotas_Ver").style.display ="none";		
		document.getElementById("mascotas_Ver").style.display ="none";	
	}			
	
</script>

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
	

	if (isset($_GET['id_doctor'])){		
		$id_doctor=$_GET['id_doctor'];
		$nombre_doctor="";			
		$total_visiras="";
		$id_mas_bus="";
		$id_usuario="";	
		$id_mascota="";
		$nombre_mascota="";
	}else if(isset($_GET['id_usuario'])){
		$id_usuario=$_GET['id_usuario'];
		$id_mas_bus="";	
		$id_mascota="";
		$nombre_mascota="";
		if(isset($_GET['id_mascota'])){
			$id_mascota=$_GET['id_mascota'];
		}	
	}else if(isset($_GET['id_producto'])){
		$id_producto=$_GET['id_producto'];
		$id_mas_bus="";	
		$id_mascota="";
		$nombre_mascota="";
	}else if(isset($_GET['id_post'])){
		$id_post=$_GET['id_post'];
		$id_mas_bus="";	
		$id_mascota="";
		$nombre_mascota="";
		
		
	}else{		
		$id_doctor="";		
		$nombre_doctor="";
		$id_mas_bus="";
		$total_visiras="";
		$id_usuario="";
		$id_mascota="";
		$nombre_mascota="";
	}	
	
?>	       


<body> <!--background="img/blanco.jpg"-->

	<div id="general"> <!--Contiene todo-->
		<header>
			<h1 class="title"><br><br><br>Furry Friends Pets &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br></font></h1>	
			<img src="img/logo.jpg" width= "80" height= "80">
		</header>
		<div id="perfil">
			<center>				
				<img src="img/admon.png" width= "180" height= "180">
				<br><label><b>Administrador</b></label>
				<input class="botonC" type="submit" name="inicio" onclick="Salir()" value="Cerrar Sesión">							 
			</center>
		</div>				
						
		<div id="menu">						
			<nav>
				<a onclick="Cita()" >Veterinarios&nbsp;</a>
				<a onclick="Mascota_panel()">Usuarios</a>				
				<a onclick="Productos()">Productos</a>
				<a onclick="Post()" >Post</a>				
				<div class="animation start-home"></div>
			</nav>			
		</div>		
		
		<br>
		
		<div id="veterinario">
		
			<br><label style="border-bottom:2px solid  #0074ff; background-color:white"><b>&nbsp;&nbsp;&nbsp;- Veterinarios -&nbsp;&nbsp;&nbsp;</b></label><br><br>
			
			<form  action="administrador.php" method='GET'>
				<label><b><font style="background-color:#c9f2ff">Nombre:</font></b></label> &nbsp;&nbsp;&nbsp; 								
				
				<select name="id_doctor" id="id_doctor" required>
					<option value="0"> - Seleccione Doctor - </option>
					<?php
						$count=$conn->query("select id_Doctor, Nombre, A_Paterno from veterinarios ");	
						while ($datos = mysqli_fetch_array($count)){
							if($id_doctor==$datos[id_Doctor]){
								echo '<option value="'.$datos[id_Doctor].'" selected>'.$datos[Nombre]."  ".$datos[A_Paterno].'</option>';
							}else{
								echo '<option value="'.$datos[id_Doctor].'">'.$datos[Nombre]."  ".$datos[A_Paterno].'</option>';
							}
						}
					?>
				</select>&nbsp;&nbsp;&nbsp; 									
				
				<input type='submit' class="botonHis" value='Consultar'><br><br>				
			</form>	

			<div id="reporteDoctores" style="background-color: #7cbfff ">			
				<?php		
					if($id_doctor!=""){
						
						echo "<script>
								document.getElementById('veterinario').style.display ='block';			
								document.getElementById('reporteDoctores').style.display ='block';										
							</script>";																
								
						$count=$conn->query("select *from recetas,veterinarios 
								where BINARY recetas.id_Doctor = veterinarios.id_Doctor  
								and recetas.id_Doctor = '$id_doctor' GROUP by recetas.diagnostico");		
						$datos = mysqli_fetch_array($count); 																	
						$nombre_doctor= $datos['Nombre']." ".$datos['A_Paterno']." ".$datos['A_Materno'];
						
						$count=$conn->query("select count(*) total from recetas 
								where BINARY recetas.id_Doctor = '$id_doctor'");		
						$datos = mysqli_fetch_array($count); 																	
						$total_visiras= $datos['total'];
						
					}else{
						echo "<script>
							document.getElementById('veterinario').style.display ='none';	
							document.getElementById('reporteDoctores').style.display ='none';						
						</script>";							
					}								
				?>
				
				<br>
				<label id="masco_cita"><b>&nbsp;Veterinario:</b></label> &nbsp;					
				<input type="text" id="masco_cita2" readonly="readonly" value="<?php echo $nombre_doctor;?>"/>&nbsp;&nbsp; 								
				
				<br><br>
				
				<label id="date"><b>&nbsp;Mascotas Atendidas:</b></label> &nbsp;					
				<input type="text" id="date" readonly="readonly" value="<?php echo $total_visiras;?>"/>&nbsp;&nbsp; 								
				<br><br>								
				
				<div class="btn__form">					
				<button class="botonEliminar" type='submit' name='cambio' value='Modificar'> Eliminar </button>
					<input type='submit' id="masco_cita" class="boton" onclick="consultaMedica()" value='Ver Información'>					
				</div><br>
			</div>		
		</div>															
				
		

		<div id="usuario_modo">							
			<br><label style="border-bottom:2px solid  #0074ff; background-color:white">&nbsp;&nbsp;&nbsp;- Usuario -&nbsp;&nbsp;&nbsp;</label><br>
			<form  action="administrador.php" method='GET'>
				<br><br><label style="background-color:white"><b>Usuario:&nbsp;&nbsp;&nbsp;</b></label> &nbsp;&nbsp;&nbsp; 								
				<select name="id_usuario" id="id_usuario" required>
					<option value="0"> - Seleccione Usuario - </option>
					<?php
						$count=$conn->query("select id_Cliente, Nombre, A_Paterno from clientes ");	
						while ($datos = mysqli_fetch_array($count)){							
							if($id_usuario==$datos[id_Cliente]){								
								echo '<option value="'.$datos[id_Cliente].'" selected>'.$datos[Nombre]."  ".$datos[A_Paterno].'</option>';
							}else{
								echo '<option value="'.$datos[id_Cliente].'">'.$datos[Nombre]."  ".$datos[A_Paterno].'</option>';
							}
						}
					?>
				</select>&nbsp;&nbsp;&nbsp; 													
				<input type='submit' class="botonHis" value='Consultar'><br><br>				
								
			</form>	
			
			<div id="usuario_modo_reportes" style="background-color: #7cbfff ">
			
				<?php		
					if($id_usuario!=""){
						
						echo "<script>
								document.getElementById('usuario_modo').style.display ='block';			
								document.getElementById('usuario_modo_reportes').style.display ='block';																		
							</script>";																
								
						$count=$conn->query("select *from clientes
								where BINARY id_Cliente = '$id_usuario' ");		
						$datos = mysqli_fetch_array($count); 																	
						$nombre_doctor= $datos['Nombre']." ".$datos['A_Paterno']." ".$datos['A_Materno'];
						
						$count=$conn->query("select count(*) total from recetas, citas, clientes, mascotas
								where BINARY recetas.id_cita=citas.id_Cita and
								citas.id_Mascota=mascotas.id_Mascota and
								mascotas.id_Cliente=clientes.id_Cliente and
								clientes.id_Cliente= '$id_usuario'");		
						$datos = mysqli_fetch_array($count); 																	
						$total_visiras= $datos['total'];
						
					}else{
						echo "<script>
							document.getElementById('usuario_modo').style.display ='none';	
							document.getElementById('usuario_modo_reportes').style.display ='none';						
						</script>";							
					}								
				?>
				
				<br>
				<label id="masco_cita"><b>&nbsp;Usuario:</b></label> &nbsp;					
				<input type="text" id="masco_cita2" readonly="readonly" value="<?php echo $nombre_doctor;?>"/>&nbsp;&nbsp; 								
				
				<br><br>
				
				<label id="date"><b>&nbsp;Visitas:</b></label> &nbsp;					
				<input type="text" id="date" readonly="readonly" value="<?php echo $total_visiras;?>"/>&nbsp;&nbsp; 								
				<br><br>								
				
				<form  action="administrador.php" method='GET'>
					<label id="date"><b>&nbsp;Mascotas:</b></label> &nbsp;		
					<select name="id_mascota" id="id_mascota" required>
						<option value="0"> - Seleccione Mascota - </option>
						<?php
							$count=$conn->query("select id_Mascota, Nombre from mascotas where BINARY id_Cliente = '$id_usuario'");	
							while ($datos = mysqli_fetch_array($count)){
								if($id_mascota==$datos[id_Mascota]){																	
									echo '<option value="'.$datos[id_Mascota].'" selected>'.$datos[Nombre].'</option>';
								}else{
									echo '<option value="'.$datos[id_Mascota].'">'.$datos[Nombre].'</option>';
								}
																
							}
						?>
					</select>&nbsp;&nbsp;&nbsp; 													
					<input type='hidden' name='id_usuario' id='id_usuario' value="<?php echo $id_usuario;?>">									
					<input type='submit' class="botonHis" onclick="consultaMascota()" value='Ver Mascota'><br><br>								
				</form>
				<div class="btn__form">					
					<button class="botonEliminar" type='submit' name='cambio' value='Modificar'> Eliminar </button>					
					<input type='submit' id="masco_cita" class="boton" onclick="MostrarInfor()" value='Ver Información'>					
				</div><br>
			</div>		
			
		</div>						
		
		
		<div id="mascotas_Ver">	
			<?php		
				if($id_mascota!=""){										
					echo "<script>							
							document.getElementById('mascotas_Ver').style.display ='block';										
						</script>";					
						$count=$conn->query("select *from mascotas
								where BINARY id_Mascota = '$id_mascota' ");		
						$datos = mysqli_fetch_array($count); 																	
						$nombre_mascota= $datos['Nombre'];						
				}else{
					echo "<script>
						document.getElementById('mascotas_Ver').style.display ='none';							
					</script>";							
				}												
			?>		
			<br>
			<label id="masco_cita" style="border-bottom:2px solid  #0074ff; background-color:white"><b>&nbsp;Mascota:</b></label> &nbsp;					
			<input type="text" id="masco_cita2" readonly="readonly" value="<?php echo $nombre_mascota;?>"/>&nbsp;&nbsp; 												
			<button class="botonMod" type='submit' name='cambio' value='Modificar'> Eliminar </button>					
			<br><br>
		</div>										
		
		<div id="productos_panel">
		
			<br><label style="border-bottom:2px solid  #0074ff; background-color:white;"><b>- Productos -</b></label><br><br>
			<button class="botonHis" type='submit' onclick="altaProducto()" name='cambio' value='Ver historial'>Agregar &#x2295 </button>&nbsp;&nbsp;&nbsp;
			<button class="botonMod" type='submit' onclick="modificarProd()" name='mod' value='ModificarPr'> Modificar </button> <br><br><br>
									
			<div id="altaProd" style="background-color: #7a6fff ">	
				<form  action="base_datos.php" method="post"><br>
					<label><b>Nombre:</b></label> &nbsp;&nbsp;&nbsp; 																			
					<input class="input" type="text" name="nombre" style="WIDTH: 200px; HEIGHT: 15px" placeholder="Nombre" required>&nbsp;&nbsp; 	<br>							
					<label><b>Marca:</b></label> &nbsp;&nbsp;&nbsp; 																			
					<input class="input" type="text" name="marca" style="WIDTH: 200px; HEIGHT: 15px" placeholder="Marca Producto" required> 	<br>							
					&nbsp;&nbsp;&nbsp;<label><b>Peso:</b></label> &nbsp;&nbsp;&nbsp; 																			
					<input class="input" type="text" name="peso" style="WIDTH: 200px; HEIGHT: 15px" placeholder="Kg/Lt" required> 	<br>							
					<label><b>Precio:</b></label> &nbsp;&nbsp;&nbsp; 																			
					<input class="input" type="text" name="precio" style="WIDTH: 200px; HEIGHT: 15px" placeholder="$" required> 	<br>							
					<label><b>Existencia:</b></label> &nbsp;&nbsp;&nbsp; 																			
					<input class="input" type="text" name="existencia" style="WIDTH: 200px; HEIGHT: 15px" placeholder="Almacen" required> 	<br>							
					<div class="btn__form">											
						<input type='hidden' name='opcion' id='opcion' value='alta_producto'>
						<input type='submit' class="botonHis" name='cambio' value='Alta'>					
					</div><br>
				</form>
			</div>
			
			<div id="modProd" style="background-color: #7cbfff ">			
				<form  action="administrador.php"  method="GET"><br>
					<label><b>Producto:</b></label> &nbsp;&nbsp;&nbsp; 																			
					<select name="id_producto" id="id_producto" required>
						<option value="0"> - Seleccione Mascota - </option>
						<?php
							$count=$conn->query("select id_Producto, Nombre from productos ");	
							while ($datos = mysqli_fetch_array($count)){															
								if($id_producto==$datos[id_Producto]){									
									echo '<option value="'.$datos[id_Producto].'" selected>'.$datos[Nombre].'</option>';
								}else{
									echo '<option value="'.$datos[id_Producto].'">'.$datos[Nombre].'</option>';
								}
							}
						?>
					</select>&nbsp;&nbsp;&nbsp; 	
					<div class="btn__form">																	
						<button class="botonHis" type='submit' > Actualizar </button>					
						
					</div><br>
				</form>
			</div>
			
			<div id="cambiar" style="background-color: #b5dbff  ">	
				<?php						
					if($id_producto!=""){							
						echo "<script>															
								document.getElementById('productos_panel').style.display ='block';										
								document.getElementById('modProd').style.display ='block';										
								document.getElementById('cambiar').style.display ='block';										
							</script>";					
				
						$busca=$conn->query("select * from productos where BINARY id_Producto = '$id_producto'");	
						$personal = mysqli_fetch_array($busca);
										
					}else{
						echo "<script>							
							document.getElementById('productos_panel').style.display ='none';										
								document.getElementById('modProd').style.display ='none';										
								document.getElementById('cambiar').style.display ='none';										
						</script>";							
					
					}																	
				?>		
			
				<form  action="base_datos.php" method="post"><br>
					<label><b>Nombre:</b></label> &nbsp;&nbsp;&nbsp; 																			
					<input class="input" type="text" name="nombre" style="WIDTH: 200px; HEIGHT: 15px" placeholder="Nombre" value="<?php echo $personal['Nombre'];?>" required>&nbsp;&nbsp; 	<br>							
					<label><b>Marca:</b></label> &nbsp;&nbsp;&nbsp; 																			
					<input class="input" type="text" name="marca" style="WIDTH: 200px; HEIGHT: 15px" placeholder="Marca Producto"  value="<?php echo $personal['Marca'];?>" required> 	<br>							
					&nbsp;&nbsp;&nbsp;<label><b>Peso:</b></label> &nbsp;&nbsp;&nbsp; 																			
					<input class="input" type="text" name="peso" style="WIDTH: 200px; HEIGHT: 15px" placeholder="Kg/Lt" value="<?php echo $personal['Peso_Tam'];?>" required> 	<br>							
					<label><b>Precio:</b></label> &nbsp;&nbsp;&nbsp; 																			
					<input class="input" type="text" name="precio" style="WIDTH: 200px; HEIGHT: 15px" placeholder="$" value="<?php echo $personal['Precio'];?>" required> 	<br>							
					<label><b>Existencia:</b></label> &nbsp;&nbsp;&nbsp; 																			
					<input class="input" type="text" name="existencia" style="WIDTH: 200px; HEIGHT: 15px" placeholder="Almacen" value="<?php echo $personal['Existencia'];?>" required> 	<br>							
					<div class="btn__form">											
						<input type='hidden' name='opcion' id='opcion' value='modificar_producto'>
						<input type='hidden' name='id_producto' id='id_producto' value="<?php echo $id_producto;?>">
						<button class="botonEliminar" type='submit' name='cambio' value='Modificar'> Eliminar </button>					
						<input type='submit' class="botonHis" name='cambio' value='Modificar'>					
					</div><br>
				</form>
			</div>
			
		</div>											
		
		<div id="post_panel">
		
			<br><label style="border-bottom:2px solid  #0074ff; background-color:#dcffb5;"><font  size=5><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Post -&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</b></font></label><br><br>
			<button class="botonHis" type='submit' onclick="altaPost()" name='cambio' value='Ver historial'>Agregar &#x2295 </button>&nbsp;&nbsp;&nbsp;
			<button class="botonMod" type='submit' onclick="modificarPost()" name='mod' value='ModificarPr'> Modificar </button> <br><br><br>
									
			<div id="altaPost" style="background-color: #e262ff ">	
				<form  action="base_datos.php" method="post"><br>
					<label><b>Titulo:</b></label> &nbsp;&nbsp;&nbsp; 																			
					<input class="input" type="text" name="titulo" style="WIDTH: 200px; HEIGHT: 15px" placeholder="Nombre" required>&nbsp;&nbsp; 	<br>							
					<br><label><b>Post:</b></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;					
					<br><textarea class="input" name="post" rows= '5' cols= '50'  placeholder="Mensaje" required" >  </textarea>					
					<br><label><b>Imagen URL:</b></label> &nbsp;&nbsp;&nbsp; 							
					<input class="input" type="text" name="imagen" style="WIDTH: 200px; HEIGHT: 15px" placeholder="https://" required> 	<br>												
					<div class="btn__form">											
						<input type='hidden' name='opcion' id='opcion' value='alta_post'>
						<input type='submit' class="botonHis" name='cambio' value='Alta'>					
					</div><br>
				</form>
			</div>
			
			<div id="modPost" style="background-color: #7cbfff ">			
				<form  action="administrador.php"  method="GET"><br>
					<label><b>Post:</b></label> &nbsp;&nbsp;&nbsp; 																			
					<select name="id_post" id="id_post" required>
						<option value="0"> - Seleccione Post - </option>
						<?php
							$count=$conn->query("select id_Post, titulo from post ");	
							while ($datos = mysqli_fetch_array($count)){
								if($id_post==$datos[id_Post]){																		
									echo '<option value="'.$datos[id_Post].'" selected>'.$datos[titulo].'</option>';
								}else{
									echo '<option value="'.$datos[id_Post].'">'.$datos[titulo].'</option>';
								}
								
							}
						?>
					</select>&nbsp;&nbsp;&nbsp; 	
					<div class="btn__form">																	
						<button class="botonHis" type='submit' > Actualizar </button>					
						
					</div><br>
				</form>
			</div>
			
			<div id="cambiarPost" style="background-color: #b5dbff ">	
				<?php						
					if($id_post!=""){							
						echo "<script>															
								document.getElementById('post_panel').style.display ='block';										
								document.getElementById('modPost').style.display ='block';										
								document.getElementById('cambiarPost').style.display ='block';										
							</script>";					
				
						$busca=$conn->query("select * from post where BINARY id_Post = '$id_post'");	
						$personal = mysqli_fetch_array($busca);
										
					}else{
						echo "<script>							
							document.getElementById('post_panel').style.display ='none';										
								document.getElementById('modPost').style.display ='none';										
								document.getElementById('cambiarPost').style.display ='none';										
						</script>";							
					
					}																	
				?>		
			
				<form  action="base_datos.php" method="post"><br>
				
					<label><b>Titulo:</b></label> &nbsp;&nbsp;&nbsp; 																			
					<input class="input" type="text" name="titulo" style="WIDTH: 200px; HEIGHT: 15px" placeholder="Nombre" value="<?php echo $personal['Titulo'];?>" required>&nbsp;&nbsp; 	<br>							
					<br><label><b>Post:</b></label> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;					
					<br><textarea class="input" name="post" rows= '5' cols= '50'  placeholder="Mensaje" required" > <?php echo $personal['Post'];?> </textarea>					
					<br><label><b>Imagen URL:</b></label> &nbsp;&nbsp;&nbsp; 							
					<input class="input" type="text" name="imagen" style="WIDTH: 200px; HEIGHT: 15px" placeholder="https://" value="<?php echo $personal['imagen_link'];?>" required> 	<br>												
					
					<div class="btn__form">											
						<input type='hidden' name='opcion' id='opcion' value='modificar_post'>
						<input type='hidden' name='id_post' id='id_post' value="<?php echo $id_post;?>">
						<input type='submit' class="botonEliminar" name='cambio' value='Eliminar'>					
						<input type='submit' class="botonHis" name='cambio' value='Modificar'>					
					</div><br>
				</form>
			</div>
			
		</div>	
		
		<div id="reportes" style="background-color: #9000ba  ">
		   <br><label><b><font style="background-color:#008dd5; color:black;" size=5.5>&nbsp;&nbsp;&nbsp;&nbsp;- Datos Personales -&nbsp;&nbsp;&nbsp;&nbsp;</font></b></label><br><br>
		</div>
		
		<br><br><br><br>
		<div id="linea" style="background-color: #9000ba  ">
		   
		</div>
			
		<div id="Doctor">
			<br><label><b><font style="background-color:#008dd5; color:black;" size=5.5>&nbsp;&nbsp;&nbsp;&nbsp;- Datos Personales -&nbsp;&nbsp;&nbsp;&nbsp;</font></b></label><br><br>
			<?php
				$busca=$conn->query("select * from veterinarios where BINARY id_Doctor = '$id_doctor'");	
				$personal = mysqli_fetch_array($busca);
			?>
			<form class="form__reg" action="base_datos.php" method="POST">			
				<input background="red" class="input" name="nombre" type="text" placeholder="&#128101;  Nombre" required  value="<?php echo $personal['Nombre'];?>" >
				<input class="input" type="text" name="apellido_p" placeholder="&#128101;  Apellido Paterno" required value="<?php echo $personal['A_Paterno'];?>">
				<input class="input" type="text" name="apellido_m" placeholder="&#128101;  Apellido Materno" required value="<?php echo $personal['A_Materno'];?>">			
				<input class="input" name="cedula" type="text" placeholder="&#128101;  Cedula profesional" value="<?php echo $personal['cedula_Profesional'];?>" required>			
				<br><label><font style="background-color:#008dd5; color:black;" size=5.5>&nbsp;&nbsp;&nbsp;&nbsp;- Direccion -&nbsp;&nbsp;&nbsp;&nbsp;</font></label>
				<textarea class="input"  name="direccion" rows= '8' cols= '50' placeholder="&#127968;  Direccion" required ><?php echo $personal['Direccion'];?></textarea>
				<br><label><font style="background-color:#008dd5; color:black;" size=5.5>&nbsp;&nbsp;&nbsp;&nbsp;- Referencia -&nbsp;&nbsp;&nbsp;&nbsp;</font></label>
				<textarea class="input" name="direccion_r" rows= '8' cols= '50' placeholder="&#127969;  Referencia Direccion" required> <?php echo $personal['Descripcion_Domicilio'];?> </textarea>            
				<input class="input" name="telefono" type="text" placeholder="&#128222;  Telefono" required value="<?php echo $personal['Telefono'];?>">
				<input class="input" name="telefono_c" type="text" placeholder="&#128222;  Telefono Contacto" required value="<?php echo $personal['Telefono_Contacto'];?>">
				<input class="input" name="correo" type="email" placeholder="&#9993;  Correo" required value="<?php echo $personal['correo_electronico'];?>"><br>				
				<input class="input" name="usuario" type="text" placeholder="&#128100;  Usuario" required value="<?php echo $personal['usuario'];?>">
				<input class="input" name="contra" type="password" placeholder="&#128273;  Contraseña" required value="<?php echo $personal['contrasena'];?>">
				<input class="input" name="respuesta" type="text" placeholder="&#128021;  Respuesta secreta" required value="<?php echo $personal['respuesta_secreta'];?>">
				<input type='hidden' name='opcion' id='opcion' value="modificar_Doctor_Admin">				     
				<div class="btn__form">					
					<input class="btn__submit" type="submit" value="&#128100; Actualizar">		
				</div>
			</form>
		</div>		
			
		<div id="contenido">
			<br><label><b><font style="background-color:#008dd5; color:black;" size=5.5>&nbsp;&nbsp;&nbsp;&nbsp;- Datos Personales -&nbsp;&nbsp;&nbsp;&nbsp;</font></b></label><br><br>
			<?php
				$busca=$conn->query("select * from clientes where BINARY id_Cliente = '$id_usuario'");	
				$personal = mysqli_fetch_array($busca);
			?>
			<form class="form__reg" action="base_datos.php" method="POST">			
				<input background="red" class="input" name="nombre" type="text" placeholder="&#128101;  Nombre" required  value="<?php echo $personal['Nombre'];?>" >
				<input class="input" name="apellido_p" type="text" placeholder="&#128101;  Apellido Paterno" required value="<?php echo $personal['A_Paterno'];?>">
				<input class="input" name="apellido_m" type="text" placeholder="&#128101;  Apellido Materno" required value="<?php echo $personal['A_Materno'];?>">			
				<br><label><font style="background-color:#008dd5; color:black;" size=5.5>&nbsp;&nbsp;&nbsp;&nbsp;- Direccion -&nbsp;&nbsp;&nbsp;&nbsp;</font></label>
				<textarea class="input" name="direccion" rows= '8' cols= '50' placeholder="&#127968;  Direccion" required ><?php echo $personal['Direccion'];?></textarea>
				<br><label><font style="background-color:#008dd5; color:black;" size=5.5>&nbsp;&nbsp;&nbsp;&nbsp;- Referencia -&nbsp;&nbsp;&nbsp;&nbsp;</font></label>
				<textarea class="input" name="direccion_r" rows= '8' cols= '50' placeholder="&#127969;  Referencia Direccion" required> <?php echo $personal['Referencia_domicilio'];?> </textarea>            
				<input class="input" name="telefono" type="text" placeholder="&#128222;  Telefono" required value="<?php echo $personal['Telefono'];?>">
				<input class="input" name="telefono_c" type="text" placeholder="&#128222;  Telefono Contacto" required value="<?php echo $personal['Telefono_Contacto'];?>">
				<input class="input" name="correo" type="email" placeholder="&#9993;  Correo" required value="<?php echo $personal['correo_electronico'];?>"><br>				
				<input class="input" name="usuario" type="text" placeholder="&#128100;  Usuario" required value="<?php echo $personal['usuario'];?>">
				<input class="input" name="contra" type="password" placeholder="&#128273;  Contraseña" required value="<?php echo $personal['contrasena'];?>">
				<input class="input" name="respuesta" type="text" placeholder="&#128021;  Respuesta secreta" required value="<?php echo $personal['respuesta_secreta'];?>">
				<input type='hidden' name='opcion' id='opcion' value="modificar_Usuarios_Admin">				     
				<div class="btn__form">					
					<input class="btn__submit" type="submit" value="&#128100; Actualizar">		
				</div>
			</form>
		</div>	
		

		<div id="recetaMedica"  style="background-color: #7cbfff ">		
			<br><br><label><b><font size=5><b>- Receta Medica -</b></font></b></label><br><br>			
			<form class="form__reg" action="base_datos.php" method="POST">			
			<?php	
				if($doctor==""){
					$count=$conn->query("select *from veterinarios where BINARY id_Doctor = '$id'");							
					$resultado_con = mysqli_fetch_array($count); 		
					$nom_doctor=$resultado_con['Nombre']. " ".$resultado_con['A_Paterno']. " ".$resultado_con['A_Materno'];				
				}else{
					$nom_doctor=$doctor;
				}
			?>
			<div id= "recetaMedicaDatos" style="background-color: #ffd68d ">
				<br><label>Veterinario</label>&nbsp;
				<input class="input" type="text" style="WIDTH: 250px; HEIGHT: 20px"  readonly="readonly" placeholder="&#128101;  Nombre" required value="<?php echo $nom_doctor;?>">
				<br><br><label>Peso</label>&nbsp;
				<input class="input" type="text" name="peso" required value="<?php echo $peso;?>" >
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Temperatura c°</label>
				<input class="input" type="text" name="temperatura" required value="<?php echo $temperatura;?>" >				
				<br><br><br><label>Diagnostico</label><br>
				<br><textarea class="input" name="diagnostico" rows= '5' cols= '50'  required" > <?php echo $diagnostico;?> </textarea>
				<br><br><br><label>Tratamiento</label>
				<br><br><textarea class="input" name="tratamiento" rows= '6' cols= '60'  required> <?php echo $tratamiento;?> </textarea>            				
				
				<input type='hidden' name='id_Cita' id='id_Cita' value="<?php echo $id_mas_bus;?>">		
				<input type='hidden' name='id_doctor' id='id_doctor' value="<?php echo $id;?>">				
				<input type='hidden' name='id_mascota' id='id_mascota' value="<?php echo $id_Mascota;?>">								
				<input type='hidden' name='usuario_nom' id='usuario_nom' value="<?php echo $usuario_nom;?>">
				<input type='hidden' name='opcion' id='opcion' value="alta_receta">
				<?php						
					$doctor="";
				?>
				<div class="btn__form">					
					<input class="btn__submit" type="submit" value="&#128100; Recetar">		
				</div>				
				</form>
			</div>
		</div>				
	
		<br><br><br>
	</div>
</body>
</html>