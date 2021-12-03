<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">	
	<meta http-equiv="Expires" content="0">
	<meta http-equiv="Last-Modified" content="0">
	<meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
	<meta http-equiv="Pragma" content="no-cache">
	<link rel="stylesheet" type="text/css" href="css/sesion usuario/inicio_doctor.css?1.0" media="all">	
	<link rel="stylesheet" type="text/css" href="css/sesion usuario/menu_doc.css?1.0" media="all">	
	<link rel="stylesheet" type="text/css" href="css/sesion usuario/registro_doc.css?1.0" media="all">	

	<title>Veterinarios</title>
</head>

<script type="text/javascript">
	function Perfil(){		
		document.getElementById("contenido").style.display ="block";
		document.getElementById("cita").style.display ="none";
		document.getElementById("mod_mascota").style.display ="none";
		document.getElementById('recetaMedica').style.display ='none';			
	}			
	function Cita(){		
		document.getElementById("cita").style.display ="block";
		document.getElementById("contenido").style.display ="none";
		document.getElementById("mod_mascota").style.display ="none";
		document.getElementById('recetaMedica').style.display ='none';			
	}			
	
	function Mascota_panel(){		
		document.getElementById("mod_mascota").style.display ="block";
		document.getElementById("contenido").style.display ="none";
		document.getElementById("cita").style.display ="none";
		document.getElementById('recetaMedica').style.display ='none';			
	}			
		
	
	function AltaMascota(){		
		document.getElementById("alta").style.display ="block";		
		document.getElementById("modi").style.display ="none";		
	}				
	
	function consultaMedica(){		
		document.getElementById("recetaMedica").style.display ="block";		
	}				
	function Salir(){		
		location.href='index.php'
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
	header("Content-Type: text/html;charset=utf-8");

	if (isset($_GET['id'])){		
		$id=$_GET['id'];
		$usuario_nom=$_GET['usuario_nom'];
		$id_mas_bus="";
		$id_mascota_buscar="";
		$mascota_combo="";
		$doctor="";
		$diagnostico="";
		$tratamiento="";
		$peso="";
		$temperatura="";
		if (isset($_GET['cita_id'])){		
			$id_mas_bus=$_GET['cita_id'];
			$count=$conn->query("select *from citas,mascotas where BINARY citas.id_Mascota= mascotas.id_Mascota and id_Cita = '$id_mas_bus'");							
			$datos = mysqli_fetch_array($count); 								
			if($datos==null){
				echo "<script type='text/javascript'>alert('Cita no encontrada')   				
					location.href='inicio_doctor.php?id=$id&usuario_nom=$usuario_nom'										
				</script>";				
							
			}else{
				$fecha=$datos['fecha'];
				$horario=$datos['horario'];		
				$nombre_mascota=$datos['Nombre'];
				$id_Mascota=$datos['id_Mascota'];
			}			
		}	
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
		$id_mas_bus="";
		$horario="";
		$fecha="";
		$nombre_mascota="";
		$id_Mascota="";
		$id_mascota_buscar="";
		$doctor="";
		$diagnostico="";
		$tratamiento="";
		$peso="";
		$temperatura="";
		$mascota_combo="";
	}	
	
?>	       

<body > 

	<div id="general"> <!--Contiene todo-->
		<header>
			<h1 class="title"><br><br><br>Furry Friends Pets &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br></font></h1>	
			<img src="img/logo.jpg" width= "80" height= "80">
		</header>
		<div id="perfil">
			<center>				
				<img src="img/vete.png" width= "180" height= "180">
				<br><label><b><?php echo $usuario_nom;?></b></label><br>
				<input class="botonC" type="submit" name="inicio" onclick="Salir()" value="Cerrar Sesión">			
			</center>
		</div>				
						
		<div id="menu">						
			<nav>
				<a onclick="Cita()" >Consultar&nbsp;Cita</a>
				<a onclick="Mascota_panel()">Expedientes</a>				
				<a onclick="Perfil()" >Perfil</a>
				<div class="animation start-home"></div>
			</nav>			
		</div>		
		<br><br>
			
		<div id="contenido">
		
			<br><label><b><font style="background-color:#4d345e; color:white;" size=5.5>&nbsp;&nbsp;&nbsp;&nbsp;- Datos Personales -&nbsp;&nbsp;&nbsp;&nbsp;</font></b></label><br><br>
			<?php
				$busca=$conn->query("select * from veterinarios where BINARY id_Doctor = '$id'");	
				$personal = mysqli_fetch_array($busca);
			?>
			<form class="form__reg" action="base_datos.php" method="POST">			
				<input background="red" class="input" name="nombre" type="text" placeholder="&#128101;  Nombre" required  value="<?php echo $personal['Nombre'];?>" >
				<input class="input" type="text" name="apellido_p" placeholder="&#128101;  Apellido Paterno" required value="<?php echo $personal['A_Paterno'];?>">
				<input class="input" type="text" name="apellido_m" placeholder="&#128101;  Apellido Materno" required value="<?php echo $personal['A_Materno'];?>">			
				<br><label><font style="background-color:#4d345e; color:white;" size=5.5>&nbsp;&nbsp;&nbsp;&nbsp;- Direccion -&nbsp;&nbsp;&nbsp;&nbsp;</font></label>
				<textarea class="input" name="direccion"  rows= '8' cols= '50' placeholder="&#127968;  Direccion" required ><?php echo $personal['Direccion'];?></textarea>
				<br><label><font style="background-color:#4d345e; color:white;" size=5.5>&nbsp;&nbsp;&nbsp;&nbsp;- Referencia -&nbsp;&nbsp;&nbsp;&nbsp;</font></label>
				<textarea class="input" name="direccion_r" rows= '8' cols= '50' placeholder="&#127969;  Referencia Direccion" required> <?php echo $personal['Descripcion_Domicilio'];?> </textarea>            
				<input class="input" name="telefono" type="text" placeholder="&#128222;  Telefono" required value="<?php echo $personal['Telefono'];?>">
				<input class="input" name="telefono_c" type="text" placeholder="&#128222;  Telefono Contacto" required value="<?php echo $personal['Telefono_Contacto'];?>">
				<input class="input" name="correo" type="email" placeholder="&#9993;  Correo" required value="<?php echo $personal['correo_electronico'];?>"><br>
				<input class="input" type="text"  name="cedula" placeholder="&#128100;  Cedula" required value="<?php echo $personal['cedula_Profesional'];?>">
				<input class="input"  name="usuario" type="text" placeholder="&#128100;  Usuario" required value="<?php echo $personal['usuario'];?>">
				<input class="input" name="contra" type="password" placeholder="&#128273;  Contraseña" required value="<?php echo $personal['contrasena'];?>">
				<input class="input" name="respuesta" type="text" placeholder="&#128021;  Respuesta secreta" required value="<?php echo $personal['respuesta_secreta'];?>">
				<input type='hidden' name='id_us' id='id_us' value="<?php echo $id;?>">				
				<input type='hidden' name='user' id='user' value="<?php echo $usuario_nom;?>">
				<input type='hidden' name='opcion' id='opcion' value="modificar_Doctores">				
				<div class="btn__form">					
					<input class="btn__submit" type="submit" value="&#128100; Actualizar">		
				</div>
			</form>
		</div>									
		
		<div id="cita">
		
			<br><label style="border-bottom:2px solid  #0074ff  ;"><b>- Cita -</b></label><br><br>
			
			<form  action="inicio_doctor.php" method='GET'>
				<label><b><font style="background-color:#c9f2ff">Codigo de cita:</font></b></label> &nbsp;&nbsp;&nbsp; 								
				<input type="text" name="cita_id" id="cita_id" value="<?php echo $id_mas_bus;?>"/>&nbsp;&nbsp; 								
				<input type='hidden' name='id' id='id' value="<?php echo $id;?>">				
				<input type='hidden' name='usuario_nom' id='usuario_nom' value="<?php echo $usuario_nom;?>">
				<input type='submit' class="botonHis" value='Buscar cita'><br><br>				
			</form>	

			<div id="cita_datos" style="background-color: #7cbfff ">
				<br>
				<label id="masco_cita"><b>&nbsp;Mascota:</b></label> &nbsp;					
				<input type="text" id="masco_cita2" readonly="readonly" value="<?php echo $nombre_mascota;?>"/>&nbsp;&nbsp; 								
				
				<br><br>
				
				<label id="date"><b>&nbsp;Fecha:</b></label> &nbsp;					
				<input type="text" id="date" readonly="readonly" value="<?php echo $fecha;?>"/>&nbsp;&nbsp; 								
				
				<label id="date"><b>&nbsp;&nbsp;&nbsp;Horario:</b></label> &nbsp;								
				<input type="text" id="date" readonly="readonly" value="<?php echo $horario;?>"/>&nbsp;&nbsp; 								
								
				<div class="btn__form">					
					<input type='submit' id="masco_cita" class="boton" onclick="consultaMedica()" value='Ir a Consulta'>					
				</div><br>
			</div>		
		</div>													
		<?php	
			if($id_mas_bus!=""){
				echo "<script>
					document.getElementById('cita').style.display ='block';
					document.getElementById('cita_datos').style.display ='block';														
					</script>";
			}else{
				echo "<script>
					document.getElementById('cita').style.display ='none';
					document.getElementById('cita_datos').style.display ='none';														
					</script>";
			
			}				
		?>
				

		<div id="mod_mascota">							
			<br><label style="border-bottom:2px solid  #0074ff  ;">- Expediente Mascotas -</label><br>
			<form  action="inicio_doctor.php" method='GET'>
				<br><br><label><b>Id mascota:</b></label> &nbsp;&nbsp;&nbsp; 								
				<input type="text" name="id_mascota_buscar" id="id_mascota_buscar" value="<?php echo $id_mascota_buscar;?>"/>&nbsp;&nbsp; 								
				<input type='hidden' name='id' id='id' value="<?php echo $id;?>">				
				<input type='hidden' name='usuario_nom' id='usuario_nom' value="<?php echo $usuario_nom;?>">
				<input type='submit' class="botonMod" value='Buscar cita'><br><br>								
			</form>	
			<div id="expedientes_consultas" style="background-color: #7cbfff ">
				<form action="inicio_doctor.php" method='GET'>
					<br><label id="masco_cita"><b>&nbsp;Visitas:</b></label> &nbsp;													
					<br><br><label id="date"><b>&nbsp;Fecha:</b></label> &nbsp;			
					<select name="mascota_combo" id="mascota_combo" required>
						<option value="seleccione"> - Seleccione cita - </option>
						<?php		
							if($id_mascota_buscar!=""){
						
								echo "<script>
									document.getElementById('mod_mascota').style.display ='block';			
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
									document.getElementById(mod_mascota).style.display ='none';	
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
		<br><br>
		<div id="linea" style="background-color: #9000ba  ">
		   
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
		<br><br><br>
		<?php
			if($mascota_combo!=""){
				echo "<script>					
					document.getElementById('recetaMedica').style.display ='block';			
				</script>";
			}	
		?>		
	</div>
</body>
</html>