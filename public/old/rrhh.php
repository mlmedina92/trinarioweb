<?php
    ini_set('display_errors', 1); 
    error_reporting(E_ALL);
    require_once('includes/config.php');
    require_once('includes/PHPMailer/class.phpmailer.php');

    $body = '
        <html>
            <head>
                <title>Trabaja con Nosotros - Factora</title>
            </head>
            <body>
                <table width="100%" border="0" cellspacing="5" cellpadding="1">
                    <tr>
                        <td colspan="2" align="left"><strong>Formulario Trabaja con Nosotros - Factora</strong></td>
                    </tr>
                    <tr>
                        <td colspan="2" height="15"></td>
                    </tr>
                    <tr>
                        <td align="left" width="200"><b>Nombre y Apellidos:</b></td>
                        <td>'.$_POST['txtNombre'].'</td>
                    </tr>
                    <tr>
                        <td align="left" width="200"><b>Email:</b></td>
                        <td>'.$_POST['txtEmail'].'</td>
                    </tr>
                    <tr>
                        <td align="left" width="200"><b>Telefono de Contacto:</b></td>
                        <td>'.$_POST['txtTelefono'].'</td>
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
    $mail->Subject = "Trabaja con nosotros - Factora";
    $mail->AltBody = "Cuerpo alternativo del mensaje";
    $mail->MsgHTML($body);
    //$address = rh@factora.net";
    $address = "info@factora.net";
    $mail->AddAddress($address, "Factora");
    if(is_array($_FILES)) {
        $mail->AddAttachment($_FILES['curriculum_file']['tmp_name'],$_FILES['curriculum_file']['name']); 
    }

    $allowed =  array('pdf', 'doc', 'docx');
    $filename = $_FILES['curriculum_file']['name']; 
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($ext,$allowed) ) {
        echo json_encode(array('state' => 'error','message'=> 'Archivo no permitido.'));
    }else{
        if(!$mail->Send()) {
            var_dump($mail->ErrorInfo);
            echo json_encode(array('state' => 'error','message'=> 'Error al enviar su currículum.'));
        } else {
            echo json_encode(array('state' => 'success','message'=> 'Su currículum fue enviado correctamente. Gracias!'));
        }
    }
    
?>