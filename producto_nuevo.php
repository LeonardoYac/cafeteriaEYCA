<?php require_once('configuracion/conexionDB.php'); ?>
<?php 
    if (!isset($_SESSION)) {
        session_start();
    }

    $mensaje="";
    if(isset($_SESSION['mensaje_producto'])){
        $mensaje = $_SESSION['mensaje_producto'];
    }else{
        $mensaje = "Agregar nuevo Producto";
    }

    $elUsuario=""; // usuario repetido. 
    //****************************************************************************************************** */
    $mv0=0;

    $query_rol = "SELECT * FROM categoria ORDER BY id_categoria ASC";
    $rol = mysqli_query($webshop_connect,$query_rol);
    $row_rol = mysqli_fetch_array($rol);
    $totalRows_rol = mysqli_num_rows($rol);


?>
<?php include('head.php');  ?>
<!DOCTYPE html>
<html lang="en">
    <body>
        <section class="home-slider owl-carousel">

            <div class="slider-item" style="background-image: url(images/bg_3.jpg);" data-stellar-background-ratio="0.5">
                <div class="overlay"></div>
            <div class="container">
                <div class="row slider-text justify-content-center align-items-center">

                <div class="col-md-7 col-sm-12 text-center ftco-animate">
                    <h1 class="mb-3 mt-5 bread">Nuevos Productos</h1>
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Inicio</a></span> <span>Listas</span></p>
                </div>

                </div>
            </div>
            </div>
        </section>

        <div class="row slider-text justify-content-center align-items-center"><br><br></div>
        <h1 class="mb-4" style="text-align:center; margin-top:50px;"><?php echo($mensaje); ?></h1>
        <div class="row slider-text justify-content-center align-items-center" style="margin-top:50px;">
            <form action="producto_crear.php" class="contact-form" method="post">
                
                <div class="form-group">
                    <select class="form-select form-control" aria-label="Default select example" name="categoria">
                        <option style="background:black;" value="0" <?php if (!(strcmp(0, $mv0))) {echo "selected=\"selected\"";} ?>>CATEGORIA -></option>
                        <?php do { ?>
                        <option style="background:black;" value="<?php echo $row_rol['id_categoria']?>"<?php if (!(strcmp($row_rol['id_categoria'], $mv0))) {echo "selected=\"selected\"";} ?>><?php echo $row_rol['descripcion']; ?></option>
                        
                        <?php } while ($row_rol = mysqli_fetch_array($rol));
                                    $rows = mysqli_num_rows($rol);
                                    if($rows > 0) {
                                        mysqli_data_seek($rol, 0);
                                        $row_rol = mysqli_fetch_array($rol);
                                    } ?>
                    </select> <br>
                    <div class="form-group">
                        <input type="submit" value="nueva categoria" name="nuevacategoria" class="btn btn-primary py-2 px-3" style="border-radius: 25px;" >
                    </div>
                </div>
            
            
                <div class="form-group">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required="required" autocomplete="off">
                </div>

                <div class="form-group">
                    <input type="number" class="form-control" name="precio" placeholder="Precio" required="required" autocomplete="off" min="0" value="0" step=".01">
                </div>
                
                <div class="form-group">
                    <input type="number" class="form-control" name="existencia" placeholder="Existencia" required="required" autocomplete="off">
                </div>
            	
                
               <!--  <div class="form-group">
                    <input type="text" class="form-control" name="imagen" placeholder="cargar imagen" required="required" autocomplete="off">
                </div> -->
                                
                <div class="form-group">
                    <input type="submit" value="Agregar Producto" name="nuevoproducto" class="btn btn-primary py-3 px-5" style="border-radius: 25px;" >
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

</html>