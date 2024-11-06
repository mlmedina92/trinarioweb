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
    $nombreTrabajaConNosotros = $_REQUEST['nameTrabajaConNosotros'];
    $emailTrabajaConNosotros = $_REQUEST['emailTrabajaConNosotros'];
    $telefonoTrabajaConNosotros = $_REQUEST['telefonoTrabajaConNosotros'];
    $asuntoTrabajaConNosotros = "Entrega de CV - Trinario";


    // Configurar la instancia de PHPMailer    
    // demian debe enviarnos los datos de envio de los formularios de esta web      
    $mailTrabajaConNosotros = new PHPMailer();
    $mailTrabajaConNosotros->isSMTP();
    $mailTrabajaConNosotros->Host = '';               // Host del servidor SMTP
    $mailTrabajaConNosotros->SMTPAuth = true;                       // Habilitar autenticación SMTP
    $mailTrabajaConNosotros->Username = '';       // Tu dirección de correo electrónico
    $mailTrabajaConNosotros->Password = '';       // Tu contraseña de correo electrónico
    $mailTrabajaConNosotros->SMTPSecure = 'tls';   // Habilitar cifrado TLS
    $mailTrabajaConNosotros->Port = 121222112212122121212121;               // Puerto SMTP

    // $mailTrabajaConNosotros->SMTPDebug = 2; // Modo depuración detallado
    // $mailTrabajaConNosotros->Debugoutput = 'html'; // Salida de depuración en HTML
    //generacion de body(contendo del correo)



    $body = "
    <html>
        <head>
            <title>$asuntoTrabajaConNosotros</title>
        </head>
        <body>
            <ul>
                <li><strong>Nombre:</strong> {$nombreTrabajaConNosotros}</li>
                <li><strong>Email:</strong> {$emailTrabajaConNosotros}</li>
                <li><strong>Teléfono:</strong> {$telefonoTrabajaConNosotros}</li>
            </ul>
        </body>
    </html>
";



    // Configurar el contenido del correo electrónico
    $mailTrabajaConNosotros->setFrom($emailTrabajaConNosotros, $nombreTrabajaConNosotros);
    $mailTrabajaConNosotros->addAddress('lm30540@gmail.com', 'Trinario');
    $mailTrabajaConNosotros->Subject = $asuntoTrabajaConNosotros;

    // Permite que el contenido del correo sea interpretado como HTML.
    $mailTrabajaConNosotros->isHTML(true);                             // Enviar el correo en formato HTML
    $mailTrabajaConNosotros->Body = $body;


    //CAPTURAMOS el archivo que llega desde el browser y queda en $_FILES
    if (isset($_FILES['my_fileTrabajaConNosotros']) && $_FILES['my_fileTrabajaConNosotros']['error'] == UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['my_fileTrabajaConNosotros']['tmp_name']; //Crea una ruta temporal del archivo
        $fileName = $_FILES['my_fileTrabajaConNosotros']['name']; //Asigna el nombre al archivo, sino aparecera "noname"
        $mailTrabajaConNosotros->addAttachment($fileTmpPath, $fileName); //le agrega el archivo al mail
    }


    // Procesar el envío del correo electrónico
    if (!$mailTrabajaConNosotros->send()) {
        $message = "El mensaje no pudo ser enviado.";
        $code='red';
    } else {
        $message = 'El mensaje pudo ser enviado';
        $code='green';
    }
    // Redirigir al archivo HTML con el mensaje
    header("Location: http://localhost/trinario_com/public/trabaja-con-nosotros.php?message=" . urlencode($message)."&code=" . urlencode($code));
    exit(); // salir después de redirigir
}
