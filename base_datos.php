<?php	
	echo '<body style="background-color:#16697a">';

	$opcion=$_POST['opcion'];	
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

	if($opcion=="registro"){
		
		//DAR DE ALTA A LOS USUARIOS "REGISTRO"
		$nombre=$_POST['nombre'];
		$Apell_P=$_POST['apellido_p'];
		$Apell_M=$_POST['apellido_m'];
		$direccion=$_POST['direccion'];
		$direccion_r=$_POST['direccion_r'];
		$telefono=$_POST['telefono'];	
		$telefono_c=$_POST['telefono_c'];			
		$correo=$_POST['correo'];	
		$usuario=$_POST['usuario'];
		$contra=$_POST['contra'];		
		$respuesta=$_POST['respuesta'];

		$sql="select count(*) as total from clientes where usuario='$usuario'";		
		
		$count=mysqli_query($conn,$sql);					
		$datos = mysqli_fetch_array( $count); 		
		$total=$datos['total'];

		
		if($total>0){
			echo "<script type='text/javascript'>alert('Usuario Existente')								
					location.href='registro.php?nombre=$nombre&apellido_p=$Apell_P&apellido_m=$Apell_M&direccion=$direccion&direccion_r=$direccion_r&telefono=$telefono&telefono_c=$telefono_c&correo=$correo&usuario=$usuario&contra=$contra&respuesta=$respuesta'
			</script>";		
			
		}else{
		
			$consulta= "Insert into clientes VALUES ('','$nombre', '$Apell_P', '$Apell_M', '$direccion','$direccion_r', '$telefono','$telefono_c','$correo','$respuesta','$usuario','$contra')";
		
			if(mysqli_query($conn,$consulta)){
		
				echo "<script type='text/javascript'>alert('Agregado')
					location.href='inicio_sesion_u.php'
				</script>";			
			}else{
				echo "<script type='text/javascript'>alert('Error')
					location.href='registro.php?nombre=$nombre&apellido_p=$Apell_P&apellido_m=$Apell_M&direccion=$direccion&direccion_r=$direccion_r&telefono=$telefono&telefono_c=$telefono_c&correo=$correo&usuario=$usuario&contra=$contra&respuesta=$respuesta'
				</script>";		
			}		
		}		
	}
	
	/*Inicio de sesion*/
	if($opcion=="inicio_sesion"){
		$user=$_POST['user'];		
		$contra=$_POST['pass'];

		$sql="select count(*) as total, id_Cliente from clientes where BINARY usuario = '$user' and contrasena = '$contra'";
		
		$count=mysqli_query($conn,$sql);					
		$datos = mysqli_fetch_array( $count); 		
		$total=$datos['total'];
		$id_c=$datos['id_Cliente'];		
		
		
		if($total>0){
			header("Location:inicio_user.php?id=$id_c&usuario_nom=$user");			
		}else{
			header("Location:inicio_sesion_u.php?usuario=$user");
		}	
	}
	
	/*Inicio de sesion Admin*/
	if($opcion=="inicio_sesion_admin"){
		echo $user=$_POST['user'];		
		$contra=$_POST['pass'];

		$sql="select count(*) as total, Id_Administrador from administrador where BINARY Usuario = '$user' and Contrasena = '$contra'";
		
		$count=mysqli_query($conn,$sql);					
		$datos = mysqli_fetch_array( $count); 		
		$total=$datos['total'];
		$id_c=$datos['id_Cliente'];		
		
		
		if($total>0){
			header("Location:administrador.php");			
		}else{
			header("Location:inicio_sesion_a.php");
		}	
	}
	
	/*Sesion Usuario*/
	
	/*Alta mascota*/
	if($opcion=="alta_mascota"){
		$mascota=$_POST['mascota'];				
		$id_cliente=$_POST['id_usuario'];							
		
		$consulta= "Insert into mascotas VALUES ('','$mascota','$id_cliente')";		
		if(mysqli_query($conn,$consulta)){					
			echo "<script type='text/javascript'>alert('Registrado')
				location.href='inicio_user.php?id=$id_cliente'
			</script>";			
		}else{
			echo "<script type='text/javascript'>alert('No se pudo Registrar')			
				location.href='inicio_user.php?id=$id_cliente'
			</script>";		
		}		
	}
	
	/*Agendar Cita*/
	if($opcion=="agendarCita"){
		$id=$_POST['id_us'];		
		$fecha=$_POST['date_sel'];		
		$hora=$_POST['horario'];		
		$mascota=$_POST['mascota'];	
		$user=$_POST['user'];		
		
		$consulta= "Insert into citas VALUES ('','$mascota','$fecha','$hora','0')";
				
		if(mysqli_query($conn,$consulta)){					
			echo "<script type='text/javascript'>alert('Cita Guardada')
					location.href='inicio_user.php?id=$id&usuario_nom=$user'
				</script>";							
		}else{
			echo "<script type='text/javascript'>alert('Error')
					location.href='inicio_user.php?id=$id&usuario_nom=$user'
			</script>";		
		}		
	}
	
	if($opcion=="eliminarCita"){
		$id=$_POST['id'];				
		$user=$_POST['usuario_nom'];	
		$id_mascota_bus=$_POST['id_mascota_cita'];
				
		$consulta= "Delete from citas where id_Cita='$id_mascota_bus'";		
		
		if(mysqli_query($conn,$consulta)){														
			echo "<script type='text/javascript'>alert('Cita Eliminada')
					location.href='inicio_user.php?id=$id&usuario_nom=$user'
				</script>";		
		}else{			
			echo "<script type='text/javascript'>alert('Error')
					location.href='inicio_user.php?id=$id&usuario_nom=$user'
				</script>";		
		}		
	}
	
