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

// $enviar="";
// if (!empty($_POST['form'])) {
//     $enviar=$_POST["form"];
// }

// if($enviar=="send"){
//     $body = '
//         <html>
//             <head>
//                 <title>Formulario Contacto - Trinario</title>
//             </head>
//             <body>
//                 <table width="100%" border="0" cellspacing="5" cellpadding="1">
//                     <tr>
//                         <td colspan="2" align="left"><strong>Formulario Contacto - Trinario</strong></td>
//                     </tr>
//                     <tr>
//                         <td colspan="2" height="15"></td>
//                     </tr>
//                     <tr>
//                         <td align="left" width="200"><b>Nombre y Apellidos:</b></td>
//                         <td>'.$_POST['txtNombre'].'</td>
//                     </tr>
//                     <tr>
//                         <td align="left"><b>Email:</b></td>
//                         <td>'.$_POST['txtEmail'].'</td>
//                     </tr>
//                     <tr>
//                         <td align="left"><b>Titulo:</b></td>
//                         <td>'.$_POST['txtTitulo'].'</td>
//                     </tr>
//                     <tr>
//                         <td align="left"><b>Mensaje:</b></td>
//                         <td>'.$_POST['txtMensaje'].'</td>
//                     </tr>
//                     <tr>
//                         <td align="left"><b>Telefono Contacto:</b></td>
//                         <td>'.$_POST['txtTelefonoContacto'].'</td>
//                     </tr>
//                     <tr>
//                         <td align="left"><b>Persona Contacto:</b></td>
//                         <td>'.$_POST['txtPersonaContacto'].'</td>
//                     </tr>
//                 </table>
//             </body>
//         </html>';

//     $mail = new PHPMailer();
//     $mail->IsSMTP();
//     $mail->SMTPAuth = true;
//     $mail->Port = 25;
//     $mail->Host = MAIL_HOST;
//     $mail->Username = MAIL_USER;
//     $mail->Password = MAIL_PASS;
//     $mail->Timeout=30;
//     $mail->SetFrom('contacto@trinario.com', 'Trinario');
//     $mail->AddReplyTo("contacto@trinario.com","Trinario");
//     $mail->Subject = "Formulario Contacto - Trinario";
//     $mail->AltBody = "Cuerpo alternativo del mensaje";
//     $mail->MsgHTML($body);
//     $address = "contacto@trinario.com";
//     //$address = "liliana.uchalin@gmail.com";
//     $mail->AddAddress($address, "Trinario");

//     if(!$mail->Send()) {
//         var_dump($mail->ErrorInfo);
//         $mensaje="Error al enviar el mensaje!";
//         $class="msg-error";
//     } else {
//         $mensaje="Su mensaje fue enviado correctamente. Gracias!";
//         $class="msg-ok";
//     }
// }
?>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="http://maps.google.com/maps/api/js"></script>
<script type="text/javascript" src="js/jquery.gmap.js"></script>
<script type="text/javascript">
    /* $(document).ready(function() {
    $("#frmContacto").validate();

    $('#frmContacto .required').each(function() {
        $(this).rules('add', {
            messages: {
                required:  "Campo obligatorio",
                email:  "Ingrese un email válido"
            }
        });
    });

    $('#map_addresses').gMap({
        zoom: 18,
        arrowStyle: 2,
        maptype: 'SATELLITE',
        controls: {
            panControl: true,
            zoomControl: true,
            mapTypeControl: true,
            scaleControl: false,
            streetViewControl: true,
            overviewMapControl: false
        },
        markers:[
            {
                latitude: -34.757596,
                longitude: -58.400389,
                popup: false
            }
        ]
    });
}); */
</script>
<div id="slider">
    <img src="images/fondos/contacto.jpg">
</div>
<div id="content">
    <div class="col-left">
        <h2 class="mbottom5">Contáctenos</h2>
        <div class="separador mbottom30"></div>

        <form action="contacto.php" method="post" id="formContacto" name="formContacto" class="frmcontact">
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