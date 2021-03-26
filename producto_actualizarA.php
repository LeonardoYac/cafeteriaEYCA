<?php require_once('configuracion/conexionDB.php'); ?>
<?php 
    if (!isset($_SESSION)) {
        session_start();
    }  

    if (isset($_POST['actualizar'])) {
        $id_producto =  $_SESSION['productoActualForm'];

        $categoria  = $_POST["micategoria"];
        $nombre     = $_POST["nombre"];
        $precio     = $_POST["precio"];
        $existencia = $_POST["existencia"];
        
        //$imagen = $_POST["imagen"];

        $cambia= "UPDATE producto SET id_categoria = '$categoria', nombre = '$nombre', precio = '$precio', 
                  existencia='$existencia' WHERE id_producto='$id_producto'";
        $rescambia = mysqli_query($webshop_connect,$cambia);

        $_SESSION['actualizadoProducto']= "Producto Actualizado";
        $_SESSION['productoActualForm'] = NULL;
        unset($_SESSION['productoActualForm']);

        //echo($nombre. $fechaNac. $correo. $nomUser. $contra. $rol. $direccion. $telefono);
        //echo("el usuario actual form: ". $usuarioLogin);
        print("<script>window.location.replace('producto_actualizar.php');</script>");   
        
    }elseif (isset($_POST['eliminar'])) {
        //echo "<script>alert('Desea eliminar el usuario');</script>";

        //$comparar = true;
        //$comparar_js = "<script type='text/javascript'>confirm('¿ELIMINAR?')</script>";
        //echo($comparar_js); // Salida: "<script type='text/javascript'>confirm(...
        //if($comparar==$comparar_js){ // Si true=="<script type='text...."
            $id_produc =  $_SESSION['productoActualForm'];

            $cambia= "DELETE FROM producto WHERE id_producto='$id_produc'";
            $rescambia = mysqli_query($webshop_connect,$cambia);
    
            $_SESSION['actualizadoProducto']= "Producto Eliminado";
            $_SESSION['productoActualForm'] = NULL;
            unset($_SESSION['productoActualForm']);
            print("<script>window.location.replace('producto_actualizar.php');</script>"); 
        //}else{
            //$_SESSION['actualizado']= "El Usuario NO se elimino";
            //print("<script>window.location.replace('usuario_perfilA.php');</script>"); 
        //}
        
    }
?>