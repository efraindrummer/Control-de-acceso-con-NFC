<?php   
    include("conexion.php");//incluye la conexion
    session_start();//compueba si la sesion esta echa

    if (!isset($_SESSION['id_usuario'])) {
        header("Location: index.php");
        //si el id del usuario es diferente no iniciara en el menu principal
        //si no que me redirigira al LOGIN principal del sistema
    }
    //si compueba que la session todavia sigue activa, nos redirigira a la pagina principal del menu
    $iduser = $_SESSION['id_usuario'];
    $sql = "SELECT idusuarios, NombreC FROM usuarios WHERE idusuarios = '$iduser'";
    $resultado = $conexion->query($sql);
    $row = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Menu Principal</title>
    <!-- Estilos CSS de los componentes del Menu -->
    <style>
        body {
            font: 400 15px/1.8 Lato, sans-serif;
            color: #blue;
        }
        
        h3,
        h4 {
            margin: 10px 0 30px 0;
            letter-spacing: 10px;
            font-size: 20px;
            color: #111;
        }
        
        .container {
            padding: 80px 120px;
        }
        
        .person {
            border: 10px solid transparent;
            margin-bottom: 25px;
            width: 80%;
            height: 80%;
            opacity: 0.7;
        }
        
        .person:hover {
            border-color: #f1f1f1;
        }
        
        .carousel-inner img {
            -webkit-filter: grayscale(90%);
            filter: grayscale(90%);
            width: 100%;
            margin: auto;
        }
        
        .carousel-caption h3 {
            color: #fff !important;
        }
        
        @media (max-width: 600px) {
            .carousel-caption {
                display: none;
            }
        }
        
        .bg-1 {
            background: #2d2d30;
            color: #bdbdbd;
        }
        
        .bg-1 h3 {
            color: #fff;
        }
        
        .bg-1 p {
            font-style: italic;
        }
        
        .list-group-item:first-child {
            border-top-right-radius: 0;
            border-top-left-radius: 0;
        }
        
        .list-group-item:last-child {
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
        }
        
        .thumbnail {
            padding: 0 0 15px 0;
            border: none;
            border-radius: 0;
        }
        
        .thumbnail p {
            margin-top: 15px;
            color: #555;
        }
        
        .btn {
            padding: 10px 20px;
            background-color: #333;
            color: #f1f1f1;
            border-radius: 0;
            transition: .2s;
        }
        
        .btn:hover,
        .btn:focus {
            border: 1px solid #333;
            background-color: #fff;
            color: #000;
        }
        
        .modal-header,
        h4,
        .close {
            background-color: #333;
            color: #fff !important;
            text-align: center;
            font-size: 30px;
        }
        
        .modal-header,
        .modal-body {
            padding: 40px 50px;
        }
        
        #googleMap {
            width: 100%;
            height: 400px;
            -webkit-filter: grayscale(100%);
            filter: grayscale(100%);
        }
        
        .open .dropdown-toggle {
            color: #fff;
            background-color: #555 !important;
        }
        
        .dropdown-menu li a {
            color: #000 !important;
        }
        
        .dropdown-menu li a:hover {
            background-color: red !important;
        }
        
        .form-control {
            border-radius: 0;
        }
        
        textarea {
            resize: none;
        }
    </style>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
    <link href="plugins/iCheck/flat/blue.css" rel="stylesheet" type="text/css" />
    <link href="plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <link href="plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <link href="plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <link href="plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <link href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


</head>

