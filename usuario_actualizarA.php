<?php require_once('configuracion/conexionDB.php'); ?>
<?php 
    if (!isset($_SESSION)) {
        session_start();
    }  

    if (isset($_POST['actualizar'])) {
        $usuarioLogin =  $_SESSION['elUsuarioActualForm'];

        $nombre    = $_POST["nombre"];
        $fechaNac  = $_POST["fechaNac"];
        $correo    = $_POST["correo"];
        $nomUser   = $_POST["nombreUser"];
        $contra    = $_POST["contrasenya"];
        $rol       = $_POST["mirol"];
        $direccion = $_POST["direccion"];
        $telefono  = $_POST["telefono"];

        $cambia= "UPDATE usuario SET nombre = '$nombre', fecha_nac = '$fechaNac', correo='$correo', nombre_usuario='$nomUser',
                contrasenya='$contra', rol_usuario='$rol', direccion='$direccion', telefono='$telefono' WHERE id_usuario='$usuarioLogin'";
        $rescambia = mysqli_query($webshop_connect,$cambia);

        $_SESSION['actualizado']= "Usuario Actualizado";
        $_SESSION['elUsuarioActualForm'] = NULL;
        unset($_SESSION['elUsuarioActualForm']);

        //echo($nombre. $fechaNac. $correo. $nomUser. $contra. $rol. $direccion. $telefono);
        //echo("el usuario actual form: ". $usuarioLogin);
        print("<script>window.location.replace('usuario_perfilA.php');</script>");   
        
    }elseif (isset($_POST['eliminar'])) {
        //echo "<script>alert('Desea eliminar el usuario');</script>";

        //$comparar = true;
        //$comparar_js = "<script type='text/javascript'>confirm('¿ELIMINAR?')</script>";
        //echo($comparar_js); // Salida: "<script type='text/javascript'>confirm(...
        //if($comparar==$comparar_js){ // Si true=="<script type='text...."
            $usuarioLogin =  $_SESSION['elUsuarioActualForm'];

            $cambia= "DELETE FROM usuario WHERE id_usuario='$usuarioLogin'";
            $rescambia = mysqli_query($webshop_connect,$cambia);
    
            $_SESSION['actualizado']= "Usuario Eliminado";
            $_SESSION['elUsuarioActualForm'] = NULL;
            unset($_SESSION['elUsuarioActualForm']);
            print("<script>window.location.replace('usuario_perfilA.php');</script>"); 
        //}else{
            //$_SESSION['actualizado']= "El Usuario NO se elimino";
            //print("<script>window.location.replace('usuario_perfilA.php');</script>"); 
        //}
        
    }
?>