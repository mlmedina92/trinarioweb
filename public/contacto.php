<!--  Obtener el mensaje de la URL -->
<?php $messageContacto = isset($_GET['messageContacto']) ? $_GET['messageContacto'] : ''; ?>
<?php $code = isset($_GET['code']) ? $_GET['code'] : ''; ?>

<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$page = "contacto";
$typepage = "inner";
$title = "Contacto - Trinario";

// require_once('include/config.php');
// require_once('include/PHPMailer/class.phpmailer.php');
require_once("include/header.php");


?>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
<script type="text/javascript" src="js/jquery.gmap.js"></script>
<script type="text/javascript"></script>

<div id="slider">
    <img src="images/fondos/contacto.jpg">
</div>
<div id="content">
    <div class="col-left">
        <h2 class="mbottom5">Contáctenos</h2>
        <div class="separador mbottom30"></div>

        <form action="sendEmail/mailerFormContactoGeneral.php" method="POST" id="formContacto" name="formContacto" class="frmcontact">
            <input type="hidden" name="form" id="form" value="send" />

            <label for="nameFormContactoGeneral">Nombre / Empresa:</label>
            <input type="text" name="nameFormContactoGeneral" id="nameFormContactoGeneral" class="required" required>

            <label for="emailFormContactoGeneral">Email:</label>
            <input type="email" name="emailFormContactoGeneral" id="emailFormContactoGeneral" class="required email" required>

            <label for="asuntoFormContactoGeneral">Título:</label>
            <input type="text" id="asuntoFormContactoGeneral" name="asuntoFormContactoGeneral" required>

            <label for="messageFormContactoGeneral">Mensaje:</label>
            <textarea name="messageFormContactoGeneral" id="messageFormContactoGeneral" class="required" rows="4" required></textarea>

            <div class="ovh">
                <div class="col-left">
                    <label for="personaFormContactoGeneral">Persona de Contacto:</label>
                    <input type="text" name="personaFormContactoGeneral" id="personaFormContactoGeneral" required>
                </div>
                <div class="col-right">
                    <label for="telefonoFormContactoGeneral">Télefono de Contacto:</label>
                    <input type="tel" name="telefonoFormContactoGeneral" id="telefonoFormContactoGeneral" class="txtsmall" required>
                </div>
            </div>
            <h3 style="color:<?php echo $code ?>"><?php echo $messageContacto; ?></h3>
            <article>
                <div class="g-recaptcha" data-sitekey="6LcSd7wqAAAAAK3XYRysCF4eg-4GsPlRrcFdKqHg"></div>
            </article>


            <input type="submit" name="cbEnviar" value="Enviar" class="mtop10">
        </form>
    </div>
    <div class="col-right">
        <h3>Datos de Contacto</h3>
        <p class="contact address"><span class="icon"></span>Conesa 812 8° A C1426AQR Ciudad Autónoma de Buenos Aires, Argentina</p>
        <p class="contact phone"><span class="icon"></span>Tel: +54 (11) 3986-3249</p>
        <p class="contact mail"><span class="icon"></span>Email: info@trinario.com</p>
        <p class="contact whatsapp" id="whatsapp"><span class="icon"></span>+54 9 11 50041236</p>
        <h3 class="mtop20">Ubicación</h3>
        <div class="map-wrapper">
            <div class="gmap">
                <div id="map_addresses" class="map">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3289.769049230114!2d-58.456023684771296!3d-34.56613518046966!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb5ddc469f11d%3A0xeb080fb34e1ac979!2sConesa%20812%2C%20C1426AQR%20CABA%2C%20Argentina!5e0!3m2!1sen!2sus!4v1673647262608!5m2!1sen!2sus"
                        style="border:0; width: 100%; height: 100%;"
                        allowfullscreen=""
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
    <div class="clear"></div>
</div>
<?php
require_once("include/footer.php");
?>