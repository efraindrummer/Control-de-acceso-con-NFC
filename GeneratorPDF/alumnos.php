<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <title>PDF Alumnos</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="assets/css/sticky-footer-navbar.css" rel="stylesheet">
  </head>

  <body>

    <header>
      <!-- Fixed navbar -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
        <a class="navbar-brand" href="#">PDF</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
              <a class="nav-link" href="alumnos.php">Inicio <span class="sr-only">(current)</span></a>
            </li>
     
	
          </ul>
          <form class="form-inline mt-2 mt-md-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Buscar" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Busqueda</button>
          </form>
        </div>
      </nav>
    </header>

<!-- Inicio content -->  
 <div class="container">
 <h1 class="mt-5">PDF</h1>
 <hr>
<div class="btn btn-primary"><a href="GenerarPDF.php" style="color:#FFF; text-decoration:none; " target="_blank">Visualizar en PDF</a></div>
<div class="btn btn-primary"><a href="DescargarPDF.php" style="color:#FFF; text-decoration:none; " target="_blank">Descargar PDF</a></div>
  <hr>
<div class="row">

  <div class="col">

  
<?php	

	include_once("db.php");
	echo '<table class="table"';	
	echo  '<thead>';
	echo  '<tr>';
	echo  '<th scope="col">MATRICULA</th>';
	echo  '<th scope="col">NOMBRE</th>';
	echo  '<th scope="col">APELLIDO</th>';
	echo  '<th scope="col">TIPO</th>';
	echo  '<th scope="col">ID CARRERA</th>';
	echo  '</tr>';
	echo  '</thead>';
	echo  '<tbody>';
	
	$resultado_alumnos = "SELECT matricula_alum, nombre_alum, apellido_alum, tipo_alum, id_carrera FROM alumnos";
	$resultado_alumnos = mysqli_query($conectar, $resultado_alumnos);
	while($alumnos = mysqli_fetch_assoc($resultado_alumnos)){
		echo  '<tr><td>'.$alumnos['matricula_alum'] . "</td>";
		echo  '<td>'.$alumnos['nombre_alum'] . "</td>";
		echo  '<td>'.$alumnos['apellido_alum'] . "</td>";
		echo  '<td>'.$alumnos['tipo_alum'] . "</td>";
		echo  '<td>'.$alumnos['id_carrera'] . "</td>";	
	}
	
	echo  '</tbody>';
	echo  '</table>';
?>

</div>
</div><!-- Fin row -->
</div><!-- Fin container -->

<!-- Inicio Footer -->
    <footer class="footer">
      <div class="container">
        <span class="text-muted"><p>Echo por <a href="https://efraindrummerwebsite.000webhostapp.com" target="_blank">Efrain May</a></p></span>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="assets/js/vendor/popper.min.js"></script>
    <script src="dist/js/bootstrap.min.js"></script>
  </body>
</html>