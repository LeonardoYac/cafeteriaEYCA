<?php require_once('configuracion/conexionDB.php'); ?>
<?php 
    if (!isset($_SESSION)) {
        session_start();
    }

    $mensaje="";
    if(isset($_SESSION['actualizadoProducto'])){
        $mensaje = $_SESSION['actualizadoProducto'];
    }

    $micategoria    = "";
    $nombre = "";
    $precio = "";
    $existencia = "";
    $imagen = "";

    $categoriaNombre = "CATEGORIA ->";

    if(isset($_POST['buscar'])){
        $id_usuario = 0;
        if(isset($_POST['productoActualForm'])){
            $_SESSION['productoActualForm'] = $_POST['productoActualForm'];
            $id_producto = $_POST['productoActualForm'];
        }
        
        $mensaje="Productos";
        
        if($id_producto != 0){
            $query="SELECT * FROM producto WHERE id_producto= '$id_producto' ";
            $verRU = mysqli_query($webshop_connect,$query);
            $row_verRU = mysqli_fetch_array($verRU);

            do {
                // datos del login de usuarios 
                $micategoria = $row_verRU["id_categoria"];
                $nombre    = $row_verRU["nombre"];
                $precio  = $row_verRU["precio"];
                $existencia    = $row_verRU["existencia"];
                //$imagen   = $row_verRU["imagen"];

            } while ($row_verRU = mysqli_fetch_array($verRU));

            //******************************************************************************* */
            $query2="SELECT * FROM categoria WHERE id_categoria= '$micategoria' ";
            $verRU2 = mysqli_query($webshop_connect,$query2);
            $row_verRU2 = mysqli_fetch_array($verRU2);

            do {
                // datos del rol
                $categoriaNombre = $row_verRU2["descripcion"];

            } while ($row_verRU2 = mysqli_fetch_array($verRU2));

        }
        
    }


    //*************************************************************************************************************
    $mv0=0;

    $query_rol = "SELECT * FROM categoria ORDER BY id_categoria ASC";
    $rol = mysqli_query($webshop_connect,$query_rol);
    $row_rol = mysqli_fetch_array($rol);
    $totalRows_rol = mysqli_num_rows($rol);
    //*************************************************************************************************************
    $query_usuario = "SELECT * FROM producto ORDER BY id_producto ASC";
    $usuario = mysqli_query($webshop_connect,$query_usuario);
    $row_usuario = mysqli_fetch_array($usuario);
    $totalRows_usuario = mysqli_num_rows($usuario);
    //*************************************************************************************************************
     

?>
<?php include('head.php');  ?>
<!DOCTYPE html>
<html lang="en">
    <body>
        <div class="row slider-text justify-content-center align-items-center"><br><br></div>
        <h1 class="mb-4" style="text-align:center; margin-top:50px;"><?php echo($mensaje); ?></h1>

        <div class="form-group" style="margin:auto; width: 60%; ">
            <form action="producto_actualizar.php" class="" method="post">
                <select class="form-select form-control" aria-label="Default select example" name="productoActualForm">
                    <option style="background:black;" value="0" <?php if (!(strcmp(0, $mv0))) {echo "selected=\"selected\"";} ?>> PRODUCTOS </option>
                    <?php do { ?>
                        <option style="background:black;" value="<?php echo $row_usuario['id_producto']?>"<?php if (!(strcmp($row_usuario['id_producto'], $mv0))) {echo "selected=\"selected\"";} ?>><?php echo $row_usuario['nombre']; ?></option>
                            
                    <?php } while ($row_usuario = mysqli_fetch_array($usuario));
                            $rows = mysqli_num_rows($usuario);
                            if($rows > 0) {
                                mysqli_data_seek($usuario, 0);
                                $row_usuario = mysqli_fetch_array($usuario);
                            } ?>
                </select>
                <div class="form-group">
                    <input type="submit" value="Ir" name="buscar" class="btn btn-primary py-2 px-3" style="border-radius: 25px;" >
                </div>
            </form>
        </div>

        <div class="row slider-text justify-content-center align-items-center" style="margin-top:50px;">
            <form action="producto_actualizarA.php" onsubmit="return eliminar()" class="contact-form" method="post">

                <div class="form-group">
                    <select class="form-select form-control" aria-label="Default select example" name="micategoria">
                        <option style="background:black;" value="<?php echo($micategoria);?>" <?php if (!(strcmp(0, $mv0))) {echo "selected=\"selected\"";} ?>><?php echo($categoriaNombre);?></option>
                        <?php do { ?>
                        <option style="background:black;" value="<?php echo $row_rol['id_categoria']?>"<?php if (!(strcmp($row_rol['id_categoria'], $mv0))) {echo "selected=\"selected\"";} ?>><?php echo $row_rol['descripcion']; ?></option>
                        
                        <?php } while ($row_rol = mysqli_fetch_array($rol));
                                    $rows = mysqli_num_rows($rol);
                                    if($rows > 0) {
                                        mysqli_data_seek($rol, 0);
                                        $row_rol = mysqli_fetch_array($rol);
                                    } ?>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="nombre" value="<?php echo($nombre); ?>" placeholder="Nombre" required="required" autocomplete="off">
                </div>

                <div class="form-group">
                    <input type="number" class="form-control" name="precio" value="<?php echo($precio); ?>" placeholder="Precio" required="required" autocomplete="off" min="0" value="0" step=".01">
                </div>
                
                <div class="form-group">
                    <input type="number" class="form-control" name="existencia" value="<?php echo($existencia); ?>" placeholder="Existencia" required="required" autocomplete="off">
                </div>
            	
                <!--  <div class="form-group">
                    <input type="text" class="form-control" name="imagen" placeholder="cargar imagen" required="required" autocomplete="off">
                </div> -->
                                
                <div class="form-group">
                    <input type="submit" value="Actualizar" name="actualizar" class="btn btn-primary py-3 px-5" style="border-radius: 25px;" >
                    <input type="submit" value="Eliminar" name="eliminar" class="btn btn-primary py-3 px-5" style="border-radius: 25px;" >
                </div>
            </form>
        </div>
    
  </body>
<!-- loader -->
<div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/scrollax.min.js"></script>
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script> -->
<!-- <script src="js/google-map.js"></script> -->
<script src="js/main.js"></script>
<script type="text/javascript">
  function eliminar() {
    return window.confirm( '¿Eliminar?' );
  }
</script>
</html>