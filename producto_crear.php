<?php require_once('configuracion/conexionDB.php'); ?>
<?php 
    if (!isset($_SESSION)) {
        session_start();
    }

    $categoria = "";
    $nombre = "";
    $precio = "";
    $existencia = "";
    $imagen = "";
    $ext ="";

    if (isset($_POST['nuevoproducto'])) {
        $categoria  = $_POST["categoria"];
        $nombre     = $_POST["nombre"];
        $precio     = $_POST["precio"];
        $existencia = $_POST["existencia"];
        //$imagen = $_POST["imagen"];

        $quser= "INSERT INTO producto (id_categoria, nombre, precio, existencia, imagen, tipo_img)";
        $quser.= "VALUES ('". $categoria ."','". $nombre ."','". $precio ."','". $existencia ."','". $imagen ."','". $ext ."')";
        $newUser = mysqli_query($webshop_connect,$quser);

        if (PHP_VERSION >= 5.1) {session_regenerate_id(true);} else {session_regenerate_id();}
		$_SESSION['mensaje_producto'] = "Procuto Agregado";

        print("<script>window.location.replace('producto_nuevo.php');</script>");

    }

?>