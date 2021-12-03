<?php
require __DIR__.'/vendor/autoload.php';
use Spipu\Html2Pdf\Html2Pdf;

if (isset($_POST['id'])){
	echo "ente";
	//Aqui recogemos el contenido del otro fichero

	ob_start();
	require_once 'print_view.php';
	$html = ob_get_clean();


	//Tipos de hojas
	$Html2Pdf = new Html2Pdf('P','A4','es','true','UTF-8');
	//Escribir contenido en el PDF 
	$Html2Pdf ->writeHTML($html);
	//Generador de PDF
	$Html2Pdf ->output ('pdf_generated.pdf'); 
}
?>

<form action= "" method="POST">
<input type="text" placeholder="Titulo" name= "titulo" />
<input type="submit" value="Crear PDF" name= "crear" />
</form>