<?php
    include("conexion.php");

    $sqlPersonal = "SELECT * FROM personal";
    $resultadoPersonal = $conexion->query($sqlPersonal);
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Reportes</title>
  </head>
  <body>
    <div class="container">
        <h1 align="center">LISTAR ENTRADA Y SALIDA DEL PERSONAL</h1>
        <br>
        <form action="#" method="POST" class="form-inline">
            <label for="" class="my-1 mr-2">Personal: </label>
            <select name="personal" class="custom-select my-1 mr-sm-2" require>
                <option value="">Seleccionar</option>
                <?php foreach ($resultadoPersonal as $carreraPersonal): ?>
                    <option value="<?php echo $carreraPersonal['matricula_pers']; ?>"><?php echo $carreraPersonal['nombre_pers']; ?></option>
                <?php endforeach ?>
            </select>
            <button type="submit" name="mostrar" class="btn btn-success my-1">MOSTRAR</button>
        </form>
        <?php
            if (isset($_POST['mostrar'])) {

                $personalSeleccionado = $_POST['personal'];
                $sqlPersonal = "SELECT nombre_pers, apellido_pers, in_pers, out_pers, id_salon FROM personal NATURAL JOIN inout_personal WHERE matricula_pers = $personalSeleccionado";
                
                $resultadoPersonal = $conexion->query($sqlPersonal);

           ?> 

           <h4 align="center">***** Entradas y Salidas del Alumno *****</h4>
           <center> 
           <table class="table table-hover">
            <thead>
                <tr>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>ENTRADA</th>
                    <th>SALIDA</th>
                    <th>SALON</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($registro = $resultadoPersonal->fetch_array(MYSQLI_BOTH)) {
                        echo "<tr>
                                <td>".$registro['nombre_pers']."</td>
                                <td>".$registro['apellido_pers']."</td>
                                <td>".$registro['in_pers']."</td>
                                <td>".$registro['out_pers']."</td>
                                <td>".$registro['id_salon']."</td>
                            </tr>";
                    }
                    $conexion->close();
                ?>
            </tbody>
           </table>
           <a class="link" href="entradas_salidas_personalPDF.php?personal= <?php echo $personalSeleccionado;?>" target="_blank"><i class="fas fa-print"></i>Imprimir</a>
           <input type="button" value="MENU" class="btn btn-outline-info" onclick="location.href='menu_master.php' "name="menu"/>
           </center>  
            <?php
            }else { ?>
                <center> 
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>NOMBRE</th>
                            <th>APELLIDO</th>
                            <th>ENTRADA</th>
                            <th>SALIDA</th>
                            <th>SALON</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="6">
                                <div class="alert alert-danger" role="alert">No hay datos</div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </center>  


            <?php    
            }
        ?>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>