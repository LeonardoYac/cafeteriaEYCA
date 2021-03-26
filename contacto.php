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
            	<h1 class="mb-3 mt-5 bread">Comunícate con nosotros</h1>
	            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Inicio</a></span> <span>Contacto</span></p>
            </div>

          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section contact-section">
      <div class="container mt-5">
        <div class="row block-9">
					<div class="col-md-4 contact-info ftco-animate">
						<div class="row">
							<div class="col-md-12 mb-4">
	              <h2 class="h4">Información de Contacto</h2>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Direccion:</span> Panajachel, Atitlán, Sololá, Guatemala</p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Telefono:</span> <a href="https://wa.me/50230722200?text=Me%20gustaria%20ampliar%20informacion">+502 3072 2200</a></p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Email:</span> <a href="mailto:info@cafeteriaeyca.com">info@cafeteriaeyca.com</a></p>
	            </div>
	            <div class="col-md-12 mb-3">
	              <p><span>Sitio Web:</span> <a href="#">cafeteriaEYCA.com.gt</a></p>
	            </div>
						</div>
					</div>
					<div class="col-md-1"></div>
          <div class="col-md-6 ftco-animate">
            <form action="#" class="contact-form">
            	<div class="row">
            		<div class="col-md-6">
	                <div class="form-group">
	                  <input type="text" class="form-control" placeholder="Nombre">
	                </div>
                </div>
                <div class="col-md-6">
	                <div class="form-group">
	                  <input type="text" class="form-control" placeholder="Email">
	                </div>
	                </div>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Asunto">
              </div>
              <div class="form-group">
                <textarea name="" id="" cols="30" rows="7" class="form-control" placeholder="Mensaje"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Enviar Mensaje" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <div id="map"></div>

    <?php include('footer.php');  ?>
    
  </body>
</html>