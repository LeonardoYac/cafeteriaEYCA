<?php require_once('configuracion/conexionDB.php'); ?>
<?php 
    if (!isset($_SESSION)) {
        session_start();
    }
    $usuarioLogin = "";
    if(isset($_SESSION['MM_Username'])){
        $usuarioLogin = $_SESSION['MM_Username'];
    }

    if (isset($_POST['guardar'])) {
        $nombre    = $_POST["nombre"];
        $fechaNac  = $_POST["fechaNac"];
        $correo    = $_POST["correo"];
        $nomUser   = $_POST["nombreUser"];
        $contra    = $_POST["contrasenya"];
        $direccion = $_POST["direccion"];
        $telefono  = $_POST["telefono"];

        $cambia= "UPDATE usuario SET nombre = '$nombre', fecha_nac = '$fechaNac', correo='$correo', nombre_usuario='$nomUser',
                contrasenya='$contra', direccion='$direccion', telefono='$telefono' WHERE nombre_usuario='$usuarioLogin'";
        $rescambia = mysqli_query($webshop_connect,$cambia);

        $_SESSION['MM_Username'] = $nomUser;
        print("<script>window.location.replace('index.php');</script>");

    }
?>