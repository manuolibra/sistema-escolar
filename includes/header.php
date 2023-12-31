<?php
error_reporting(0);
session_start();
$usuario = $_SESSION['usuario'];
$permiso = $_SESSION['type'];
if ($usuario == null || $usuario == ''  && $permiso == null || $permiso == '') {

    echo "<script language='JavaScript'>
    alert('Error: Debes iniciar sesion primero ');
    location.assign('../includes/sesion/login.php');
    </script>";

    die();
} ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SISTEMA DE GESTIÓN ESCOLAR | UEE 19 DE ABRIL</title>

    <link rel="icon" type="image/x-icon" href="../favicon.ico">

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="../package/dist/sweetalert2.css">
    <!-- Custom styles for this template-->
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../vendor/bootstrap-icons/bootstrap-icons.css">

    <script src="../js/jquery.min.js"></script>
    <link href="../vendor/datatables/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    

</head>
<style>
    .lgs {
        border-radius: 126px;
        width: 75px;
        height: auto;
    }

    .recargar {

    }
</style>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-black bg-gradient sidebar sidebar-dark accordion" id="accordionSidebar">
            <li class="nav-item m-3">
                <a href="index.php">
                    <img src="../img/logo.jpg" class="img-fluid img-thumbnail" alt="logo del plantel">
                </a>
            </li>
            <!-- Sidebar - Brand -->

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="../views/index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Panel</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                REGISTRO
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link " href="../views/alumnos.php">
                    <i class="bi bi-person-circle"></i>
                    <span>Alumnos</span>
                </a>
            </li>




            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link active" href="../views/profesores.php">
                    <i class="bi bi-person-badge-fill"></i>
                    <span>Personal</span>
                </a>
            </li>



            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link active" href="../views/grados.php">
                    <i class="bi bi-backpack-fill"></i>
                    <span>Aulas</span>
                </a>
            </li>
            
           <!--  <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Otros</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Módulos</h6>
                        <a class="collapse-item" href="../views/grados.php">Grados</a>
                        <a class="collapse-item" href="../views/especialidades.php">Periodos académicos</a>
                    </div>
                </div>
            </li> -->

            <!-- Nav Item - Charts -->
            <!-- <li class="nav-item">
                <a class="nav-link" href="../views/materias.php">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Asignaturas</span></a>
            </li> -->


            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <?php if ($_SESSION["type"] == 1) { ?>
            <div class="sidebar-heading">
                AJUSTES
            </div>


            
                <!-- Nav Item - Tables -->
                <li class="nav-item">
                    <a class="nav-link" href="../views/usuarios.php">
                    <i class="bi bi-person-fill-lock"></i>
                        <span>Usuarios</span></a>
                </li>
            
            <!-- Divider -->
                <hr class="sidebar-divider d-none d-md-block">
            <?php }
            ?>
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>



        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column bg-dark-subtle">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-dark bg-gradient topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="d-flex flex-column mb-0 justify-content-start align-items-baseline">

                    
                    <h4 class="navbar-text p-0 m-0 text-light"> Año Escolar: <strong class="ms-2"> <?php
                                    $añoActual = date("Y");
                                    $mesActual = idate("m");
                            
                                    if ($mesActual <= 7) {
                                        echo date("Y",strtotime("-1 year")) . " - " . $añoActual;
                                    } else {
                                        echo $añoActual . " - " . date("Y",strtotime("+1 year"));
                                    }

                        ?></strong></h4>

                        <p class="navbar-text p-0 m-0 text-black fw-bold"><?php
                                   $mesActual = idate("m");

                                   switch ($mesActual) {
                                       case '9' || '10' || '11' || '12':
                                           echo "Primer Lapso";
                                           break;
                           
                                       case '1' || '2' || '3':
                                           echo "Segundo Lapso";
                                           break;
                                       default:
                                           echo "Tercer Lapso";
                                           break;
                                   }
                        ?></p>
                    </div>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                         

                        <?php
                        include "db.php";

                        $id = $_GET['id'];
                        $sql = "SELECT  u.id, u.usuario, u.correo, u.password, u.fecha, p.rol FROM users u
                        LEFT JOIN permisos p ON u.id_rol= p.id  WHERE usuario ='$usuario'";
                        $usuarios = mysqli_query($conexion, $sql);
                        if ($usuarios->num_rows > 0) {
                            foreach ($usuarios as $key => $fila) {
                            }
                        }
                        ?>

                        

                        <button style = "color:white;" type="button" class="btn btn-link-white bi bi-arrow-clockwise" onclick="document.location.reload();"></button>
                        <div class="topbar-divider d-none d-sm-block"></div>
                        

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline small"> <?php echo $_SESSION['usuario']; ?></span>
                                <img class="img-profile rounded-circle" src="../img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu shadow animated--grow-in dropdown-menu-end" aria-labelledby="userDropdown">

                                <a class="dropdown-item" href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar sesión
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <?php include "../views/salir.php"; ?>