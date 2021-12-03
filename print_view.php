<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8"/>   
        <title>Generar PDF</title>
        <style type="text/css">

        </style>

    </head>
    <body>
		<br><br><br>
		<img src="img/WhatsApp Image 2021-01-22 at 00.43.25.jpeg" width= "5%" height= "5%">
        
		<br><br><br>		
        
        <?php if(isset($_POST['fecha'])): ?>
            <h2> Cita:  </h2>
			<h1><?=$_POST['fecha']?></h1>
			
         
		 <?php endif; ?>
            



    </body>
</html>
