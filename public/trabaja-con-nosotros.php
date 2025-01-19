<!--  Obtener el mensaje de la URL -->
<?php $message = isset($_GET['message']) ? $_GET['message'] : ''; ?>
<?php $code = isset($_GET['code']) ? $_GET['code'] : 'red'; ?>

<?php
$page = "trabaja";
$typepage = "inner";
$title = "Trabaja con nosotros - Trinario";
// require_once('include/config.php');
// require_once('include/PHPMailer/class.phpmailer.php');
require_once("include/header.php");

?>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script type="text/javascript" src="js/file-validator.js"></script>
<script type="text/javascript">
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
            <div class="<?php echo $class; ?>"><?php echo $mensaje; ?></div>
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
            <article>
                <div class="g-recaptcha" data-sitekey="6LcSd7wqAAAAAK3XYRysCF4eg-4GsPlRrcFdKqHg"></div>
            </article>
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