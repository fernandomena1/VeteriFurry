<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">	
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<link rel="stylesheet" type="text/css" href="css/sesion usuario/inicio_user.css?1.0" media="all">	
	<link rel="stylesheet" type="text/css" href="css/sesion usuario/menu.css?1.0" media="all">	
	<link rel="stylesheet" type="text/css" href="css/sesion usuario/registro.css?1.0" media="all">	

	<title>Usuarios</title>
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
	header("Content-Type: text/html;charset=utf-8");
	
	if (isset($_GET['id'])){		
		$id=$_GET['id'];		
		$usuario_nom=$_GET['usuario_nom'];
		$id_mascota_buscar="";
		$mascota_combo="";
		$doctor="";
		$diagnostico="";
		$tratamiento="";
		$peso="";
		$temperatura="";
		if (isset($_GET['id_mascota_buscar'])){		
			$id_mascota_buscar=$_GET['id_mascota_buscar'];
		}
		if (isset($_GET['mascota_combo'])){		
			$mascota_combo=$_GET['mascota_combo'];
			$count=$conn->query("select *from recetas,mascotas,veterinarios, citas  
									where BINARY recetas.id_Mascota= mascotas.id_Mascota 
									and citas.id_Mascota=recetas.id_Mascota 								
									and recetas.id_Doctor = veterinarios.id_Doctor  
									and recetas.id_cita = '$mascota_combo' GROUP by recetas.diagnostico");		
			$datos = mysqli_fetch_array($count); 											
			if($datos==null){
				
			}else{
				$doctor= $datos['Nombre']." ".$datos['A_Paterno']." ".$datos['A_Materno'];
				$diagnostico= $datos['diagnostico'];
				$tratamiento= $datos['tratamiento'];
				$peso= $datos['peso'];
				$temperatura= $datos['temperatura'];
			}									
		}
		
		
	}else{		
		$id="";		
		$usuario_nom="";
		$id_mascota_buscar="";
		$mascota_combo="";
		$doctor="";
		$diagnostico="";
		$tratamiento="";
		$peso="";
		$temperatura="";
	}		
?>	       


<script type="text/javascript">
	function Perfil(){		
		document.getElementById("contenido").style.display ="block";
		document.getElementById("cita").style.display ="none";
		document.getElementById("tuscitas").style.display ="none";
		document.getElementById("mod_mascota").style.display ="none";
		document.getElementById("recetaMedica").style.display ="none";
		document.getElementById("expedientes").style.display ="none";
	}			
	function Cita(){		
		document.getElementById("cita").style.display ="block";
		document.getElementById("tuscitas").style.display ="block";
		document.getElementById("contenido").style.display ="none";
		document.getElementById("mod_mascota").style.display ="none";
		document.getElementById("recetaMedica").style.display ="none";
		document.getElementById("expedientes").style.display ="none";
	}			
	
	function Mascota_panel(){		
		document.getElementById("mod_mascota").style.display ="block";
		document.getElementById("alta").style.display ="none";
		document.getElementById("modi").style.display ="none";
		document.getElementById("contenido").style.display ="none";
		document.getElementById("cita").style.display ="none";
		document.getElementById("tuscitas").style.display ="none";
		document.getElementById("recetaMedica").style.display ="none";
		document.getElementById("expedientes").style.display ="none";
	}			
	
	function Historial(){		
		document.getElementById("expedientes").style.display ="block";	
		document.getElementById("mod_mascota").style.display ="none";
		document.getElementById("alta").style.display ="none";
		document.getElementById("modi").style.display ="none";
		document.getElementById("contenido").style.display ="none";
		document.getElementById("cita").style.display ="none";
		document.getElementById("tuscitas").style.display ="none";
		document.getElementById("recetaMedica").style.display ="none";		
	}	
	
	function ModificaMascota(){		
		document.getElementById("modi").style.display ="block";		
		document.getElementById("alta").style.display ="none";		
	}		
	
	function AltaMascota(){		
		document.getElementById("alta").style.display ="block";		
		document.getElementById("modi").style.display ="none";		
	}			
	function Salir(){		
		location.href='index.php'
	}			
</script>


<body> <!--background="img/blanco.jpg"-->
	
	<div id="general"> <!--Contiene todo-->
		<header>
			<h1 class="title">Furry Friends Pets</h1>	
			<img src="img/logo.jpg" width= "80" height= "80">

		</header>
		<div id="perfil">
			<center>				
				<img src="img/huella.png" width= "180" height= "180">
				<br><br><label><b><?php echo $usuario_nom;?></b></label><br>
				<input class="botonC" type="submit" name="inicio" onclick="Salir()" value="Cerrar Sesión">			
			</center>
			
		</div>				
						
						
		<div id="menu">						
			<nav>
				<a onclick="Cita()" >Agendar&nbsp;Cita</a>
				<a onclick="Mascota_panel()">Mascota</a>
				<a onclick="Historial()"> Historial</a>
				<a onclick="Perfil()" >Perfil</a>
				<div class="animation start-home"></div>
			</nav>			
		</div>
		
		<div id="mascotas">		
			<div id="izq">		
				<br><label><b>&nbsp;&nbsp;&nbsp;&nbsp;Tú(s) Mascotas:</b></label><br>
				<br>
				<label><b>&nbsp;&nbsp;&nbsp;&nbsp;ID</b></label> &nbsp;&nbsp;&nbsp; 	
				<label><b>&nbsp;&nbsp;&nbsp;&nbsp;Mascota(s)</b></label> &nbsp;&nbsp;&nbsp; <br><br>				
				
				<?php
					$count=$conn->query("select id_Mascota, Nombre from mascotas where BINARY id_Cliente = '$id'");						
					
					while ($datos = mysqli_fetch_array($count)){
						echo  "<label><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$datos['id_Mascota']."</b></label> &nbsp;&nbsp;&nbsp; ".
							    "<label><b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;".$datos['Nombre']."</b></label> &nbsp;&nbsp;&nbsp;<br>" ;
					}	
				?>
				<br>
			</div>
			
			<div id="der"><br>
			<center>
				
				</center>
			</div>
			
			<!--<input type='submit' class="boton" onclick="Cita()" name='cambio' value='Agendar cita'>&nbsp;&nbsp;&nbsp;
			<button class="botonHis" type='submit' name='cambio' value='Ver historial'>Ver historial </button>&nbsp;&nbsp;&nbsp;
			<button class="botonMod" type='submit' name='cambio' value='Modificar'> Modificar </button> <br><br><br>--->
						
		</div>	
			
	
		<div id="contenido">
		
			<br><label><font style="background-color: #ff7800 ; color:black;" size=5.5><b>&nbsp;&nbsp;&nbsp;- Datos Personales -&nbsp;&nbsp;&nbsp;</b></font></label><br><br>
			<?php
				$busca=$conn->query("select * from clientes where BINARY id_Cliente = '$id'");	
				$personal = mysqli_fetch_array($busca);
			?>
			<form class="form__reg" action="base_datos.php" method="POST">
			
				<input class="input"  name="nombre" type="text" placeholder="&#128101;  Nombre" style="background:#ffc868;" required  value="<?php echo $personal['Nombre'];?>" >
				<input class="input" name="apellido_p" type="text" placeholder="&#128101;  Apellido Paterno" style="background:#ffc868;" required value="<?php echo $personal['A_Paterno'];?>">
				<input class="input" name="apellido_m" type="text" placeholder="&#128101;  Apellido Materno" style="background:#ffc868;" required value="<?php echo $personal['A_Materno'];?>">			
				<br><label><font style="background-color: #ff7800 ; color:black;" size=5.5>&nbsp;&nbsp;&nbsp;- Direccion -&nbsp;&nbsp;&nbsp;</font></label>
				<textarea class="input" name="direccion" rows= '8' cols= '50' placeholder="&#127968;  Direccion" style="background:#ffc868;"  required ><?php echo $personal['Direccion'];?></textarea><br>
				<label><font style="background-color: #ff7800 ; color:black;" size=5.5>&nbsp;&nbsp;&nbsp;- Referencia -&nbsp;&nbsp;&nbsp;</font></label>
				<textarea class="input" name="direccion_r" rows= '8' cols= '50' placeholder="&#127969;  Referencia Direccion" style="background:#ffc868;"  required> <?php echo $personal['Referencia_domicilio'];?> </textarea>            
				<input class="input" name="telefono" type="text" placeholder="&#128222;  Telefono" style="background:#ffc868;"  required value="<?php echo $personal['Telefono'];?>">
				<input class="input" name="telefono_c" type="text" placeholder="&#128222;  Telefono Contacto" style="background:#ffc868;" required value="<?php echo $personal['Telefono_Contacto'];?>">
				<input class="input" name="correo" type="email" placeholder="&#9993;  Correo"  style="WIDTH: 250px; HEIGHT: 20px; background:#ffc868;" required value="<?php echo $personal['correo_electronico'];?>"><br>
				<input class="input" name="usuario" type="text" placeholder="&#128100;  Usuario" style="background:#ffc868;" required value="<?php echo $personal['usuario'];?>">
				<input class="input" name="contra" type="password" placeholder="&#128273;  Contraseña" style="background:#ffc868;" required value="<?php echo $personal['contrasena'];?>">
				<input class="input" name="respuesta" type="text" placeholder="&#128021;  Respuesta secreta" style="background:#ffc868;" required value="<?php echo $personal['respuesta_secreta'];?>">
            
				<input type='hidden' name='id_us' id='id_us' value="<?php echo $id;?>">				
				<input type='hidden' name='user' id='user' value="<?php echo $usuario_nom;?>">
				<input type='hidden' name='opcion' id='opcion' value="modificar_Usuarios">				
				<div class="btn__form">					
					<input class="btn__submit" type="submit" value="&#128100; Actualizar">		
				</div>
			</form>
		</div>									
		
		<div id="cita">
		
			<br><label style="border-bottom:2px solid  #0074ff  ;"><b>- Agendar Cita -</b></label><br><br>
			
			<form  action="base_datos.php" method="post">
				<label style="background-color:white;"><b>Mascota: &nbsp;&nbsp;</b></label> &nbsp;&nbsp;&nbsp; 								
				
				<select name="mascota" id="mascota" required>
					<option value="seleccione"> - Seleccione Mascota - </option>
					<?php
						$count=$conn->query("select id_Mascota, Nombre from mascotas where BINARY id_Cliente = '$id'");	
						while ($datos = mysqli_fetch_array($count)){
							echo '<option value="'.$datos[id_Mascota].'">'.$datos[Nombre].'</option>';
						}
					?>
				</select>
				<br><br>
				
				<label style="background-color:white;"><b>&nbsp;Fecha:&nbsp;&nbsp;&nbsp;&nbsp;</b></label> &nbsp;					
				<input type="date" id="date_sel" name="date_sel" placeholder="- Seleccione Fecha -" required/>&nbsp;&nbsp; 								
				
				<label style="background-color:white;"><b>&nbsp;Horario:&nbsp;&nbsp;&nbsp;&nbsp;</b></label>  	&nbsp;								
				<select name="horario" id="horario" required>
					<option value="seleccione"> - Horario - </option>
					
					<?php						
						$count=$conn->query("select hara from horarios ");	
						while ($datos = mysqli_fetch_array($count)){
							echo '<option value="'.$datos[hara].'">'.$datos[hara].'</option>';
						}
					?>
				</select>
				<input type='hidden' name='id_us' id='id_us' value="<?php echo $id;?>">				
				<input type='hidden' name='user' id='user' value="<?php echo $usuario_nom;?>">
				<input type='hidden' name='opcion' id='opcion' value="agendarCita">				
				<div class="btn__form">
					<input type='submit' class="boton"  name='cambio' value='Agendar cita'>
				</div><br>
			</form>
		</div>											
		
		<div id="tuscitas">							
			<br><label style="border-bottom:2px solid  #0074ff  ;">- Tus Citas -</label><br>
			<form  action="base_datos.php" method='POST'>
				<br><br><label style="background-color:white;"><b>Cita (s):</b></label> &nbsp;&nbsp;&nbsp; 								
				<select name="id_mascota_cita" id="id_mascota_cita">
					<option value="seleccione"> - Seleccione Cita - </option>
					<?php
						$count=$conn->query("select id_Cita, mascotas.Nombre, fecha from mascotas,citas,clientes 
											where BINARY mascotas.id_Cliente=clientes.id_Cliente and
											mascotas.id_Mascota=citas.id_Mascota and
											clientes.id_Cliente = '$id'");	
						while ($datos = mysqli_fetch_array($count)){
							if($id_mascota_cita==$datos[id_Cita]){
								echo '<option value="'.$datos[id_Cita].'" selected>'.$datos[fecha]."  ".$datos[Nombre].'</option>';
							}else{							
								echo '<option value="'.$datos[id_Cita].'">'.$datos[fecha]."  ".$datos[Nombre].'</option>';
							}
						}
					?>
				</select>&nbsp;&nbsp;&nbsp;				
				
				<input type='hidden' name='id' id='id' value="<?php echo $id;?>">				
				<input type='hidden' name='usuario_nom' id='usuario_nom' value="<?php echo $usuario_nom;?>">
				<input type='hidden' name='opcion' id='opcion' value="eliminarCita">				
				<input type='submit' class="botonEliminar" value='eliminar cita'><br><br>								
			</form>				
		</div>	
		
		
		
		<div id="mod_mascota">
		
			<br><label style="border-bottom:2px solid  #0074ff; background-color:white;"><b>- Mascotas -</b></label><br><br>
			<button class="botonHis" type='submit' onclick="AltaMascota()" name='cambio' value='Ver historial'>Agregar &#x2295</button>&nbsp;&nbsp;&nbsp;
			<button class="botonMod" type='submit'  onclick="ModificaMascota()" name='cambio' value='Modificar'> Modificar </button> <br><br><br>
			
			<div id="modificar" style="background-color: #e262ff ">
				<form  action="" id="modi"><br>
					<label><b>Mascota:</b></label> &nbsp;&nbsp;&nbsp; 								
				
					<select name="mascota" id="combo">
						<option value="seleccione"> - Seleccione Mascota - </option>
					
						<?php
							$count=$conn->query("select id_Mascota, Nombre from mascotas where BINARY id_Cliente = '$id'");	
							while ($datos = mysqli_fetch_array($count)){
								echo '<option value="'.$datos[id_Mascota].'">'.$datos[Nombre].'</option>';
							}
						?>
					</select>
					<br><br>
				
					&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;<label><b>Nombre:</b></label> &nbsp;&nbsp;&nbsp; 												
					<input class="input" type="text" required>&nbsp;&nbsp; 								
					<div class="btn__form">		
						<input type='submit' class="botonEliminar" name='cambio' value='Eliminar'>					
						<input type='submit' class="boton" onclick="Cita()" name='cambio' value='Modificar'>					
					</div><br>
				</form>
			</div>
			<div id="altaMascota" style="background-color: #7cbfff ">
				<form  action="base_datos.php" id="alta" method="post"><br>
					<label><b>Nombre:</b></label> &nbsp;&nbsp;&nbsp; 																			
					<input class="input" type="text" name="mascota" style="WIDTH: 200px; HEIGHT: 15px" placeholder="Mascota" required>&nbsp;&nbsp; 								
					<div class="btn__form">					
						<input type='hidden' name='id_usuario' id='opcion' value="<?php echo $id;?>" >
						<input type='hidden' name='opcion' id='opcion' value='alta_mascota'>
						<input type='submit' class="botonHis" onclick="Cita()" name='cambio' value='Alta'>					
					</div><br>
				</form>
			</div>
		</div>			
		
		<div id="expedientes">							
			<br><label style="border-bottom:2px solid  #0074ff  ;">- Expediente Mascotas -</label><br>
			<form  action="inicio_user.php" method='GET'>
				<br><br><label style="background-color:white;"><b>Id mascota:</b></label> &nbsp;&nbsp;&nbsp; 								
				<select name="id_mascota_buscar" id="id_mascota_buscar">
					<option value="seleccione"> - Seleccione Mascota - </option>
					<?php
						$count=$conn->query("select id_Mascota, Nombre from mascotas where BINARY id_Cliente = '$id'");	
						while ($datos = mysqli_fetch_array($count)){
							if($id_mascota_buscar==$datos[id_Mascota]){
								echo '<option value="'.$datos[id_Mascota].'" selected>'.$datos[Nombre].'</option>';
							}else{							
								echo '<option value="'.$datos[id_Mascota].'">'.$datos[Nombre].'</option>';
							}
						}
					?>
				</select>&nbsp;&nbsp;&nbsp;				
				
				<input type='hidden' name='id' id='id' value="<?php echo $id;?>">				
				<input type='hidden' name='usuario_nom' id='usuario_nom' value="<?php echo $usuario_nom;?>">
				<input type='submit' class="botonMod" value='Buscar cita'><br><br>								
			</form>	
			<div id="expedientes_consultas" style="background-color: #7cbfff ">
				<form action="inicio_user.php" method='GET'>
					<br><label id="masco_cita"><b>&nbsp;Visitas:</b></label> &nbsp;													
					<br><br><label id="date"><b>&nbsp;Fecha:</b></label> &nbsp;			
					<select name="mascota_combo" id="mascota_combo" required>
						<option value="seleccione"> - Seleccione cita - </option>
						<?php		
							if($id_mascota_buscar!=""){						
								echo "<script>
									document.getElementById('expedientes').style.display ='block';			
									document.getElementById('expedientes_consultas').style.display ='block';										
								</script>";																
								
								$count=$conn->query("select *from recetas,mascotas,veterinarios, citas  
										where BINARY recetas.id_Mascota= mascotas.id_Mascota 
										and citas.id_Mascota=recetas.id_Mascota 								
										and recetas.id_Doctor = veterinarios.id_Doctor  
										and recetas.id_Mascota = '$id_mascota_buscar' GROUP by recetas.diagnostico");		
								while ($datos = mysqli_fetch_array($count)){
									if($mascota_combo==$datos[id_cita]){
										echo '<option value="'.$datos[id_cita].'" selected>'.$datos[fecha]."  ".$datos[diagnostico]. '</option>';
									}else{
										echo '<option value="'.$datos[id_cita].'">'.$datos[fecha]."  ".$datos[diagnostico]. '</option>';
									}
								}
							}else{
								echo "<script>
									document.getElementById('expedientes').style.display ='none';	
									document.getElementById('expedientes_consultas').style.display ='none';						
								</script>";							
							}								
						?>
					</select>				
					<input type='hidden' name='id' id='id' value="<?php echo $id;?>">				
					<input type='hidden' name='id_mascota_buscar' id='id_mascota_buscar' value="<?php echo $id_mascota_buscar;?>">								
					<input type='hidden' name='usuario_nom' id='usuario_nom' value="<?php echo $usuario_nom;?>">
					<input type='hidden' name='opcion' id='opcion' value="buscar_receta">
					<input type='submit' class="botonHis" value='Consultar'><br>			
				</form>	
				<br><br>						
			</div>			
		</div>	
		<br><br><br>
		<div id="linea" style="background-color: #9000ba  ">
		   
		</div>

		<div id="recetaMedica"  style="background-color: #7cbfff ">		
			<br><br><label><b><font size=5><b>- Receta Medica -</b></font></b></label><br><br>			
			<form class="form__reg">			
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
				<input class="input" type="text" name="peso" required readonly="readonly" value="<?php echo $peso;?>" >
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Temperatura c°</label>
				<input class="input" type="text" name="temperatura" required value="<?php echo $temperatura;?>" readonly="readonly">				
				<br><br><br><label>Diagnostico</label><br>
				<br><textarea class="input" name="diagnostico" rows= '5' cols= '50'  required" readonly="readonly"> <?php echo $diagnostico;?> </textarea>
				<br><br><br><label>Tratamiento</label>
				<br><br><textarea class="input" name="tratamiento" rows= '6' cols= '60'  required readonly="readonly"> <?php echo $tratamiento;?> </textarea>            				
				
				<input type='hidden' name='id_Cita' id='id_Cita' value="<?php echo $id_mas_bus;?>" >		
				<input type='hidden' name='id_doctor' id='id_doctor' value="<?php echo $id;?>">				
				<input type='hidden' name='id_mascota' id='id_mascota' value="<?php echo $id_Mascota;?>">								
				<input type='hidden' name='usuario_nom' id='usuario_nom' value="<?php echo $usuario_nom;?>">
				<input type='hidden' name='opcion' id='opcion' value="alta_receta">		
			</form>
		</div>				
		
		<?php
			if($mascota_combo!=""){
				echo "<script>					
					document.getElementById('recetaMedica').style.display ='block';			
				</script>";
			}	
		?>		
		<br><br>
	</div>
</body>
</html>