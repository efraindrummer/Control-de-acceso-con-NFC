<?php
	include("conectar.php");
	$objeto = new Conexion();
	$conexion = $objeto->Conectar();

	$consulta = "SELECT * FROM personal";
	$resultado = $conexion->prepare($consulta);
	$resultado->execute();
	$persona=$resultado->fetchAll(PDO::FETCH_ASSOC);
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
    <h1 class="text-center">CONSULTAR SALONES</h1>
    <h3 class="text-center">BUSCAR SALON</h3>
    
    <div class="container">
       <div class="row">
           <div class="col-lg-12">
            <table id="tablaUsuarios" class="table-striped table-bordered" style="width:100%">
                <thead class="text-center">
                    <th>MATRICULA</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>ID CARGO</th>
                </thead>
                <tbody>
                    <?php
                        foreach($persona as $personal){
                    ?>
                    <tr>
                        <td><?php echo $personal['matricula_pers']?></td>
                        <td><?php echo $personal['nombre_pers']?></td>
                        <td><?php echo $personal['apellido_pers']?></td>
                        <td><?php echo $personal['id_cargo']?></td>
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
		<input type="button" value="REGRESAR" class="btn btn-link" onclick="location.href='registro_personal.php' "name="atras"/>
        <a class="link" href="ReportePDFpersonal.php" target="_blank"><i class="fas fa-print"></i>Imprimir</a>
        <input type="button" value="REGRESAR AL MENU PRINCIPAL" class="btn btn-outline-success" onclick="location.href='../menu_master.php' "name="btn3"/>
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