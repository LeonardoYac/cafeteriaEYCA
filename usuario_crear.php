<?php require_once('configuracion/conexionDB.php'); ?>
<?php 
    if (!isset($_SESSION)) {
        session_start();
    }

    function fechaCambio($fecha){
        $tiempo = explode ("/", $fecha);
        $xano=(int)$tiempo[2];
        $xmes=(int)$tiempo[0];
        $xdia=(int)$tiempo[1];
        if ($xdia<10){ $fdia="0".$xdia; }else{ $fdia=$xdia; }
        if ($xmes<10){ $fmes="0".$xmes;	}else{ $fmes=$xmes; }
        $varFecha=$xano."-".$fmes."-".$fdia;
        return $varFecha;
    }

    $nombre = "";
    $fechaNac = "";
    $correo = "";
    $nomUser = "";
    $contra = "";
    $direccion ="";
    $telefono = "";

    if (isset($_POST['registrar'])) {
        $nombre    = $_POST["nombre"];
        $fechaNac  = $_POST["fechaNac"];
        $correo    = $_POST["correo"];
        $nomUser   = $_POST["nombreUser"];
        $contra    = $_POST["contrasenya"];
        $direccion = $_POST["direccion"];
        $telefono  = $_POST["telefono"];

        $quser= "INSERT INTO usuario (nombre, fecha_nac, correo, nombre_usuario, contrasenya, rol_usuario, direccion, telefono)";
        $quser.= "VALUES ('". $nombre ."','". $fechaNac ."','". $correo ."','". $nomUser ."','". $contra ."','". 3 ."','". $direccion ."','". $telefono ."')";
        $newUser = mysqli_query($webshop_connect,$quser);

        if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
        $_SESSION['MM_Username'] = $nomUser;
        $_SESSION['errorNewUser'] = "";
        print("<script>window.location.replace('index.php');</script>");

    }

?>