<?php require_once('configuracion/conexionDB.php'); ?>
<?php 
    if (!isset($_SESSION)) {
        session_start();
    }

     $mensaje="";
    /*if(isset($_SESSION['errorNewUser'])){
        $mensaje = $_SESSION['errorNewUser'];
    } */

    $elUsuario=""; // usuario repetido. 

    $usuarioLogin = "";

    $nombre = "";
    $fechaNac = "";
    $correo = "";
    $nomUser = "";
    $contra = "";
    $direccion ="";
    $telefono = "";

    if(isset($_SESSION['MM_Username'])){
        $usuarioLogin = $_SESSION['MM_Username'];

        //if ($usuarioLogin!=0) {
            $query="SELECT * FROM usuario WHERE nombre_usuario= '$usuarioLogin' ";
            $verRU = mysqli_query($webshop_connect,$query);
            $row_verRU = mysqli_fetch_array($verRU);

            do {
                // datos del login de usuarios 
                $nombre    = $row_verRU["nombre"];
                $fechaNac  = $row_verRU["fecha_nac"];
                $correo    = $row_verRU["correo"];
                $nomUser   = $row_verRU["nombre_usuario"];
                $contra    = $row_verRU["contrasenya"];
                $direccion = $row_verRU["direccion"];
                $telefono  = $row_verRU["telefono"];

            } while ($row_verRU = mysqli_fetch_array($verRU));
        //}
    }

     

?>
<?php include('head.php');  ?>
<!DOCTYPE html>
<html lang="en">
    <body>
        <div class="row slider-text justify-content-center align-items-center"><br><br></div>
        <h1 class="mb-4" style="text-align:center; margin-top:50px;"><?php echo($mensaje); ?></h1>
        <div class="row slider-text justify-content-center align-items-center" style="margin-top:50px;">
            <form action="usuario_actualizar.php" class="contact-form" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" name="nombre" value="<?php echo($nombre); ?>" placeholder="Nombre Completo" required="required" autocomplete="off">
                </div>

                <div class="form-group">
                    <input type="date" class="form-control" name="fechaNac" value="<?php echo($fechaNac); ?>" placeholder="Fecha de Nacimiento" required="required" autocomplete="off">
                </div>
                
                <div class="form-group">
                    <input type="email" class="form-control" name="correo" value="<?php echo($correo); ?>" placeholder="Correo Electronico" required="required" autocomplete="off">
                </div>
            	
                <div class="row">
            		<div class="col-md-6">
	                    <div class="form-group">
	                        <input type="text" class="form-control" name="nombreUser" value="<?php echo($nomUser); ?>" placeholder="Nombre de Usuario" required="required" autocomplete="off"> <?php echo($elUsuario); ?>
	                    </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="password" class="form-control" name="contrasenya" value="<?php echo($contra); ?>" placeholder="Contraseña" required="required" autocomplete="off">
                        </div>
	                </div>
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="direccion" value="<?php echo($direccion); ?>" placeholder="Dirección" required="required" autocomplete="off">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="telefono" value="<?php echo($telefono); ?>" placeholder="Telefono" required="required" autocomplete="off">
                </div>
                                
                <div class="form-group">
                    <input type="submit" value="GUARDAR" name="guardar" class="btn btn-primary py-3 px-5" style="border-radius: 25px;" >
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