/*########################
	#########################
	#######################*/
	
	/*Registro Doctores*/
		if($opcion
		=="registro_doctor"){
		
		//DAR DE ALTA A LOS USUARIOS "REGISTRO"
		$nombre=$_POST['nombre'];
		$Apell_P=$_POST['apellido_p'];
		$Apell_M=$_POST['apellido_m'];
		$cedula=$_POST['cedula'];
		$direccion=$_POST['direccion'];
		$direccion_r=$_POST['direccion_r'];
		$telefono=$_POST['telefono'];	
		$telefono_c=$_POST['telefono_c'];			
		$correo=$_POST['correo'];	
		$usuario=$_POST['usuario'];
		$contra=$_POST['contra'];		
		$respuesta=$_POST['respuesta'];

		$sql="select count(*) as total from veterinarios where usuario='$usuario'";		
		
		$count=mysqli_query($conn,$sql);					
		$datos = mysqli_fetch_array( $count); 		
		$total=$datos['total'];

		
		if($total>0){
			echo "<script type='text/javascript'>alert('Usuario Existente')								
					location.href='registro.php?nombre=$nombre&apellido_p=$Apell_P&apellido_m=$Apell_M&cedula=$cedula&direccion=$direccion&direccion_r=$direccion_r&telefono=$telefono&telefono_c=$telefono_c&correo=$correo&usuario=$usuario&contra=$contra&respuesta=$respuesta'
			</script>";		
			
		}else{
		
			$consulta= "Insert into veterinarios VALUES ('','$nombre', '$Apell_P', '$Apell_M', '$direccion','$direccion_r', '$telefono','$telefono_c','$cedula','$correo','$respuesta','$usuario','$contra')";
		
			if(mysqli_query($conn,$consulta)){
		
			echo "<script type='text/javascript'>alert('Agregado')
					location.href='inicio_sesion_d.php'
				</script>";			
			}else{
				echo "<script type='text/javascript'>alert('Error')
					location.href='registro_doctor.php'
				</script>";		
			}		
		}		
	}
	
	/*Inicio de sesion doctor*/
	if($opcion=="inicio_sesion_doctor"){
		$user=$_POST['user'];		
		$contra=$_POST['pass'];

		$sql="select count(*) as total, id_Doctor,usuario from veterinarios where BINARY usuario = '$user' and contrasena = '$contra'";
		
		$count=mysqli_query($conn,$sql);					
		$datos = mysqli_fetch_array( $count); 		
		echo $total=$datos['total'];
		$id_c=$datos['id_Doctor'];		
		$usuario_pag=$datos['usuario'];
		
		if($total>0){
			header("Location:inicio_doctor.php?id=$id_c&usuario_nom=$usuario_pag");
		}else{
			header("Location:inicio_sesion_d.php?usuario=$user");
		}	
	}

	/*Consultar Agenda*/
	if($opcion=="consultarCita"){
		$id=$_POST['id_us'];		
		$cita_id=$_POST['cita_id'];				

		$sql="select *from citas where BINARY id_Cita='$cita_id'";
		
		$count=mysqli_query($conn,$sql);					
		$datos = mysqli_fetch_array( $count); 		
		$total=$datos['total'];
		$id_c=$datos['id_Cliente'];		
		
		if($total>0){
			header("Location:inicio_user.php?id=$id_c");
		}else{
			header("Location:inicio_sesion_u.php?usuario=$user");
		}	
	}		
	
	/*Registrar Receta*/
	if($opcion=="alta_receta"){
		$id_cita=$_POST['id_Cita'];		
		$id_doctor=$_POST['id_doctor'];		
		$usuario_nom=$_POST['usuario_nom'];		
		$temperatura=$_POST['temperatura'];		
		$peso=$_POST['peso'];		
		$diagnostico=$_POST['diagnostico'];		
		$tratamiento=$_POST['tratamiento'];		
		$id_mascota=$_POST['id_mascota'];		
		
		$consulta= "Insert into recetas VALUES ('','$id_mascota', '$id_cita', '$diagnostico', '$peso','$temperatura', '$tratamiento','$id_doctor')";
		echo $consulta;
		if(mysqli_query($conn,$consulta)){		
			echo "<script type='text/javascript'>alert('Receta guardada')   
				location.href='inicio_doctor.php?id=$id_doctor&usuario_nom=$usuario_nom'
			 </script>";			
		}else{
			echo "<script type='text/javascript'>alert('Receta guardada')   
				location.href='inicio_doctor.php?id=$id_doctor&usuario_nom=$usuario_nom'
			 </script>";			
		}	
	}
	
	//Modifica Usuarios
	
	if($opcion=="modificar_Usuarios"){
		
		$user=$_POST['user'];		
		$id=$_POST['id_us'];
		
		//DAR DE ALTA A LOS USUARIOS "REGISTRO"
		$nombre=$_POST['nombre'];
		$Apell_P=$_POST['apellido_p'];
		$Apell_M=$_POST['apellido_m'];
		$direccion=$_POST['direccion'];
		$direccion_r=$_POST['direccion_r'];
		$telefono=$_POST['telefono'];	
		$telefono_c=$_POST['telefono_c'];			
		$correo=$_POST['correo'];	
		$usuario=$_POST['usuario'];
		$contra=$_POST['contra'];		
		$respuesta=$_POST['respuesta'];

				
		$consulta= "Update clientes SET Nombre='$nombre', A_Paterno='$Apell_P',  A_Materno='$Apell_M', Direccion='$direccion',
											Referencia_domicilio='$direccion_r', Telefono='$telefono', Telefono_Contacto='$telefono_c',
											correo_electronico='$correo', respuesta_secreta='$respuesta',
											usuario='$usuario', contrasena='$contra' where id_Cliente= '$id'";
											
		if(mysqli_query($conn,$consulta)){
				echo "<script type='text/javascript'>alert('Agregado')
				location.href='inicio_user.php?id=$id&usuario_nom=$user'
				</script>";			
		}else{
			echo "<script type='text/javascript'>alert('Error')
				location.href='inicio_user.php?id=$id&usuario_nom=$user'
			</script>";		
		}		
				
	}
	
	//Modifica Doctores
	
	if($opcion=="modificar_Doctores"){
		
		$user=$_POST['user'];		
		$id=$_POST['id_us'];
		
		//DAR DE ALTA A LOS USUARIOS "REGISTRO"
		echo $nombre=$_POST['nombre'];
		$Apell_P=$_POST['apellido_p'];
		$Apell_M=$_POST['apellido_m'];
		$direccion=$_POST['direccion'];
		$direccion_r=$_POST['direccion_r'];
		$telefono=$_POST['telefono'];	
		$telefono_c=$_POST['telefono_c'];			
		$correo=$_POST['correo'];	
		$usuario=$_POST['usuario'];
		$contra=$_POST['contra'];		
		$respuesta=$_POST['respuesta'];				
		$cedula=$_POST['cedula'];

				
		$consulta= "Update veterinarios SET Nombre='$nombre', A_Paterno='$Apell_P',  A_Materno='$Apell_M', Direccion='$direccion',
											Descripcion_Domicilio='$direccion_r', Telefono='$telefono', Telefono_Contacto='$telefono_c',
											cedula_Profesional='$cedula' ,correo_electronico='$correo', respuesta_secreta='$respuesta',
											usuario='$usuario', contrasena='$contra' where id_Doctor= '$id'";
											
		if(mysqli_query($conn,$consulta)){
				echo "<script type='text/javascript'>alert('Actualizado')
				location.href='inicio_doctor.php?id=$id&usuario_nom=$user'
				</script>";			
		}else{
			echo "<script type='text/javascript'>alert('Error')
				location.href='inicio_doctor.php?id=$id&usuario_nom=$user'
			</script>";		
		}		
				
	}
	
	
	
	
	
	/*Registrar Producto*/
	if($opcion=="alta_producto"){
		$Nombre=$_POST['nombre'];		
		$marca=$_POST['marca'];		
		$peso=$_POST['peso'];		
		$precios=$_POST['precio'];		
		$existencia=$_POST['existencia'];		
		
		$consulta= "Insert into productos VALUES ('','$Nombre', '$marca', '$peso', '$precios', '$existencia')";		
		if(mysqli_query($conn,$consulta)){				
			echo "<script type='text/javascript'>alert('Receta guardada')   
				location.href='administrador.php'
			 </script>";			
		}else{			
			echo "<script type='text/javascript'>alert('Receta guardada')   
				location.href='administrador.php'
			 </script>";			
		}	
	}
	
	/*Registrar Producto*/
	if($opcion=="modificar_producto"){
		$id_producto=$_POST['id_producto'];
		$Nombre=$_POST['nombre'];		
		$marca=$_POST['marca'];		
		$peso=$_POST['peso'];		
		$precios=$_POST['precio'];		
		$existencia=$_POST['existencia'];		
		
		$consulta= "Update productos SET Nombre='$Nombre', Marca='$marca', Peso_Tam='$peso', Precio='$precios', Existencia='$existencia' 
					where id_Producto='$id_producto'";		
		if(mysqli_query($conn,$consulta)){				
			echo "<script type='text/javascript'>alert('Producto actualizado')   
				location.href='administrador.php'
			 </script>";			
		}else{
			echo "<script type='text/javascript'>alert('Producto no actualizado')   
				location.href='administrador.php'
			 </script>";			
		}			
	}
	
	/*Alta POST*/
	if($opcion=="alta_post"){
		$titulo=$_POST['titulo'];		
		$post=$_POST['post'];		
		$imagen=$_POST['imagen'];		
		
		$consulta= "Insert into post VALUES ('','$titulo', '$post', '$imagen')";		
		if(mysqli_query($conn,$consulta)){				
			echo "<script type='text/javascript'>alert('Post guardado')   
				location.href='administrador.php'
			 </script>";			
		}else{			
			echo "<script type='text/javascript'>alert('Post no guardado')   
				location.href='administrador.php'
			 </script>";			
		}	
	}
	
	/*Modificar POST*/
	if($opcion=="modificar_post"){
		$seleccion=$_POST['cambio'];
		$id_post=$_POST['id_post'];		
		$titulo=$_POST['titulo'];		
		$post=$_POST['post'];		
		$imagen=$_POST['imagen'];		
			
				
		if($seleccion=="Modificar"){
			$consulta= "Update post SET Titulo='$titulo', Post='$post', imagen_link='$imagen' 
						where id_Post='$id_post'";		
			if(mysqli_query($conn,$consulta)){				
				echo "<script type='text/javascript'>alert('Post Guardado')   
					location.href='administrador.php'
				</script>";			
			}else{			
				echo "<script type='text/javascript'>alert('Post No Guardado')   
					location.href='administrador.php'
				</script>";			
			}
		}else{
			$consulta= "Delete from post where id_Post='$id_post'";		
			if(mysqli_query($conn,$consulta)){				
				echo "<script type='text/javascript'>alert('Post Eliminado')   
					location.href='administrador.php'
				</script>";			
			}else{			
				echo "<script type='text/javascript'>alert('Post no Eliminado')   
					location.href='administrador.php'
				</script>";			
			}
		}
	}
	
	
	if($opcion=="modificar_Usuarios_Admin"){
		
		//DAR DE ALTA A LOS USUARIOS "REGISTRO"
		$nombre=$_POST['nombre'];
		$Apell_P=$_POST['apellido_p'];
		$Apell_M=$_POST['apellido_m'];
		$direccion=$_POST['direccion'];
		$direccion_r=$_POST['direccion_r'];
		$telefono=$_POST['telefono'];	
		$telefono_c=$_POST['telefono_c'];			
		$correo=$_POST['correo'];	
		$usuario=$_POST['usuario'];
		$contra=$_POST['contra'];		
		$respuesta=$_POST['respuesta'];

				
		$consulta= "Update clientes SET Nombre='$nombre', A_Paterno='$Apell_P',  A_Materno='$Apell_M', Direccion='$direccion',
											Referencia_domicilio='$direccion_r', Telefono='$telefono', Telefono_Contacto='$telefono_c',
											correo_electronico='$correo', respuesta_secreta='$respuesta',
											usuario='$usuario', contrasena='$contra' where id_Cliente= '$id'";
											
		if(mysqli_query($conn,$consulta)){
				echo "<script type='text/javascript'>alert('Agregado')
				location.href='administrador.php'
				</script>";			
		}else{
			echo "<script type='text/javascript'>alert('Error')
				location.href='administrador.php'
			</script>";		
		}		
				
	}
	
	if($opcion=="modificar_Doctor_Admin"){
		
		//DAR DE ALTA A LOS USUARIOS "REGISTRO"
		$nombre=$_POST['nombre'];
		$Apell_P=$_POST['apellido_p'];
		$Apell_M=$_POST['apellido_m'];
		$direccion=$_POST['direccion'];
		$direccion_r=$_POST['direccion_r'];
		$telefono=$_POST['telefono'];	
		$telefono_c=$_POST['telefono_c'];			
		$correo=$_POST['correo'];	
		$usuario=$_POST['usuario'];
		$contra=$_POST['contra'];		
		$respuesta=$_POST['respuesta'];
		$cedula=$_POST['cedula'];

				
		$consulta= "Update veterinarios SET Nombre='$nombre', A_Paterno='$Apell_P',  A_Materno='$Apell_M', Direccion='$direccion',
											Descripcion_Domicilio='$direccion_r', Telefono='$telefono', Telefono_Contacto='$telefono_c',
											cedula_Profesional='$cedula' ,correo_electronico='$correo', respuesta_secreta='$respuesta',
											usuario='$usuario', contrasena='$contra' where id_Doctor= '$id'";									
		if(mysqli_query($conn,$consulta)){
				echo "<script type='text/javascript'>alert('Agregado')
				location.href='administrador.php'
				</script>";			
		}else{
			echo "<script type='text/javascript'>alert('Error')
				location.href='administrador.php'
			</script>";		
		}		
				
	}
?>