<?php

use PHPMailer\PHPMailer\PHPMailer;

include 'PHPMailer-master/src/PHPMailer.php';
include 'PHPMailer-master/src/SMTP.php';
include 'PHPMailer-master/src/Exception.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    //Llamar a la función si la request es de tipo POST
    sendEmail();
}

function sendEmail()
{
    // Recibir datos del formulario 
    $nombreFormContactoGeneral = $_REQUEST['nameFormContactoGeneral'];
    $emailFormContactoGeneral = $_REQUEST['emailFormContactoGeneral'];
    $mensajeFormContactoGeneral = $_REQUEST['messageFormContactoGeneral'];
    $asuntoFormContactoGeneral = $_REQUEST['asuntoFormContactoGeneral'];
    $personaFormContactoGeneral = $_REQUEST['personaFormContactoGeneral'];
    $telefonoFormContactoGeneral = $_REQUEST['telefonoFormContactoGeneral'];

// demian no me paso aun las credenciales de envio 
    // Configurar la instancia de PHPMailer         
    $mailFormContactoGeneral = new PHPMailer();
    $mailFormContactoGeneral->isSMTP();
    $mailFormContactoGeneral->Host = 'mail.smtp2go.com';               // Host del servidor SMTP
    $mailFormContactoGeneral->SMTPAuth = true;                         // Habilitar autenticación SMTP
    $mailFormContactoGeneral->Username = 'webform@trinario.com';        // Tu dirección de correo electrónico
    $mailFormContactoGeneral->Password = 'wKngkxzU0iBgvuWs';           // Tu contraseña de correo electrónico
    $mailFormContactoGeneral->SMTPSecure = 'tls';                      // Habilitar cifrado TLS
    $mailFormContactoGeneral->Port = 587;                              // Puerto SMTP

    // $mailFormContactoGeneral->SMTPDebug = 2; // Modo depuración detallado
    // $mailFormContactoGeneral->Debugoutput = 'html'; // Salida de depuración en HTML
    //generacion de body(contendo del correo)



    $body = "
        <html>
            <head>
                <title>$asuntoFormContactoGeneral</title>
            </head>
            <body>
                <ul>
                    <li><strong>Nombre:</strong> {$nombreFormContactoGeneral}</li>
                    <li><strong>Email:</strong> {$emailFormContactoGeneral}</li>
                    <li><strong>Descripcion:</strong> {$mensajeFormContactoGeneral}</li>
                    <li><strong>Persona de Contacto:</strong> {$personaFormContactoGeneral}</li>
                    <li><strong>Telefono:</strong> {$telefonoFormContactoGeneral}</li>
                </ul>
            </body>
        </html>
    ";



    // Configurar el contenido del correo electrónico
    $mailFormContactoGeneral->setFrom($emailFormContactoGeneral, $nombreFormContactoGeneral);
    $mailFormContactoGeneral->addAddress('contacto@trinario.com', 'Contacto - Trinario');
    $mailFormContactoGeneral->Subject = $asuntoFormContactoGeneral;

    // Permite que el contenido del correo sea interpretado como HTML.
    $mailFormContactoGeneral->isHTML(true);                             // Enviar el correo en formato HTML
    $mailFormContactoGeneral->Body = $body;


  

    // Procesar el envío del correo electrónico
    if (!$mailFormContactoGeneral->send()) {
        $message = "Su mensaje no ha sido enviado";
        $code = 'red';
    } else {
        $message = 'Su mensaje ha sido enviado.';
        $code = 'green';
    }

    //creamos la url de manera dinamica
    $url = "https://trinario.com/contacto.php?messageContacto=" . urlencode($message) . "&code=" . urlencode($code);
    // Redirigir al archivo HTML con el mensaje
    header("Location: " . $url);
    exit(); // salir después de redirigir
}
