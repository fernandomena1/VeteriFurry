<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />	
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="./css/reset.css">
	<link href="https://fonts.googleapis.com/css?family=Lato:400,900" rel="stylesheet">
	<link rel="stylesheet" href="./css/main.css">
	<title>Registro Usuarios</title>
</head>

<?php			

	if (isset($_GET['nombre'])){		
		$nombre=$_GET['nombre'];
		$apellido_p=$_GET['apellido_p'];
		$apellido_m=$_GET['apellido_m'];
		$direccion=$_GET['direccion'];
		$direccion_r=$_GET['direccion_r'];
		$telefono=$_GET['telefono'];	
		$telefono_c=$_GET['telefono_c'];			
		$correo=$_GET['correo'];	
		$usuario=$_GET['usuario'];
		$contra=$_GET['contra'];		
		$respuesta=$_GET['respuesta'];
	}else{		
		$nombre="";
		$apellido_p="";
		$apellido_m="";		
		$direccion="";		
		$direccion_r="";		
		$telefono="";		
		$telefono_c="";		
		$correo="";		
		$usuario="";		
		$contra="";		
		$respuesta="";		
	}
?>	       
<body background="img/blanco.jpg">

	<div class="container">
	
      <header>	  	  
        <font color="#ffffff "> <h1 class="title">Furry Friends Pets</h1></font>        	
      </header>

		<div class="form__top">
			<h2>Registro <span>Usuarios</span></h2>
		</div>		
		
		<form class="form__reg" action='base_datos.php' method='POST'>
			<input class="input" name="nombre" type="text" autocomplete="off" placeholder="&#128101;  Nombre"  required autofocus value="<?php echo $nombre;?>"/>
			<input class="input" name="apellido_p" type="text" placeholder="&#128101;  Apellido Paterno" value="<?php echo $apellido_p;?>" required>
			<input class="input" name="apellido_m" type="text" placeholder="&#128101;  Apellido Materno" value="<?php echo $apellido_m;?>" required>			
			<br><label><font size=2>&#127968;  Direccion</font></label>
			<textarea class="input" name="direccion" rows= '8' cols= '50' placeholder="&#127968;  Direccion" required> <?php echo $direccion;?> </textarea>
			<label><font size=2>&#127968 Referencia Domicilio</font></label>
			<textarea class="input" name="direccion_r" rows= '8' cols= '50' placeholder="&#127969;  Referencia Direccion" required> <?php echo $direccion_r;?> </textarea>            
            <input class="input" name="telefono" type="number" maxlength="12" placeholder="&#128222;  Telefono" value="<?php echo $telefono;?>" required>
			<input class="input" name="telefono_c" type="number" maxlength="12" placeholder="&#128222;  Telefono Contacto" value="<?php echo $telefono_c;?>" required>
			<input class="input" name="correo" type="email" placeholder="&#9993;  Correo" value="<?php echo $correo;?>" required>
            <input class="input" name="usuario" type="text" placeholder="&#128100;  Usuario" value="<?php echo $usuario;?>" required>
			<input class="input" name="contra" type="password" placeholder="&#128273;  Contraseña" value="<?php echo $contra;?>" required>
			<input class="input" name="respuesta" type="text" placeholder="&#128021;  Respuesta secreta" value="<?php echo $respuesta;?>" required>
            <input type='hidden' name='opcion' id='opcion' value='registro'>
			<div class="btn__form">
            	<input class="btn__submit" type="submit" value="REGISTRAR">
            	<input class="btn__reset" type="reset" value="LIMPIAR">	
            </div>
		</form>
	</div>	
</body>
</html>