<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Actualizar Alumnos</title>

    <style>
      body{
        background-attachment: fixed;
     	  background-color: #FFFFFF;
        background-image: url("fondo_alumnos.jpg");
      }
    </style>

    <style>
      form label{
        display: inline-block;
        width: 450px;
      }
      form input{
        display: inline-block;
        width: 250px;
      }
    </style>    


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</head>
<body>
    <center><h3>ALTA DE ALUMNOS</h3></center>
    
    <form method="POST" action="otras_opciones_alumnos.php" class="form-inline">

    <center>
    <br><br>
        <div class="form-group">
            <label for="matricula_alum">Ingresa la matricula:</label>
            <input type="text" placeholder="ingresar maximo 6 caracteres example: 123456" id="matricula_alum" name="matricula_alum" class="form-control" size="60px">
        </div>
        <br>
        <div class="form-group">
            <label for="nombre_alum">Ingresa el nombre del alumno:</label>
            <input type="text" placeholder="ingresa el nombre del alumno" name="nombre_alum" id="nombre_alum" class="form-control" size="60px">
        </div>
        <br>
        <div class="form-group">
            <label for="apellido_alum">Ingresa el apellido:</label>
            <input type="text" placeholder="ingresa el apellido" name="apellido_alum" id="apellido_alum" class="form-control" size="60px">
        </div>
        <br>
        <div class="form-group">
            <label for="tipo_alum">Tipo:</label>
            <input type="text" placeholder="regular, excelencia, etc...." name="tipo_alum" id="tipo_alum" class="form-control" size="60px">
        </div>
        <br>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
            <label class="input-group-text" for="inputGroupSelect01">Seleccione Carrera</label>
          </div>
          <select class="custom-select" name="id_carrera">
            <option selected>Eligir Carrera...</option>
              <?php
                $mysqli = new mysqli("localhost","acceso_sistema","75009809","acceso");

                $query = $mysqli -> query ("SELECT * FROM carrera");
                while ($valores = mysqli_fetch_array($query)) {
                  echo '<option value="'.$valores[id_carrera].'">'.$valores[nom_carrera].'</option>';
                }
              ?>
            </select>
            <input type="submit" value="ACTUALIZAR" class="btn btn-warning" name="btn_actualizar">
          </div>
          <br><br><br><br><br><br>
        </center>
    </form>
    <center>
    <input type="button" value="REGRESAR AL MENU PRINCIPAL" class="btn btn-outline-success" onclick="location.href='../menu_master.php' "name="btn3"/>
    <input type="button" value="REGRESAR" class="btn btn-outline-info" onclick="location.href='registro_alumnos.php' "name="btn3"/>
    </center>

    <?php

        if (isset($_POST['Enviar'])) {
            
            include("../conexion.php");

            $matricula_alum = $_POST['matricula_alum'];
            $nombre_alum    = $_POST['nombre_alum'];
            $apellido_alum  = $_POST['apellido_alum'];
            $tipo_alum      = $_POST['tipo_alum'];
            $id_carrera     = $_POST['id_carrera'];

            $nombre_alum    = strtoupper($nombre_alum);
            $apellido_alum  = strtoupper($apellido_alum);
            $tipo_alum      = strtoupper($tipo_alum);

            $conexion->query("INSERT INTO $alumnos(matricula_alum,nombre_alum,apellido_alum,tipo_alum,id_carrera) VALUES ('$matricula_alum','$nombre_alum','$apellido_alum','$tipo_alum','$id_carrera')");
            
            echo "Datos ingresados correctamente";

            include("cerrar_conexion.php");
        }

        if (isset($_POST['btn_actualizar'])) {

          include("../conexion.php");
      
          $matricula_alum = $_POST['matricula_alum'];
          $nombre_alum    = $_POST['nombre_alum'];
          $apellido_alum  = $_POST['apellido_alum'];
          $tipo_alum      = $_POST['tipo_alum'];
          $id_carrera     = $_POST['id_carrera'];

          $nombre_alum    = strtoupper($nombre_alum);
          $apellido_alum  = strtoupper($apellido_alum);
          $tipo_alum      = strtoupper($tipo_alum);
      
          if($matricula_alum == "" || $nombre_alum == "" || $apellido_alum == "" || $tipo_alum == "" || $id_carrera == ""){
      
              echo "LOS CAMPOS SON OBLIGATORIOS";
      
          }else{
      
              $existe=0;
      
              $resultados = mysqli_query($conexion,"SELECT * FROM $alumnos WHERE matricula_alum = '$matricula_alum'");
            while($consulta = mysqli_fetch_array($resultados)){
      
              $existe++;
            }  
              if($existe==0){
      
                echo "EL CLIENTE NO EXISTE";
      
              }else{
      
              //ACTUALIZAR 
              $_UPDATE_SQL="UPDATE $alumnos Set matricula_alum = '$matricula_alum', nombre_alum = '$nombre_alum', apellido_alum = '$apellido_alum', tipo_alum = '$tipo_alum', id_carrera = '$id_carrera' WHERE matricula_alum ='$matricula_alum'"; 
      
              mysqli_query($conexion,$_UPDATE_SQL); 
      
              echo "ACTUALIZACION CON EXITO";
                
              }
          } 
              include("cerrar_conexion.php");   
          }

    ?>

</body>
</html>