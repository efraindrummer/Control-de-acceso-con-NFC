<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>Alta Personal</title>

    <style>
    body {
        
    background: #000428;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #004e92, #000428);  
    background: linear-gradient(to right, #004e92, #000428); 

    }
    </style>

    <style>
    form label {
        display: inline-block;
        width: 450px;
    }

    form input {
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
    <center>
        <h3>ALTA DE PERSONAL</h3>
    </center>

    <form method="POST" action="registro_personal.php" class="form-inline">

        <center>
            <br><br>
            <div class="form-group">
                <label for="matricula_pers">Ingresa la matricula:</label>
                <input type="text" placeholder="example: 123456" id="matricula_pers" name="matricula_pers" class="form-control" size="60px">
            </div>
            <br>
            <div class="form-group">
                <label for="nombre_pers">Ingresa el nombre del personal:</label>
                <input type="text" placeholder="ingresa el nombre" name="nombre_pers" id="nombre_pers" class="form-control" size="60px">
            </div>
            <br>
            <div class="form-group">
                <label for="apellido_pers">Ingresa el apellido:</label>
                <input type="text" placeholder="ingresa el apellido" name="apellido_pers" id="apellido_pers" class="form-control" size="60px">
            </div>
            <br>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Seleccione el Cargo</label>
                        </div>
                            <select class="custom-select" name="id_cargo">
                                <option selected>Eligir Cargo...</option>
                                <?php
                                    $mysqli = new mysqli("localhost","acceso_sistema","75009809","acceso");

                                    $query = $mysqli -> query ("SELECT * FROM cargo");

                                    while ($valores = mysqli_fetch_array($query)) {
                                        echo '<option value="'.$valores[id_cargo].'">'.$valores[nom_cargo].'</option>';
                                    }
                                ?>
                            </select>
                        <input type="submit" value="ENVIAR DATOS" class="btn btn-success" name="Enviar">
                    </div>
            <br><br><br><br><br><br>
        </center>
    </form>
    <center>
        <input type="button" value="REGRESAR AL MENU PRINCIPAL" class="btn btn-outline-success" onclick="location.href='../menu_master.php'" name="comeback"/>
        <input type="submit" value="CONSULTA GENERAL" class="btn btn-outline-info" onclick="location.href='consulta_personal.php'" name="consult"/>
    </center>

    <?php

        if (isset($_POST['Enviar'])) {
            
            include("../conexion.php");

            $matricula_pers = $_POST['matricula_pers'];
            $nombre_pers    = $_POST['nombre_pers'];
            $apellido_pers  = $_POST['apellido_pers'];
            $id_cargo       = $_POST['id_cargo'];

            $nombre_pers    = strtoupper($nombre_pers);
            $apellido_pers  = strtoupper($apellido_pers);

            $conexion->query("INSERT INTO $personal(matricula_pers,nombre_pers,apellido_pers,id_cargo) VALUES ('$matricula_pers','$nombre_pers','$apellido_pers','$id_cargo')");
            
            echo "Datos ingresados correctamente";

            include("../cerrar_conexion.php");
        }
    ?>

</body>

</html>