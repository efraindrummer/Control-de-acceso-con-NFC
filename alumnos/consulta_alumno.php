<?php
	include("conectar.php");
	$objeto = new Conexion();
	$conexion = $objeto->Conectar();

	$consulta = "SELECT * FROM alumnos";
	$resultado = $conexion->prepare($consulta);
	$resultado->execute();
	$alumno=$resultado->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.css"/>  
    <title>CONSULTAS ALUMNOS</title>
    <style>
        table.dataTable thead {
            background: linear-gradient(to right, #0F40E8, #0F40E8);
            color:white;
        }
    </style>  
      
  </head>
  <body>
    <h1 class="text-center">CONSULTAR ALUMNOS</h1>
    <h3 class="text-center">BUSCAR ALUMNO</h3>
    
    <div class="container">
       <div class="row">
           <div class="col-lg-12">
            <table id="tablaUsuarios" class="table-striped table-bordered" style="width:100%">
                <thead class="text-center">
                    <th>MATRICULA</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>TIPO</th>
                    <th>ID ACRRERA</th>
                </thead>
                <tbody>
                    <?php
                        foreach($alumno as $alumnos){
                    ?>
                    <tr>
                        <td><?php echo $alumnos['matricula_alum']?></td>
                        <td><?php echo $alumnos['nombre_alum']?></td>
                        <td><?php echo $alumnos['apellido_alum']?></td>
                        <td><?php echo $alumnos['tipo_alum']?></td>
                        <td><?php echo $alumnos['id_carrera']?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
           </div>
       </div> 
	</div>
	<center>
		<br>
        <br>
        <br>
        <br>
		<input type="button" value="REGRESAR" class="btn btn-link" onclick="location.href='registro_alumnos.php' "name="atras"/>
        <a class="link" href="ReportePDFalumno.php" target="_blank"><i class="fas fa-print"></i>Imprimir</a>
        <input type="button" value="REGRESAR AL MENU PRINCIPAL" class="btn btn-outline-info" onclick="location.href='../menu_master.php' "name="btn3"/>
    </center>

    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/datatables.min.js"></script>  
    
    <script>
      $(document).ready(function(){
         $('#tablaUsuarios').DataTable(); 
      });
    </script> 
      
  </body>
</html>