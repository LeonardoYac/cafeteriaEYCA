<?php require_once('configuracion/conexionDB.php'); ?>

<?php 
    if (!isset($_SESSION)) {
        session_start();
    }

    $usuario = "";
    $contrasenya = "";

    if (isset($_POST['iniciarSesion'])) {
        $usuario = $_POST["usuario"];
        $contrasenya = $_POST['contrasenya'];

        if ($usuario == "" OR $contrasenya =="") {
            print("<script>window.location.replace('errorInicioDeSesion.php');</script>");   
        }else{
            $consulta="SELECT nombre_usuario, contrasenya FROM usuario WHERE nombre_usuario='$usuario' AND contrasenya='$contrasenya'";
            $query = mysqli_query($webshop_connect, $consulta);
            $login = mysqli_num_rows($query);

            if($login){
                if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
                $_SESSION['MM_Username'] = $usuario;
                print("<script>window.location.replace('index.php');</script>");
            }else{
                print("<script>window.location.replace('errorInicioDeSesion.php');</script>");
            }

            
        }
    }elseif (isset($_POST['registrarse'])) {
        print("<script>window.location.replace('usuarios_nuevo.php');</script>");
    }

?>