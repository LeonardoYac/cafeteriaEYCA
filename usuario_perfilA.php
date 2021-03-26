<?php require_once('configuracion/conexionDB.php'); ?>
<?php 
    if (!isset($_SESSION)) {
        session_start();
    }

    $mensaje="";
    if(isset($_SESSION['actualizado'])){
        $mensaje = $_SESSION['actualizado'];
    }

    $elUsuario=""; // usuario repetido. 

    $nombre = "";
    $fechaNac = "";
    $correo = "";
    $nomUser = "";
    $contra = "";
    $mirol    = "";
    $rolNombre ="ROL";
    $direccion ="";
    $telefono = "";

    if(isset($_POST['buscar'])){
        $id_usuario = 0;
        if(isset($_POST['elUsuarioActualForm'])){
            $_SESSION['elUsuarioActualForm'] = $_POST['elUsuarioActualForm'];
            $id_usuario = $_POST['elUsuarioActualForm'];
        }
        
        $mensaje="Usuarios";
        
        if($id_usuario != 0){
            $query="SELECT * FROM usuario WHERE id_usuario= '$id_usuario' ";
            $verRU = mysqli_query($webshop_connect,$query);
            $row_verRU = mysqli_fetch_array($verRU);

            do {
                // datos del login de usuarios 
                $nombre    = $row_verRU["nombre"];
                $fechaNac  = $row_verRU["fecha_nac"];
                $correo    = $row_verRU["correo"];
                $nomUser   = $row_verRU["nombre_usuario"];
                $contra    = $row_verRU["contrasenya"];
                $mirol     = $row_verRU["rol_usuario"];
                $direccion = $row_verRU["direccion"];
                $telefono  = $row_verRU["telefono"];

            } while ($row_verRU = mysqli_fetch_array($verRU));

            //******************************************************************************* */
            $query2="SELECT * FROM rol WHERE id_rol= '$mirol' ";
            $verRU2 = mysqli_query($webshop_connect,$query2);
            $row_verRU2 = mysqli_fetch_array($verRU2);

            do {
                // datos del rol
                $rolNombre = $row_verRU2["descripcion"];

            } while ($row_verRU2 = mysqli_fetch_array($verRU2));

        }
        
    }


    //*************************************************************************************************************
    $mv0=0;

    $query_rol = "SELECT * FROM rol ORDER BY id_rol ASC";
    $rol = mysqli_query($webshop_connect,$query_rol);
    $row_rol = mysqli_fetch_array($rol);
    $totalRows_rol = mysqli_num_rows($rol);
    //*************************************************************************************************************
    $query_usuario = "SELECT * FROM usuario ORDER BY id_usuario ASC";
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
            <form action="usuario_perfilA.php" class="" method="post">
                <select class="form-select form-control" aria-label="Default select example" name="elUsuarioActualForm">
                    <option style="background:black;" value="0" <?php if (!(strcmp(0, $mv0))) {echo "selected=\"selected\"";} ?>> USUARIOS </option>
                    <?php do { ?>
                        <option style="background:black;" value="<?php echo $row_usuario['id_usuario']?>"<?php if (!(strcmp($row_usuario['id_usuario'], $mv0))) {echo "selected=\"selected\"";} ?>><?php echo $row_usuario['nombre']."  [".$row_usuario['nombre_usuario']."] "; ?></option>
                            
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
            <form action="usuario_actualizarA.php" onsubmit="return eliminar()" class="contact-form" method="post">

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
                    <select class="form-select form-control" aria-label="Default select example" name="mirol">
                        <option style="background:black;" value="<?php echo($mirol);?>" <?php if (!(strcmp(0, $mv0))) {echo "selected=\"selected\"";} ?>><?php echo($rolNombre);?></option>
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
                    <input type="text" class="form-control" name="direccion" value="<?php echo($direccion); ?>" placeholder="Dirección" required="required" autocomplete="off">
                </div>

                <div class="form-group">
                    <input type="text" class="form-control" name="telefono" value="<?php echo($telefono); ?>" placeholder="Telefono" required="required" autocomplete="off">
                </div>
                                
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