<body class="skin-blue">
    <div class="wrapper">

        <header class="main-header">
            <!-- Logo -->
            <a href="#" class="logo"><b>Control - </b> Acceso</a>
            <nav class="navbar navbar-static-top" role="navigation">
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">

                        <li class="dropdown notifications-menu">

                        </li>
                        <!-- Tasks: style can be found in dropdown.less -->
                        <li class="dropdown tasks-menu">

                        </li>
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="dist/img/unnamed.png" class="user-image" alt="User Image" />
                                <span class="hidden-xs">Control de Acceso</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="dist/img/unnamed.png" class="img-circle" alt="User Image" />
                                    <p>
                                        Efrain - Sergio - Christian
                                        <small>Taller de diseño</small>
                                    </p>
                                </li>
                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-right">
                                        <a href="cerrar_sesion.php" class="btn btn-default btn-flat">Cerrar Sesion</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="dist/img/unnamed.png" class="img-circle" alt="User Image" />
                    </div>
                    <div class="pull-left info">
                        <p>Control de Acceso</p>

                        <a href="#"><i class="fa fa-circle text-success"></i> En Linea</a>
                    </div>
                </div>
                <!-- search form -->
                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="q" class="form-control" placeholder="Search..." />
                        <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
                    </div>
                </form>
                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu">
                    <li class="header">Menu de Navegacion</li>
                    <li class="active treeview">
                        <a href="#">
                            <i class="fa fa-dashboard"></i> <span>Principal</span> <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li class="active"><a href="menu_master.php"><i class="fa fa-circle-o"></i> Principal</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-files-o"></i>
                            <span>Opciones</span>
                            <span class="label label-primary pull-right">4</span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="alumnos/registro_alumnos.php"><i class="fa fa-circle-o"></i> Alumnos</a></li>
                            <li><a href="salon/registro_salones.php"><i class="fa fa-circle-o"></i> Salones</a></li>
                            <li><a href="personal/registro_personal.php"><i class="fa fa-circle-o"></i> Personal</a></li>
                            <li><a href="cerrar_sesion.php"><i class="fa fa-circle-o"></i> Salir</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-pie-chart"></i>
                            <span>Consultar Tablas</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="alumnos/consulta_alumno.php"><i class="fa fa-circle-o"></i> Consulta Alumnos</a></li>
                            <li><a href="personal/consulta_personal.php"><i class="fa fa-circle-o"></i> Consulta Personal</a></li>
                            <li><a href="salon/consulta_salones.php"><i class="fa fa-circle-o"></i> Consulta Salones</a></li>
                            <li><a href="consultas/consulta_inoutalumno.php"><i class="fa fa-circle-o"></i> Entradas y salidas de alumnos</a></li>
                            <li><a href="consultas/consulta_inoutpersonal.php"><i class="fa fa-circle-o"></i> Entradas y salidas del personal</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-laptop"></i>
                            <span>Consultas Importantes</span>
                            <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="consultar_alumnos_por_carrera.php"><i class="fa fa-circle-o"></i> Listar Alumnos X Carrera</a></li>
                            <li><a href="entrada_y_salida_del_alumno.php"><i class="fa fa-circle-o"></i> Entrada y Salida de los Alumnos</a></li>
                            <li><a href="entrada_y_salida_del_personal.php"><i class="fa fa-circle-o"></i> Entrada y Salida de Personal</a></li>
                            
                        </ul>
                    </li>

                    <li>
                        <a href="">
                            <i class="fa fa-envelope"></i> <span>Enviar Correo Abajo!!</span>
                            <small class="label pull-right bg-yellow"></small>
                        </a>
                    </li>

                    <li><a href="cerrar_sesion.php"><i class="fa fa-circle-o text-info"></i>Salir</a></li>
                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Right side column. Contains the navbar and content of the page -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                    Principal
                    <small>Panel de Control</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Casa</a></li>
                    <li class="active">Principal</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>Alumnos</h3>
                                <p>Registre a los alumnos</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="alumnos/registro_alumnos.php" class="small-box-footer">Presione Aqui!!<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                                <h3>Personal<sup style="font-size: 20px">%</sup></h3>
                                <p>Registre al personal</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="personal/registro_personal.php" class="small-box-footer">Presione Aqui!!<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>Salones</h3>
                                <p>Registre a los salones</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="salon/registro_salones.php" class="small-box-footer">Presione Aqui!!<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-red">
                            <div class="inner">
                                <h3>Gracias</h3>
                                <p>por usar nuestro sistema</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <a href="cerrar_sesion.php" class="small-box-footer">Cerrar Sesion<i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <div id="band" class="container text-center">

                    <h3>SISTEMA DE CONTROL DE ACCESO</h3>
                    <p><em>OBJETIVO DEL SISTEMA</em></p>
                    <p>Este sistema tiene la finalidad de tener que el profesor tenga la informacion del acceso a los estudiantes en la direfentes aulas de clase, poder manipular datos, registros, estadisticas, consultas y muchas funciones mas como la implementecion del NodeMCU8226 y El RFID Arduino para registrar a los alumnos con una tecnologia NFC.</p>
                    <br>

                    <div class="row">
                        <div class="col-sm-4">
                            <p class="text-center"><strong>ACCESO</strong></p><br>
                            <a href="#demo" data-toggle="collapse">
                                <img src="images/imagen1.jpeg" class="img-circle person" alt="Random Name" width="255" height="255">
                            </a>
                            <div id="demo" class="collapse">
                                <p>podra dar de alta a los estudiantes</p>
                                <p>registre, modificque, elimine y consulte la informacion de manera correcta</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <p class="text-center"><strong>ADMINISTRADOR</strong></p><br>
                            <a href="#demo2" data-toggle="collapse">
                                <img src="images/administrador.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
                            </a>
                            <div id="demo2" class="collapse">
                                <p>Acceso total al sistema</p>
                                <p>interfaz amigable para las tareas encomendadas del sistema</p>
                                <p>contacte al creador del sofware para cualquier aclaracion</p>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <p class="text-center"><strong>REGISTROS DE ENTRADA</strong></p><br>
                            <a href="#demo3" data-toggle="collapse">
                                <img src="images/acceso.jpg" class="img-circle person" alt="Random Name" width="255" height="255">
                            </a>
                            <div id="demo3" class="collapse">
                                <p>el sistema cuenta con un tarjetero para registrar a los alumnos</p>
                                <p>Cuenta con un sensor NFC donde cada uno tiene una clave unica</p>
                                <p>Podra consultar el acceso a los diferentes partes de la universidad</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">

                </div>
                <!-- /.nav-tabs-custom -->
                <!-- quick email widget -->
                <div class="box box-info">
                    <div class="box-header">
                        <i class="fa fa-envelope"></i>
                        <h3 class="box-title">Correo Electronico</h3>
                        <!-- tools box -->
                        <div class="pull-right box-tools">

                        </div>
                        <!-- /. tools -->
                    </div>
                    <div class="box-body">
                        <form action="menu_master.php" method="post">
                            <div class="form-group">
                                <input type="email" class="form-control" name="emailto" placeholder="Email para:" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" name="subject" placeholder="Asunto" />
                            </div>
                            <div>
                                <textarea class="textarea" name="mensaje" placeholder="Mensaje" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>
                        </form>
                    </div>
                    <div class="box-footer clearfix">
                        <button class="pull-right btn btn-default" id="sendEmail" name="sendEmail">Enviar <i class="fa fa-arrow-circle-right"></i></button>
                        <?php

                        error_reporting(0);

                        $sendEmail = $_POST['sendEmail'];
                        $emailto = $_POST['emailto'];
                        $subject = $_POST['subject'];
                        $mensaje = $_POST['mensaje'];

                        $headers[] = 'MINE-Version: 1.0';
                        $headers[] = 'Content-type: text/html; charset=iso=8859-1';
                        $headers[] = 'From: Sistema de control de acceso <System_control_access@mail.unacar.mx>';

                        if (isset($sendEmail)) {
                            
                            if (mail($emailto, $subject, $mensaje)) {
                                echo "
                                <script>
                                    alert('Correo Enviado Correctamente!!');
                                </script>";
                            } else {
                                echo "
                                <script>
                                    alert('No enviado, Hubo un error :( Sorry!!');
                                </script>";
                            }
                            
                        }

                        ?>
                    </div>
                </div>

                </section>

                <section class="col-lg-5 connectedSortable">

                </section>
                
        </div>

        </section>
    </div>
   
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 1.0
        </div>
        <strong>Copyright &copy; 2020 <a href="https://efraindrummerwebsite.000webhostapp.com">Efrain May Mayo - Sergio Saldivar Yerbez - Cristian Rene Trejo De La Cruz</a>.</strong> Todos los derechos reservados
    </footer>
    </div>

    <script src="plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.min.js" type="text/javascript"></script>
    <script>
        $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js" type="text/javascript"></script>
    <script src="plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <script src="plugins/knob/jquery.knob.js" type="text/javascript"></script>
    <script src="plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <script src="plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
    <script src="plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <script src="plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src='plugins/fastclick/fastclick.min.js'></script>
    <script src="dist/js/app.min.js" type="text/javascript"></script>
    <script src="dist/js/pages/dashboard.js" type="text/javascript"></script>
    <script src="dist/js/demo.js" type="text/javascript"></script>
</body>
</html>