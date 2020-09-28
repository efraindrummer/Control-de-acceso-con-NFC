<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">
    <title>eliminar_alumno</title>

    <style>
      body{
        
        background-image: url("");
        
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


      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        
</head>
<body>
    <center><h3>ELIMINAR ALUMNOS</h3></center>
    
    <form method="POST" action="eliminar_alumno.php" class="form-inline">

    <center>
    <br><br>
    <div class="form-group">
         <label for="matricula_alum">Ingresa la matricula a eliminar:</label>
        <input type="text" placeholder="ingresar maximo 6 caracteres example: 123456" id="matricula_alum" name="matricula_alum" class="form-control" size="60px">
    </div>
    <br>
    <div class="form-group">
    <center>
        <br><br><br><br><br><br><br><br>
        <input type="submit" value="ELIMINAR" class="btn btn-danger" name="btn_eliminar"/>
        <input type="button" value="REGRESAR" class="btn btn-outline-info" onclick="location.href='registro_alumnos.php' "name="btn3"/>
    </center>
    </div>
    </center>
    </form>
    
    
    <?php

        if (isset($_POST['btn_eliminar'])) {

			include("../conexion.php");

		    $matricula_alum = $_POST['matricula_alum'];
		    $existe=0;

		    if($matricula_alum == ""){

		    	echo "por favor inserte la matricula";

		    }else{

		    	$resultados = mysqli_query($conexion,"SELECT * FROM $alumnos WHERE matricula_alum = '$matricula_alum'");
				while($consulta = mysqli_fetch_array($resultados)){

				$existe++;
  			}
  			if($existe==0){

  				echo "LA MATRICULA NO EXISTE";

  			}else{
  				//ELIMINAR
				$_DELETE_SQL = "DELETE FROM $alumnos WHERE matricula_alum = '$matricula_alum'";
				mysqli_query($conexion,$_DELETE_SQL); 
				echo "LOS DATOS SE ELIMINARON CORRECTAMENTE";
  				}
		    }
		}
    ?>
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

</body>
</html>