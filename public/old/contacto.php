<?php
    require_once('includes/config.php');
    require_once('includes/PHPMailer/class.phpmailer.php');

    $body = '
        <html>
            <head>
                <title>Formulario Contacto - Factora</title>
            </head>
            <body>
                <table width="100%" border="0" cellspacing="5" cellpadding="1">
                    <tr>
                        <td colspan="2" align="left"><strong>Formulario Contacto - Factora</strong></td>
                    </tr>
                    <tr>
                        <td colspan="2" height="15"></td>
                    </tr>
                    <tr>
                        <td align="left" width="200"><b>Nombre y Apellidos:</b></td>
                        <td>'.$_REQUEST['txtNombre'].'</td>
                    </tr>
                    <tr>
                        <td align="left"><b>Email:</b></td>
                        <td>'.$_REQUEST['txtEmail'].'</td>
                    </tr>
                    <tr>
                        <td align="left"><b>Titulo:</b></td>
                        <td>'.$_REQUEST['txtTitulo'].'</td>
                    </tr>
                    <tr>
                        <td align="left"><b>Mensaje:</b></td>
                        <td>'.$_REQUEST['txtMensaje'].'</td>
                    </tr>
                    <tr>
                        <td align="left"><b>Telefono de Contacto:</b></td>
                        <td>'.$_REQUEST['txtTelefono'].'</td>
                    </tr>
                    <tr>
                        <td align="left"><b>Persona de Contacto:</b></td>
                        <td>'.$_REQUEST['txtPersona'].'</td>
                    </tr>
                </table>
            </body>
        </html>';

    $mail = new PHPMailer();
    $mail->IsSMTP();
    $mail->SMTPAuth = true;
    $mail->Port = 25;
    $mail->Host = MAIL_HOST;
    $mail->Username = MAIL_USER;
    $mail->Password = MAIL_PASS;
    $mail->Timeout=30;
    $mail->SetFrom('info@factora.net', 'Factora');
    $mail->AddReplyTo("info@factora.net","Factora");
    $mail->Subject = "Formulario Contacto - Factora";
    $mail->AltBody = "Cuerpo alternativo del mensaje";
    $mail->MsgHTML($body);
    $address = "info@factora.net";
    //$address = "max.r2r@gmail.com";
    $mail->AddAddress($address, "Factora");

    $mail->Send();
?>