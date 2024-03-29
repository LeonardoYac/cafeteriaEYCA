<?php require_once('configuracion/conexionDB.php'); ?>
<?php 
    if (!isset($_SESSION)) {
        session_start();
    }

    $mensaje="";
    if(isset($_SESSION['mensaje_usuarioNuevo'])){
        $mensaje = $_SESSION['mensaje_usuarioNuevo'];
    }else{
        $mensaje = "Agregar un nuevo Usuario";
    }

    $elUsuario=""; // usuario repetido. 
    //****************************************************************************************************** */
    $mv0=0;

    $query_rol = "SELECT * FROM rol ORDER BY id_rol ASC";
    $rol = mysqli_query($webshop_connect,$query_rol);
    $row_rol = mysqli_fetch_array($rol);
    $totalRows_rol = mysqli_num_rows($rol);


?>
<?php include('head.php');  ?>
<!DOCTYPE html>
<html lang="en">
    <body>
        <div class="row slider-text justify-content-center align-items-center"><br><br></div>
        <h1 class="mb-4" style="text-align:center; margin-top:50px;"><?php echo($mensaje); ?></h1>
        <div class="row slider-text justify-content-center align-items-center" style="margin-top:50px;">
            <form action="usuario_crearA.php" class="contact-form" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="nombre" placeholder="Nombre Completo" required="required" autocomplete="off">
                </div>

                <div class="form-group">
                    <input type="date" class="form-control" name="fechaNac" placeholder="Fecha de Nacimiento" required="required" autocomplete="off">
                </div>
                
                <div class="form-group">
                    <input type="email" class="form-control" name="correo" placeholder="Correo Electronico" required="required" autocomplete="off">
                </div>
            	
                <div class="row">
            		<div class="col-md-6">
	                    <div class="form-group">
	                        <input type="text" class="form-control" name="nombreUser" placeholder="Nombre de Usuario" required="required" autocomplete="off"> <?php echo($elUsuario); ?>
	                    </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="password" class="form-control" name="contrasenya" placeholder="Contraseña" required="required" autocomplete="off">
                        </div>
	                </div>
                </div>

                <div class="form-group">
                    <select class="form-select form-control" aria-label="Default select example" name="rol">
                        <option style="background:black;" value="0" <?php if (!(strcmp(0, $mv0))) {echo "selected=\"selected\"";} ?>>rol ...</option>
                        <?php do { ?>
                        <option style="background:black;" value="<?php echo $row_rol['id_rol']?>"<?php if (!(strcmp($row_rol['id_rol'], $mv0))) {echo "selected=\"selected\"";} ?>><?php echo $row_rol['descripcion']; ?></option>
                        
                        <?php } while ($row_rol = mysqli_fetch_array($rol));
                                    $rows = mysqli_num_rows($rol);
                                    if($rows > 0) {
                                        mysqli_data_seek($rol, 0);
                                        $row_rol = mysqli_fetch_array($rol);
                                    } ?>
                    </select>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="direccion" placeholder="Dirección" required="required" autocomplete="off">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="telefono" placeholder="Telefono" required="required" autocomplete="off">
                </div>
                                
                <div class="form-group">
                    <input type="submit" value="REGISTRAR" name="registrarA" class="btn btn-primary py-3 px-5" style="border-radius: 25px;" >
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
<script>
 /*    window.onbeforeunload = function(e) {
        return "You have some unsaved changes";
       
    }; */
</script>
</html>