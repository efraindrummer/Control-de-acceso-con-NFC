<!DOCTYPE html>
<html>
<head>
    <title>REGISTRO DE SALONES</title>

    <style>
    body {

        background-image: url("");

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
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>

<body>

    <center>
        <h1>SALONES</h1>
    </center>

    <form method="POST" action="registro_salones.php" class="form-inline">

        <center>
            <br><br>
            <div class="form-group">
                <label for="id_salon">NUMERO DE SALON:</label>
                <input type="text" placeholder="Introduce el numero de salon..." name="id_salon" class="form-control" id="id_salon" size="60px">
            </div>
            <br><br>
            <div class="form-group">
                <label for="desc_salon">DESCRIPCION:</label>
                <input type="text" placeholder="Describe el salon..." name="desc_salon" class="form-control" id="desc_salon" size="60px">
            </div>
            <br>
            <br>
            <br>
            <input type="submit" value="ENVIAR" class="btn btn-primary" name="btn_enviar">
            <input type="submit" value="ACTUALIZAR" class="btn btn-success" name="btn_actualizar">
            <input type="submit" value="ELIMINAR" class="btn btn-danger" name="btn_eliminar">
            <input type="button" value="CONSULTA GENERAL" class="btn btn-outline-info" onclick="location.href='consulta_salones.php' " name="btn" />
            <input type="button" value="REGRESAR AL MENU PRINCIPAL" class="btn btn-outline-warning" onclick="location.href='../menu_master.php' " name="btn3" />
            <br><br>
        </center>

    </form>

    <?php

	if(isset($_POST['btn_enviar'])){

		include("../conexion.php");

		$id_salon = $_POST['id_salon'];
        $desc_salon = $_POST['desc_salon'];
        
        $desc_salon = strtoupper($desc_salon);

		$conexion->query("INSERT INTO $salones (id_salon,desc_salon) values ('$id_salon','$desc_salon')");

		echo "LOS DATOS FUERON ENVIADOS CORRECTAMENTE";

		include("../cerrar_conexion.php");
	}

	/*if (isset($_POST['btn_consultar'])) {

		include("conexion.php");

		$id_salon = $_POST['id_salon'];
        $desc_salon = $_POST['desc_salon'];

		$resultados = mysqli_query($conexion,"SELECT * FROM $salones WHERE id_salon = '$id_salon'");
		while ($consulta = mysqli_fetch_array($resultados)) {
		echo 
		"
		<table width=\"100%\" border=\"2\">
		  <tr>
		      <td><b><center>ID</center></b></td>
		      <td><b><center>DESCRIPCION</center></b></td>
		</tr>
		  <tr>
		  <td>".$consulta['id_salon']."</td>
		  <td>".$consulta['desc_salon']."</td>
		</tr>
		</table>
		";
		}
		include("cerrar_conexion.php");
	}*/

	/*metodo actualizar presionando el boton actualizar, el primer if esta rpogramado para que obligue al usuario
	a ingresar todo los campos y si comprueba ejecuta la consulta,  */

	if (isset($_POST['btn_actualizar'])) {

		include("../conexion.php");

		$id_salon = $_POST['id_salon'];
        $desc_salon = $_POST['desc_salon'];

        $desc_salon = strtoupper($desc_salon);

		if($id_salon == "" || $desc_salon == ""){

		  	echo "LOS CAMPOS SON OBLIGATORIOS PARA PODER ACTUALIZAR LOS DATOS";

		}else{

		    $existe=0;

		    $resultados = mysqli_query($conexion,"SELECT * FROM $salones WHERE id_salon = '$id_salon'");
			while($consulta = mysqli_fetch_array($resultados)){

				$existe++;
			}  
  			if($existe==0){

  				echo "EL SALON NO EXISTE";

  			}else{

				//ACTUALIZAR 
				$_UPDATE_SQL="UPDATE $salones Set id_salon = '$id_salon', desc_salon = '$desc_salon'WHERE id_salon ='$id_salon'"; 

				mysqli_query($conexion,$_UPDATE_SQL); 

				echo "ACTUALIZACION CON EXITO";
  				
  			}
		} 
		    include("../cerrar_conexion.php");   
		}

		//metodo eliminar al presionar el boton eliminar 

		if (isset($_POST['btn_eliminar'])) {

			include("../conexion.php");

		    $id_salon = $_POST['id_salon'];
		    $existe=0;

		    if($id_salon == ""){

		    	echo "EL ID SALON ES OBLIGATORIO";

		    }else{

		    	$resultados = mysqli_query($conexion,"SELECT * FROM $salones WHERE id_salon = '$id_salon'");
				while($consulta = mysqli_fetch_array($resultados)){

				$existe++;
  			}
  			if($existe==0){

  				echo "LA ID SALON NO EXISTE";

  			}else{
  				//ELIMINAR
				$_DELETE_SQL = "DELETE FROM $salones WHERE id_salon = '$id_salon'";
				mysqli_query($conexion,$_DELETE_SQL); 
				echo "LOS DATOS SE ELIMINARON CORRECTAMENTE";
  				}
		    }
		}
?>
</body>
</html>