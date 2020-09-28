<?php	

	include_once("db.php");
	$mihtml = '<table border=1';	
	$mihtml .= '<thead>';
	$mihtml .= '<tr>';
	$mihtml .= '<th>MATRICULA</th>';
	$mihtml .= '<th>NOMBRE</th>';
	$mihtml .= '<th>APELLIDO</th>';
	$mihtml .= '<th>TIPO</th>';
	$mihtml .= '<th>ID CARRERA</th>';
	$mihtml .= '</tr>';
	$mihtml .= '</thead>';
	$mihtml .= '<tbody>';
	
	$resultado_alumnos = "SELECT matricula_alum, nombre_alum, apellido_alum, tipo_alum, id_carrera FROM alumnos";
	$resultado_alumnos = mysqli_query($conectar, $resultado_alumnos);
	while($alumnos = mysqli_fetch_assoc($resultado_alumnos)){
		$mihtml .= '<tr><td>'.$alumnos['matricula_alum'] . "</td>";
		$mihtml .= '<td>'.$alumnos['nombre_alum'] . "</td>";
		$mihtml .= '<td>'.$alumnos['apellido_alum'] . "</td>";
		$mihtml .= '<td>'.$alumnos['tipo_alum'] . "</td>";
		$mihtml .= '<td>'.$alumnos['id_carrera'] . "</td>";
	}
	
	$mihtml .= '</tbody>';
	$mihtml .= '</table';

	
	//referencia
	use Dompdf\Dompdf;

	// incluye autoloader
	require_once("dompdf/autoload.inc.php");

	//Creando instancia para generar PDF
	$dompdf = new DOMPDF();
	
	// Cargar el HTML
	$dompdf->load_html('<h1 style="text-align: center;">LISTAR ALUMNOS</h1>'. $mihtml .'');

	//Renderizar o html
	$dompdf->render();

	//Exibibir nombre de archivo
	$dompdf->stream(
		"Lista_Alumnos", 
		array(
			"Attachment" => false //Para realizar la descarga
		)
	);
?>