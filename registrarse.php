<?php include('head.php');  ?>
<!DOCTYPE html>
<html lang="en">
    <body>
        <div class="row slider-text justify-content-center align-items-center"><br><br><br><br></div>
        
        <div class="row slider-text justify-content-center align-items-center" style="margin-top:50px;">
            <form action="inicioSesion.php" class="contact-form" method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Usuario" name="usuario" autocomplete="off">
                </div>

                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Contraseña" name="contrasenya" autocomplete="off">
                </div>

                <div class="form-group">
                    <input type="submit" value="Iniciar sesión" name="iniciarSesion" class="btn btn-primary py-3 px-5">
                </div>

                <div class="form-group">
                    <!-- <input type="password" class="form-control" placeholder="Contraseña"> -->
                    <p>---------- o ----------</p>
                </div>

                <div class="form-group" style="margin-left:5px;">
                    <input type="submit" value="Registrarse" name="registrarse" class="btn btn-primary py-3 px-5" style="border-radius: 25px;">
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