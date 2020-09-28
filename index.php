<?php

    include("conexion.php");
	session_start();
	if (isset($_SESSION['id_usuario'])) {
		header("Location: menu_master.php");
	}
    //ACCIONES DEL LOGIN
    //if (!empty($_POST)) {
	if (isset($_POST["ingresar"])) {
        
        $usuario = mysqli_real_escape_string($conexion,$_POST['user']);
        $password = mysqli_real_escape_string($conexion,$_POST['pass']);
        $password_encriptada = sha1($password);
        $sql = "SELECT idusuarios FROM usuarios WHERE usuario = '$usuario' AND password = '$password_encriptada'";
        $resultado = $conexion->query($sql);
        $rows = $resultado->num_rows;

        if ($rows > 0) {

            $row = $resultado->fetch_assoc();
            $_SESSION['id_usuario'] = $row['idusuarios'];
            header("Location: menu_master.php");

        } else {
            
			echo "
			<script>
                alert('USUARIO O PASSWORD INCONRRECTO');
                windows.location = 'index.php';
            </script>";

        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Del Sistema</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
</head>
<body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="images/img-01.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" action="<?php $_SERVER["PHP_SELF"]; ?>" method="POST">
					<span class="login100-form-title">SISTEMA DE CONTROL DE ACCESO - LOGIN</span>

					<div class="wrap-input100 validate-input" data-validate = "El usuario es requerido">
						<input class="input100" type="text" name="user" placeholder="usuario">
						<span class="focus-input100"></span>
						<span class="symbol-input100"><i class="fa fa-user" aria-hidden="true"></i></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "La contraseña es requerida">
						<input class="input100" type="password" name="pass" placeholder="contraseña">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>
					
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="ingresar">INGRESAR</button>
					</div>
				
					<div class="text-center p-t-136">
						<p class="txt2" href="#">FAVOR DE INGRESAR DATOS CORRECTOS
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</p>
					</div>
				</form>
			</div>
		</div>
	</div>
	
	

		
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
	<script src="js/main.js"></script>

</body>
</html>