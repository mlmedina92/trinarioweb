<!--  Obtener el mensaje de la URL -->
<?php $message = isset($_GET['message']) ? $_GET['message'] : ''; ?>
<?php $code = isset($_GET['code']) ? $_GET['code'] : 'red'; ?>

<?php
$page="trabaja";
$typepage="inner";
    $title="Trabaja con nosotros - Trinario";
    
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
    //                 <title>Trabaja con Nosotros - Trinario</title>
    //             </head>
    //             <body>
    //                 <table width="100%" border="0" cellspacing="5" cellpadding="1">
    //                     <tr>
    //                         <td colspan="2" align="left"><strong>Formulario Trabaja con Nosotros - Trinario</strong></td>
    //                     </tr>
    //                     <tr>
    //                         <td colspan="2" height="15"></td>
    //                     </tr>
    //                     <tr>
    //                         <td align="left" width="200"><b>Nombre y Apellidos:</b></td>
    //                         <td>'.$_POST['txtNombre'].'</td>
    //                     </tr>
    //                     <tr>
    //                         <td align="left" width="200"><b>Email:</b></td>
    //                         <td>'.$_POST['txtEmail'].'</td>
    //                     </tr>
    //                     <tr>
    //                         <td align="left" width="200"><b>Telefono de Contacto:</b></td>
    //                         <td>'.$_POST['txtTelefono'].'</td>
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
    //     $mail->SetFrom('rrhh@trinario.com', 'Trinario');
    //     $mail->AddReplyTo("rrhh@trinario.com","Trinario");
    //     $address = "rrhh@trinario.com";
    //     $mail->AddAddress($address, "Trinario");
    //     $mail->Subject = "Trabaja con nosotros - Trinario";
    //     $mail->AltBody = "Cuerpo alternativo del mensaje";
    //     $mail->MsgHTML($body);

    //     if (isset($_FILES['curriculum_file']) && $_FILES['uploaded_file']['error'] == UPLOAD_ERR_OK){
    //         $mail->AddAttachment($_FILES['curriculum_file']['tmp_name'], $_FILES['curriculum_file']['name']);
    //     }

    //     $allowed =  array('pdf', 'doc', 'docx');
    //     $filename = $_FILES['curriculum_file']['name']; 
    //     $ext = pathinfo($filename, PATHINFO_EXTENSION);
    //     if(!in_array($ext,$allowed) ) {
    //         $mensaje="Error. El archivo no es valido, solo se permiten achivos pdf o word.";
    //         $class="msg-error";
    //     }else{
    //         if(!$mail->Send()) {
    //             $mensaje="Error al enviar su curriculum: " . $mail­>ErrorInfo;
    //             $class="msg-error";
    //         } else {
    //             $mensaje="Su curriculum fue enviado correctamente. Gracias!";
    //             $class="msg-ok";
    //         }
    //     }

        
    // }
?>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/file-validator.js"></script>
<script type="text/javascript">
// $(document).ready(function() {
//     $("#frmPostula").validate({
//         rules: {
//             curriculum_file: {
//                 required: true,
//                 //extension: "pdf|doc|docx",
//                 accept: "pdf|doc|docx",
//                 /*fileType: {
//                     types: ["pdf", "doc", "docx"]
//                 },*/
//                 maxFileSize: {
//                     "unit": "MB",
//                     "size": 1
//                 },
//                 minFileSize: {
//                     "unit": "KB",
//                     "size": "1"
//                 }
//             }
//         }
//     });

//     $('#frmPostula .required').each(function() {
//         $(this).rules('add', {
//             messages: {
//                 required:  "Campo obligatorio",
//                 email:  "Ingrese un email válido"
//             }
//         });
//     });
// });
</script>
    <div id="slider">
        <img src="images/fondos/trabaja-con-nosotros.jpg">
    </div>
    <div id="content">
        <div class="col-left2">
            <h2 class="mbottom5">Trabaja con Nosotros</h2>
            <div class="separador mbottom30"></div>
            <!-- <?php
                // if($enviar=="send"){
            ?>
            <div class="<?php echo $class;?>"><?php echo $mensaje;?></div>
            <?php
                // }
            ?> -->
            <form name="formPostula" id="formPostula" action="sendEmail/mailerTrabajaConNosotros.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="form" id="form" value="send" />
                <div>
                    <label for="nameTrabajaConNosotros">Nombre y Apellidos:</label>
                    <input type="text" id="nameTrabajaConNosotros" name="nameTrabajaConNosotros" class="required" required>
                </div>
                <div class="ovh">
                    <div class="col-left">
                        <label for="emailTrabajaConNosotros">Email:</label>
                        <input type="email" name="emailTrabajaConNosotros" id="emailTrabajaConNosotros" class="required email" required>
                    </div>
                    <div class="col-right">
                        <label for="telefonoTrabajaConNosotros">Teléfono de Contacto:</label>
                        <input type="tel" name="telefonoTrabajaConNosotros" id="telefonoTrabajaConNosotros" class="txtsmall" required>
                    </div>
                </div>
                <div>
                    <label for="my_fileTrabajaConNosotros">Curriculum:</label>
                    <input type="file" name="my_fileTrabajaConNosotros" id="my_fileTrabajaConNosotros" accept="application/pdf, application/msword" required>
                </div>
                <span class="txtSmall">Sólo se aceptan arhivos tipo .doc, .docx, .pdf; Tamaño máximo: 1MB</span>
                <h3 style="color:<?php echo $code ?>"><?php echo $message; ?></h3>
                <input type="submit" name="cbEnviar" value="Postular" class="mtop20">
            </form>
        </div>
        <div class="col-right2">
            <div class="box beneficios">
                <h3 class="mbottom20">Beneficios para nuestros empleados</h3>
                <img src="images/mcdonals.png">
                <span class="bg-green">Descuentos Corporativos</span>
                <div class="bdotted mbottom20 mtop20"></div>
                <img src="images/plaza-vea.png"><br>
                <span class="bg-green mbottom10">Premios</span>
            </div>
        </div>
        <div class="clear"></div>
    </div>
<?php
    require_once("include/footer.php");
?>