<?php

date_default_timezone_set('America/Guatemala');
$miDate = date("m/d/Y H:i:s");

    if(isset($_POST['enviar'])){
        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['subject']) ){
            $nombre  = $_POST['name'];
            $mail    = $_POST['email'];
            $subject = $_POST['subject'];
            $oMensaje= $_POST['message'];
            
            $header = 'From: ' . $mail . " \r\n";
            $header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
            $header .= "Mime-Version: 1.0 \r\n";
            $header .= "Content-Type: text/plain";
            
            $mensaje = "Nombre: " . $nombre . ",\r\n";
            $mensaje .= "Email: " . $mail . " \r\n";
            $mensaje .= "Telefono: " . $subject . " \r\n";
            $mensaje .= "Mensaje: " . $_POST['message'] . " \r\n \r\n \r\n";
            $mensaje .= "Fecha: " . $miDate;//date('m/d/Y', time());
            
            $para = 'alejandroyac333@gmail.com';
            $asunto = 'Mensaje de mi sitio web';
            $miMail = @mail($para, $asunto, utf8_decode($mensaje), $header);  /* @ al inicio es para que no funcione xd */
            
            if(!$miMail){ /* se coloca en falso para hacer pruebas... [real quitar el !] */
                echo "<script>alert('MENSAJE ENVIADO');</script>";
                header("Location:index.php");   
            }
        }    
    }

?>