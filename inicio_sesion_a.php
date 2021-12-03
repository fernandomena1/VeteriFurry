<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Administrador</title>
	<link rel= "stylesheet" type ="text/css" href="Estilos/estilo.css"/>
    <link rel="stylesheet" href="fonts.css">
	<link href="https://fonts.googleapis.com/css?family=Josefin+Sans|Montez|Pathway+Gothic+One" rel="stylesheet">
	
  </head>
    
  <body style="background-color: white ">
    <div class="contenedor">

      <header>
		<a href="index.php">&nbsp;&nbsp;Salir</a>
        <h1 class="title">Furry Friends Pets&nbsp;&nbsp;&nbsp;&nbsp;</h1>        		
      </header>
      <div class="login">
        <article class="fondo">
          <img src="img/admon.png" alt="User">
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
            
			<input type='hidden' name='opcion' id='opcion' value='inicio_sesion_admin'>
			<input class="boton" type="submit" name="inicio" value="Iniciar Sesión">
          </form>
        </article>
      </div>
    </div>
  </body>
</html>