<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Usuario</title>
	<link rel= "stylesheet" type ="text/css" href="Estilos/estilos1.css"/>
    <link rel="stylesheet" href="fonts.css">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Montez|Pathway+Gothic+One" rel="stylesheet">
	
  </head>
    
  <body style="background-color: #92ba7a ">
    <div class="contenedor">

      <header>
        <h1 class="title">Furry Friends Pets</h1>
        <a href="registro.php">Registrate</a>
      </header>
      <div class="login">
        <article class="fondo">
          <img src="img/huella.png" alt="User">
          <h3>Inicio de Sesión</h3>
          <form class="" action="base_datos.php" method="post">
			<?php			
				if (isset($_GET['usuario'])){		
					$usuario=$_GET['usuario'];
					echo "<script type='text/javascript'>alert('Usuario o contraseña no coinciden')</script>";		
				}else{		
					$usuario="";		
				}
			?>	       
            <span class="icon-user"></span>
			<input class="inp" type="text" placeholder="Usuario" name="user" value="<?php echo $usuario;?>" required><br>
            <span class="icon-key"></span>
			<input class="inp" type="password" placeholder="Contraseña" name="pass" required><br>
            			
			<input type='hidden' name='opcion' id='opcion' value='inicio_sesion'>
			<input class="boton" type="submit" name="inicio" value="Iniciar Sesión">
          </form>
        </article>
      </div>
    </div>
  </body>
</html>