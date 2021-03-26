<?php require_once('configuracion/conexionDB.php'); ?>
<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    $logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
    if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
        $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
    }

    if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
        //borrando variable de sesion. 
        $_SESSION['MM_Username'] = NULL; // 
        $_SESSION['errorNewUser']= NULL;
        $_SESSION['mensaje_usuarioNuevo'] = NULL;
        $_SESSION['elUsuarioActualForm'] = NULL;

        unset($_SESSION['MM_Username']);
        unset($_SESSION['errorNewUser']);
        unset($_SESSION['mensaje_usuarioNuevo']);
        unset($_SESSION['elUsuarioActualForm']);

        $sinInicio = TRUE;
        $mostrarUsuario = FALSE;
        print("<script>window.location.replace('index.php');</script>");
    }

    $usuarioLogin = "";
    try {
        if(isset($_SESSION['MM_Username'])){
            $usuarioLogin = $_SESSION['MM_Username'];
        }
       
    } catch (\Throwable $th) {
        //echo 'Excepción capturada: ',  $th->getMessage(), "\n";
    }
    $sinInicio = TRUE;
    $mostrarUsuario = FALSE; 
    $habilitar = FALSE; 


    if($usuarioLogin != ""){
        $sinInicio = FALSE;
        $mostrarUsuario = TRUE;
        
        $consulta="SELECT * FROM usuario WHERE nombre_usuario='$usuarioLogin' AND rol_usuario='1'";
        $query = mysqli_query($webshop_connect, $consulta);
        $soyAdmin = mysqli_num_rows($query);

        if ($soyAdmin) {
            $habilitar = TRUE;
        }
    }

?>

<html lang="en">
    <head>
        <title>CAFETERÍA EYCA</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="shortcut icon" href="images/logo.jpg">
       
        
        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,700" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Great+Vibes" rel="stylesheet">

        <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
        <link rel="stylesheet" href="css/animate.css">
        
        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">

        <link rel="stylesheet" href="css/aos.css">

        <link rel="stylesheet" href="css/ionicons.min.css">

        <link rel="stylesheet" href="css/bootstrap-datepicker.css">
        <link rel="stylesheet" href="css/jquery.timepicker.css">

        
        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="css/icomoon.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
            <a class="navbar-brand" href="index.php">CAFETERÍA<small>EYCA</small></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="oi oi-menu"></span> Menu
            </button>
            <div class="collapse navbar-collapse" id="ftco-nav">
                <ul class="navbar-nav ml-auto">
                <li class="nav-item active"><a href="index.php" class="nav-link">Inicio</a></li>
                <li class="nav-item"><a href="menu.php" class="nav-link">Menú</a></li>
               <!--  <li class="nav-item"><a href="servicios.php" class="nav-link">Servicios</a></li> -->
                <!-- <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li> -->
                <li class="nav-item"><a href="acercaDe.php" class="nav-link">Acerca De</a></li>
                <li class="nav-item"><a href="contacto.php" class="nav-link">Contacto</a></li>
                <!-- <li class="nav-item cart"><a href="cart.html" class="nav-link"><span class="icon icon-shopping_cart"></span><span class="bag d-flex justify-content-center align-items-center"><small>1</small></span></a></li> -->
                <?php if($habilitar){ ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="producto.php" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Producto</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04" style="margin:-10px;">
                            <a class="dropdown-item" href="producto_nuevo.php">Crear</a>
                            <a class="dropdown-item" href="producto_actualizar.php">Actualizar | Eliminar</a>
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="usuarios.php" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Usuarios</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04" style="margin:-10px;">
                            <a class="dropdown-item" href="usuarios_nuevoA.php">Crear</a>
                            <a class="dropdown-item" href="usuario_perfilA.php">Actualizar | Eliminar</a>
                        </div>
                    </li>
                <?php } ?>

                <?php if($sinInicio) { ?><li class="nav-item"><a href="registrarse.php" class="nav-link">Iniciar Sesión</a></li> <?php } ?>
                <?php if($mostrarUsuario) { ?>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="usuarios.php" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="text-transform: unset;"><?php echo($usuarioLogin);?></a>
                        <div class="dropdown-menu" aria-labelledby="dropdown04" style="margin:-10px;">
                            <a class="dropdown-item" href="usuario_perfil.php">Editar Perfil</a>
                            <a class="dropdown-item" href="<?php echo $logoutAction ?>">Cerrar Sesión</a>
                        </div>
                    </li>                    
                <?php } ?>
                </ul>
            </div>
            </div>
        </nav>
    </body>
</html>
