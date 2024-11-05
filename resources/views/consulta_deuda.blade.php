<!DOCTYPE html>
<html lang="en-us">
    <head>
        <meta charset="utf-8">
        <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
        <title>Trinario.com</title>
        <meta name="description" content="">
        <meta name="author" content="by Bud Spencer">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" type="text/css" media="screen" href="{!! asset('css/bootstrap.min.css') !!}">
        <link rel="stylesheet" type="text/css" media="screen" href="{!! asset('css/font-awesome.min.css') !!}">
        <link rel="stylesheet" type="text/css" media="screen" href="{!! asset('css/smartadmin-production-plugins.min.css') !!}">
        <link rel="stylesheet" type="text/css" media="screen" href="{!! asset('css/smartadmin-production.min.css') !!}">

<!--        <link rel="stylesheet" type="text/css" media="screen" href="css/demo.min.css">-->

        <link rel="shortcut icon" href="{!! asset('img/favicon/favicon.ico') !!}" type="image/x-icon">
        <link rel="icon" href="{!! asset('img/favicon/favicon.ico') !!}" type="image/x-icon">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,700italic,300,400,700">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <link href="images/favicon.ico" rel="shortcut icon" type="image/vnd.microsoft.icon">
        <style>
            .fj-date{z-index:9999 !important}
            .float{
                position:fixed;
                width:60px;
                height:60px;
                bottom:40px;
                right:40px;
                background-color:#25d366;
                color:#FFF;
                border-radius:50px;
                text-align:center;

                font-size:30px;
                box-shadow: 2px 2px 3px #999;
                z-index:100;
            }

            .whatsapp{
                font-family: 'open-sans-bold';
                margin-left: 20px;
                padding-left: 45px;
                padding-bottom: 4px;
                background:url("{!! asset('images/whatsapp.png') !!}") left top no-repeat;
                color: #29A22D;
                text-align: left;
            }


            .map-container-3{
                overflow:hidden;
                padding-bottom:56.25%;
                position:relative;
                height:0;
                }
                .map-container-3 iframe{
                left:0;
                top:0;
                height:100%;
                width:100%;
                position:absolute;
                }


            .text {
                  font-family:helvetica;
                  font-weight:bold;
                  color:#FAF8F8;
                  text-transform:uppercase;
                }
                .parpadea {

                  animation-name: parpadeo;
                  animation-duration: 1s;
                  animation-timing-function: linear;
                  animation-iteration-count: infinite;

                  -webkit-animation-name:parpadeo;
                  -webkit-animation-duration: 1s;
                  -webkit-animation-timing-function: linear;
                  -webkit-animation-iteration-count: infinite;
                }

                @-moz-keyframes parpadeo{
                  0% { opacity: 1.0; }
                  50% { opacity: 0.0; }
                  100% { opacity: 1.0; }
                }

                @-webkit-keyframes parpadeo {
                  0% { opacity: 1.0; }
                  50% { opacity: 0.0; }
                   100% { opacity: 1.0; }
                }

                @keyframes parpadeo {
                  0% { opacity: 1.0; }
                   50% { opacity: 0.0; }
                  100% { opacity: 1.0; }
                }
        </style>
    </head>

    <body class="no-menu">
        <header id="header" style="height: 100px;">
            <div id="logo-group">
                <span id="logo"> <img src="images/logo.png" alt="SmartAdmin" style="width: 350px"> </span>
            </div>
        </header>
        <div id="main" role="main">
            <div id="content">

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="z-index:1151 !important;" data-keyboard="false">

                </div><!-- /.modal -->

                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="z-index:1151 !important;" data-keyboard="false">

                </div>

                <!-- Modal -->
                <div class="modal fade" id="myModalEjemplo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="z-index:1151 !important;" data-keyboard="false">
                    


                    <div class="modal-dialog" style="width:500px">
    <div class="modal-content" id="payment_promise">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                &times;
            </button>
            <h4 class="modal-title" id="myModalLabel" style="color: #29a22d; font-weight: bold">VALIDACIÓN</h4>
        </div>
        <div class="modal-body">
            <form id="form_verifica_consulta" method="post">
                {!!csrf_field()!!}
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label" style="color: #29a22d; font-weight: bold;">Enviar codigo de confirmacion por: </label>
                                <div class="row">
                                    <div class="col-md-12" style="padding-top: 8px">
                                        <label class="radio radio-inline no-margin">
                                        <input type="radio" name="opt_tipo_pago" id="opt_cancelatoria" value="1" class="radiobox style-2" data-bv-field="rating" checked="checked" onclick="charge_fees();">
                                        <span><strong>Correo electronico</strong></span> </label>
                                        <label class="radio radio-inline no-margin">
                                        <input type="radio" name="opt_tipo_pago" id="opt_pago_cuotas" value="2" class="radiobox style-2" data-bv-field="rating" onclick="charge_fees();">
                                        <span><strong>SMS</strong></span> </label>
                                        <input type="hidden" id="txtOpcionesCuotas" name="txtOpcionesCuotas" class="form-control" id="tags" placeholder="Tags" value="" readonly="readonly" />
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
               
                <div class="modal-footer">
                    <button type="button" id="btn_enviar_codigo_conf" onclick="send_code_confirm();" class="btn btn-primary" style="background-color: #29a22d">
                        Enviar
                    </button>
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="btnCancelarCompromiso">
                        Cancelar
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

                </div><!-- /.modal -->

                <!-- Modal -->
                <div class="modal fade" id="myModalMaps" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false" style="z-index:1151 !important;" data-keyboard="false">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" id="payment_promise">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                                    &times;
                                </button>
                               
 <h4 class="modal-title" id="myModalLabel" style="color: #29a22d; font-weight: bold">NUESTRAS AGENCIAS DE PAGO</h4>

                            </div>
                            <div class="modal-body" style="height: 520px">
                                <div id="map-container-google-3" class="z-depth-1-half map-container-3">
                                  <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d26272.07768742445!2d-58.42835855658266!3d-34.60391594938584!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sTrinario!5e0!3m2!1ses!2spe!4v1570517529047!5m2!1ses!2spe" width="600" height="450" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- /.modal -->


            </div>
            <div id="content">
                <section id="widget-grid" class="">
                    <div class="row">
                        <article class="col-md-12 col-lg-1"></article>
                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-10">

                            <div class="jarviswidget" id="wid-id-1" style="border-top: none; border-left: none">
                                <div style="border-top: 1px solid #CCC; border-left: 1px solid #CCC; border-width: 1px 1px 1px 1px;">
                                    <div class="widget-body">
                                        <fieldset>
                                            <legend style="padding-top: 0px"><h1 style="color:#29a22d; font-weight: bold">CONSULTA TU DEUDA</h1></legend>
                                        </fieldset>
                                        <form id="form_consulta_deuda" class="form-horizontal">
                                            {{csrf_field()}}
                                            <fieldset>
                                                <div class="form-group">
                                                    <label class="control-label col-md-1" style="padding-top: 10px;color: #29a22d; font-weight: bold;" for="appendprepend">DNI:</label>
                                                    <div class="col-md-2">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="icon-addon addon-md">
                                                <input id="txtDni" name="txtDni" type="text" placeholder="Dni" class="form-control" value="" data-toggle="tooltip" data-placement="top" title="Tooltip on top" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                                <label style="color:#29a22d" for="dni" class="fa fa-list-alt" rel="tooltip" title="" data-original-title="Ingrese el numero del Dni"></label>
                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label class="control-label col-md-1" style="padding-top: 10px; text-align: left;color: #29a22d; font-weight: bold;" for="appendprepend">TELEFONO:</label>
                                                    <div class="col-md-2">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="icon-addon addon-md">
                                                <input type="text" id="txtTelefono" name="txtTelefono" placeholder="Telefono" class="form-control" value="" onkeypress='return event.charCode >= 48 && event.charCode <= 57'>
                                                <label  style="color:#29a22d" for="telefono" class="fa fa-phone" rel="tooltip" title="" data-original-title="Ingrese un numero telefonico"></label>
                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label class="control-label col-md-1" style="padding-top: 10px;color: #29a22d; font-weight: bold;" for="appendprepend">EMAIL:</label>
                                                    <div class="col-md-5">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <div class="icon-addon addon-md">
                                                <input type="text" id="txtEmail" name="txtEmail" placeholder="Email" class="form-control" value="">
                                                <label  style="color:#29a22d" for="email" class="fa fa-envelope" rel="tooltip" title="" data-original-title="Ingrese una direccion Email"></label>
                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                            <fieldset>
                                                <div class="form-group">
                                                    <div class="col-md-6">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <label class="control-label col-md-1" style="padding-top: 10px;color: #29a22d; font-weight: bold; visibility: hidden;" for="appendbutton">Captcha</label>
                                                    <div class="col-md-5" align="right">
                                                        <div class="row" align="right">
                                                            <div class="col-sm-12" align="right">
                                                                <div class="input-group" align="right">
                                                                    <input class="form-control" id="appendbutton" name="captcha" type="text" style="display: none">
                                                                    <div class="input-group-btn" style="text-align: left;display: none">
                                                                        <div class="captcha">
                                                                            <span id="id_captcha" style="border-color:#29a22d">{!! captcha_img() !!}</span>
                                                                            <button type="button" id="refresh_captcha" class="btn btn-success btn-refresh" style="background-color: #29a22d; border-color: #29a22d"><i class="fa fa-refresh"></i></button>
                                                                        </div>
                                                                    </div>
                                                                    <div class="input-group-btn" style="text-align: right;" style="display: none">
                                                                        <button style="display: none" id="myModalEjemplo1" type="button" data-toggle="modal" data-target="#myModalEjemplo" class="btn btn-warning" style="margin-left: 10px">
                                                                            <i class="fa fa-search"></i>
                                                                        </button>
                                                                    </div>
                                                                    <div class="input-group-btn" style="text-align: right;">
                                                                        <button type="button" data-toggle="" data-target="" class="btn btn-warning" style="margin-left: 10px" onclick="valida_casillas_form();">
                                                                            <i class="fa fa-search"></i> Consultar Deudas
                                                                        </button>
                                                                    </div>
                                                                    <div class="input-group-btn" style="text-align: left; padding-left: 10px; display: none">
                                                                        <button id="btnConsultar" type="button" class="btn btn-warning" style="margin-left: 10px">
                                                                            <i class="fa fa-search"></i> Consultar Deudas :)
                                                                        </button>
                                                                    </div>
                                                                    <div class="col-md-4" style="padding-left: 0px; display: none">
                                                                      <a href="javascript:void(0);" data-toggle="modal" data-target="#myModalEjemplo">
                                                                      <img src="{!! asset('images/maps.png') !!}" style="width: 40px">
                                                                      <label style="font-weight: bold; font-size: 20px; color: #2098DE; cursor:pointer;"> Agencias de Pago 2</label>
                                                                      </a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>

                                        <form id="checkout-form" class="form-horizontal" novalidate="novalidate">
                                            <fieldset>
                                                <div class="jarviswidget" role="no-menu"  id="wid-id-0" data-widget-editbutton="false">
                                                    <header style="background-color: #29a22d; border-color: #29a22d; color: #ffffff">
                                                        <span class="widget-icon"> <i class="fa fa-reorder"></i> </span>
                                                        <h2 style="font-weight: bold">LISTADO DE DEUDAS </h2>
                                                    </header>
                                                    <div id="main_table_result">
                                                        <div id="id_results_table" class="widget-body no-padding">
                                                            <table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th data-hide="phone" style="width:22%">ENTIDAD</th>
                                                                        <th data-class="expand"  style="width:28%"><i class="text-muted hidden-md hidden-sm hidden-xs"></i>TITULAR</th>
                                                                        <th data-hide="phone"  style="width:8%"><i class="text-muted hidden-md hidden-sm hidden-xs"></i>DNI</th>
                                                                        <th data-hide="phone,tablet" style="width:10%">FECHA MORA</th>
                                                                        <th data-hide="phone,tablet"  style="width:14%"><i class="xt-color-blue hidden-md hidden-sm hidden-xs"></i> PRODUCTO</th>
                                                                        <th style="width:10%">DEUDA</th>
                                                                        <th style="width:3%;"></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>

                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </form>
                                        <fieldset>
                                            <div class="form-group">
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <div class="col-md-4" style="padding-left: 0px">
                                                            <a href="https://api.whatsapp.com/send?phone=5491157681713&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20mi%20deuda." target="_blank">
                                                            <img src="{!! asset('images/whatsapp.png') !!}" style="width: 50px">
                                                            <label style="font-weight: bold; font-size: 20px; color: #29a22d; cursor:pointer;">+54 9 11 5768 - 1713</label>
                                                            </a>
                                                        </div>
                                                        <!--<div class="col-md-4" style="padding-left: 0px">
                                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModalMaps">
                                                            <img src="{!! asset('images/maps.png') !!}" style="width: 40px">
                                                     
   <label style="font-weight: bold; font-size: 20px; color: #2098DE; cursor:pointer;"> AGENCIAS DE PAGO</label>
                                                            </a>
                                                        </div>-->
                                                        <!--<div class="col-md-4" style="padding-left: 0px">
                                                            <a href="javascript:void(0);" data-toggle="modal" data-target="#myModalEjemplo">
                                                            <img src="{!! asset('images/maps.png') !!}" style="width: 40px">
                                                            <label style="font-weight: bold; font-size: 20px; color: #2098DE; cursor:pointer;"> Agencias de Pago 2</label>
                                                            </a>
                                                        </div>-->
                                                    </div>
                                                </div>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <article class="col-xs-12 col-sm-12 col-md-12 col-lg-1"></article>
                    </div>
                </section>
            </div>
        </div>

        <script data-pace-options='{ "restartOnRequestAfter": true }' src="js/plugin/pace/pace.min.js"></script>
        <script src="js/jquery.min.js"></script>

        <script>
        </script>
        <script src="js/jquery-ui.min.js"></script>
        <script>
            if (!window.jQuery.ui) {
                document.write('<script src="js/libs/jquery-ui.min.js"><\/script>');

                document.write('<script src="js/jquery.min.js"><\/script>');
                document.write('<script src="js/jquery-ui.min.js"><\/script>');
                document.write('<script src="js/bootstrap/bootstrap.min.js"><\/script>');

            }
        </script>
        <script src="js/bootstrap/bootstrap.min.js"></script>
        <script src="js/plugin/datatables/jquery.dataTables.min.js"></script>
        <script src="js/plugin/datatables/dataTables.colVis.min.js"></script>
        <script src="js/plugin/datatables/dataTables.tableTools.min.js"></script>
        <script src="js/plugin/datatables/dataTables.bootstrap.min.js"></script>
        <script src="js/plugin/datatable-responsive/datatables.responsive.min.js"></script>
        <script src="js/app.config.js"></script>
<!--        <script src="js/demo.min.js"></script>-->
        <script src="js/plugin/jquery-touch/jquery.ui.touch-punch.min.js"></script>
        <script src="js/app.min.js"></script>
        <!--<script src="js/moment.js"></script>-->
        <script src="js/moment-with-locales.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
        <script>


        function cargaModalVerificacion(){

            reset_modal_confirmacion();
            $("#myModalEjemplo1").click();

        }

        function send_code_confirm(){
            
            let p_opt_tipo_envio            =   0;
            let p_opt_enviar_codigo         =   $('input:radio[name=opt_enviar_codigo]:checked').val();
            let p_telefono_enviar_codigo    =   $('#txtTelefono').val();
            let p_email_enviar_codigo       =   $('#txtEmail').val();
            let p_dni_titular               =   $('#txtDni').val();


            

            if (p_opt_enviar_codigo == 1) {
                p_opt_tipo_envio = 1;
                $('#lblMensaje').text('Se le enviara un codigo al correo: ' + p_email_enviar_codigo);
            }

            if (p_opt_enviar_codigo == 2) {
                p_opt_tipo_envio = 2;
                $('#lblMensaje').text('Se le enviara un codigo al telefono: ' + p_telefono_enviar_codigo);
            }

            var token = '{{csrf_token()}}';

            var parametros = {
                    "p_opt_enviar_codigo" : p_opt_enviar_codigo,
                    "p_telefono_enviar_codigo" : p_telefono_enviar_codigo,
                    "p_email_enviar_codigo" : p_email_enviar_codigo,
                    "p_dni_titular" : p_dni_titular,
                    _token:token
            };

            $.ajax({
                data: parametros,
                type: "post",
                url: 'enviar-codigo-confirmacion',
                success: function(data)
                {
                    $('#form_verifica_consulta').html(data);
                }
            });
        }

        function reset_modal_confirmacion(){
            var token = '{{csrf_token()}}';
            var parametros = {
                "p_valor" : 1,
                _token:token
            };
            $.ajax({
                data: parametros,
                type: "post",
                url: 'reset-modal-confirmacion',
                success: function(data)
                {
                  $('#form_verifica_consulta').html(data);
                }
            });
        }

        function verifica_codigo_confirmacion(){
            let p_codigo_confirmacion       =   $('#txtCodigoConfirmacion').val();
            let p_telefono_enviar_codigo    =   $('#txtTelefono').val();
            let p_email_enviar_codigo       =   $('#txtEmail').val();
            let p_dni_titular               =   $('#txtDni').val();

            var token = '{{csrf_token()}}';

            var parametros = {
                "p_codigo_confirmacion" : p_codigo_confirmacion,
                "p_telefono_enviar_codigo" : p_telefono_enviar_codigo,
                "p_email_enviar_codigo" : p_email_enviar_codigo,
                "p_dni_titular" : p_dni_titular,
                _token:token
            };
            $.ajax({
                data: parametros,
                type: "post",
                url: 'verifica-codigo-confirmacion',
                success: function(data)
                {
                    if (data == -1) {

                        $('#lblMensaje').text('El codigo ingresado no es el correcto!');

                    }else{

                        $('#id_results_table').html(data);
                        //paginacion();
                        //$("#refresh_captcha").click();
                        //$('#btnConsultar').attr("disabled", false);
                        $('#main_table_result').css("padding-top", "7px");
                       // $('#myModalEjemplo1').modal('toggle');
                        //$('#btnCancelarConfirmacion').click();
                        $('#btnCancelarConfirmacion').click();
                        
                        //consulta_deuda_cliente();

                    }
                }
            });
        }


        function consulta_deuda_cliente(){

            
            var dni         = $.trim($('#txtDni').val());
            var telefono    = $.trim($('#txtTelefono').val());
            var email       = $.trim($('#txtEmail').val());
            //var captcha     = $.trim($('#appendbutton').val());

            var token = '{{csrf_token()}}';

            /*if (captcha.length  != 4) {
                $.alert({
                    icon: 'fa fa-exclamation-circle',
                    title: 'Info',
                    content: '<strong>Ingrese el codigo Captcha que se muestra en la imagen.</strong>',
                    theme: 'modern',
                    closeIcon: true,
                    animation: 'scale',
                    type: 'orange',
                });
                return false;
            }*/


            var parametros = {
                "txtDni" : dni,
                "txtTelefono" : telefono,
                "txtEmail" : email,
                _token:token
            };

            $.ajax({
                data: parametros,
                type: "POST",
                url: 'consulta-deuda',
                //data: $("#form_consulta_deuda").serialize(),
                beforeSend: function(){
                    //$('#btnConsultar').attr("disabled", true);
                },
                success: function(data){
                    $('#id_results_table').html(data);
                    //paginacion();
                    //$("#refresh_captcha").click();
                    //$('#btnConsultar').attr("disabled", false);
                    $('#main_table_result').css("padding-top", "7px");
                    //clear_input();
                }
            });
        }


        function valida_casillas_form(){
            var dni         = $.trim($('#txtDni').val());
            var telefono    = $.trim($('#txtTelefono').val());
            var email       = $.trim($('#txtEmail').val());
            //var captcha     = $.trim($('#appendbutton').val());

            if (dni.length != 8) {
                $.alert({
                    icon: 'fa fa-exclamation-circle',
                    title: 'Info',
                    content: '<strong>Ingrese un numero de DNI valido.</strong>',
                    theme: 'modern',
                    closeIcon: true,
                    animation: 'scale',
                    type: 'orange',
                });
                return false;
            }

            if (telefono.length < 7) {
                $.alert({
                    icon: 'fa fa-exclamation-circle',
                    title: 'Info',
                    content: '<strong>Ingrese un numero telefonico valido.</strong>',
                    theme: 'modern',
                    closeIcon: true,
                    animation: 'scale',
                    type: 'orange',
                });
                return false;
            }

            if (valida_email(email) == false ) {
                $.alert({
                    icon: 'fa fa-exclamation-circle',
                    title: 'Info',
                    content: '<strong>Ingrese una direccion Email valida, <em>Ejm: pepito@gmail.com.</em></strong>',
                    theme: 'modern',
                    closeIcon: true,
                    animation: 'scale',
                    type: 'orange',
                });
                return false;
            }

            cargaModalVerificacion();
        }

        function load_verifica_identidad(){
          $('#myModal1').html();
        }

        function load_payment_promise(valor1, valor2, valor3){
            var token = '{{csrf_token()}}';
            var fecha_anticipo = "";
            var parametros = {
                    "p_valor1" : valor1,
                    "p_valor2" : valor2,
                    "p_valor3" : valor3,
                    _token:token
            };

            $.ajax({
                data: parametros,
                type: "post",
                url: 'compromiso-pago',
                success: function(data)
                {
                  $('#myModal').html(data);
                }
              }).done(function(){

		$('#dtpicker').datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 2,
                    minDate: '+1d',
                    maxDate: ultimo_dia(),
                    dateFormat: 'dd/mm/yy',
                    prevText: '<i class="fa fa-chevron-left"></i>',
                    nextText: '<i class="fa fa-chevron-right"></i>',
                    onSelect: function(selectedDate){
                        fecha_anticipo = editar_fecha(selectedDate, "+1", "m", "/");
                        $('#txtFechaAnticipo_normal').val(selectedDate);
                        $('#txtFechaAnticipo').val(fecha_anticipo);
                        $('#id_fecha_cancelatoria').text(selectedDate);
                    },
                    onClose: function (selectedDate) {
                        fecha_anticipo = editar_fecha(selectedDate, "+1", "m", "/");
                    }
                });


		$('#dtpicker1').datepicker({
                    defaultDate: "+1w",
                    changeMonth: true,
                    numberOfMonths: 2,
                    minDate: '+1d',
                    maxDate: ultimo_dia_cuotas(),
                    dateFormat: 'dd/mm/yy',
                    prevText: '<i class="fa fa-chevron-left"></i>',
                    nextText: '<i class="fa fa-chevron-right"></i>',
                    onSelect: function(selectedDate){
                        fecha_anticipo = editar_fecha(selectedDate, "+1", "m", "/");
                        $('#txtFechaAnticipo_normal').val(selectedDate);
                        $('#txtFechaAnticipo').val(fecha_anticipo);
                        $('#id_fecha_anticipo').text(selectedDate);
                    },
                    onClose: function (selectedDate) {
                        fecha_anticipo = editar_fecha(selectedDate, "+1", "m", "/");
                    }
                });
                pageSetUp();
            });
        }

        function ultimo_dia(){
            let nro_cuota = $('#cbTipoPago').val();
            if(nro_cuota == 1){
                let lastdate = last_date(15);
                //return '+15d';
                return lastdate;
            }else{
                let lastdate = last_date(7);
                return lastdate;
            }
        }

	function ultimo_dia_cuotas(){
            let nro_cuota = $('#cbTipoPago_ant').val();
            if(nro_cuota == 1){
                let lastdate = last_date(15);
                //return '+15d';
                return lastdate;
            }else{
                let lastdate = last_date(7);
                return lastdate;
            }
        }

        function load_advance_date(p_fecha_anticipo){
            var date = new date();
            var lastDay = new date(date.getFullYear(), date.getMonth() + 1, 0);
            var fecha_anticipo = lastDay;
            return fecha_anticipo;
        }


        function editar_fecha(fecha, intervalo, dma, separador) {
            var separador = separador || "-";
            var arrayFecha = fecha.split(separador);
            var dia = arrayFecha[0];
            var mes = arrayFecha[1];
            var anio = arrayFecha[2];

            var fechaInicial = new Date(anio, mes - 1, dia);
            var fechaFinal = fechaInicial;
            if(dma=="m" || dma=="M"){
                fechaFinal.setMonth(fechaInicial.getMonth()+parseInt(intervalo));
            }else if(dma=="y" || dma=="Y"){
                fechaFinal.setFullYear(fechaInicial.getFullYear()+parseInt(intervalo));
            }else if(dma=="d" || dma=="D"){
                fechaFinal.setDate(fechaInicial.getDate()+parseInt(intervalo));
            }else{
                return fecha;
            }

            dia = fechaFinal.getDate();
            mes = fechaFinal.getMonth() + 1;
            anio = fechaFinal.getFullYear();

            dia = (dia.toString().length == 1) ? "0" + dia.toString() : dia;
            mes = (mes.toString().length == 1) ? "0" + mes.toString() : mes;

            return dia + "/" + mes + "/" + anio;
        }

        function charge_fees_old(){

            let opt_tipo_pago = $('input:radio[name=opt_tipo_pago]:checked').val();
            let opciones_cuotas = $('#txtOpcionesCuotas').val();
            let cuotas_html = "";
            arr_opciones_cuotas = opciones_cuotas.split(',');
            if (opt_tipo_pago == 1) {
                $('#cb_cuotas').html("<select class='form-control' id='cbTipoPago' name='cbTipoPago' readonly='readonly'><option value='1'>01 Cuota</option></select>");
                get_amount();
            }else if (opt_tipo_pago == 2) {
                cuotas_html = "<select class='form-control' id='cbTipoPago' name='cbTipoPago' onchange='change_fee();''>";
                jQuery.each(arr_opciones_cuotas, function(i, val){
                    cuotas_html += "<option  value='"+val+"'>0"+val+" Cuota</option>";
                });
                cuotas_html += "</select>";
                $('#dtpicker').val('').datepicker('option', {minDate: '+1d', maxDate: '+7d'});
                $('#txtImporteCuota').val($('#imp_cuota_02').val());
                $('#txtImporteAnticipo').val("");
                $('#txtFechaAnticipo_normal').val("");
                $('#txtFechaAnticipo').val("");
                $('#id_imp_anticipo_elemento').css("display", "");
                $('#id_fec_anticipo_elemento').css("display", "");
                $('#id_fec_anticipo_elemento_normal').css("display", "");
                let lastdate = last_date(7);
                $('#dtpicker').val('').datepicker('option', {minDate: '+1d', maxDate: lastdate});
                $('#cb_cuotas').html(cuotas_html);
            }
        }

	function charge_fees(){

            let opt_tipo_pago = $('input:radio[name=opt_tipo_pago]:checked').val();
            let opciones_cuotas = $('#txtOpcionesCuotas').val();
            let cuotas_html = "";
            arr_opciones_cuotas = opciones_cuotas.split(',');
            if (opt_tipo_pago == 1) {
                $('#cb_cuotas').html("<select class='form-control' id='cbTipoPago' name='cbTipoPago' readonly='readonly'><option value='1'>01 Cuota</option></select>");
                get_amount();

                $('#id_tipo_pago_cancelatoria').css("display", "");
                $('#id_tipo_pago_cuotas').css("display", "none");

                $('#id_resumen_comp_cancelatoria').css("display", "");
                $('#id_resumen_comp_anticipo').css("display", "none");
                
            }else if (opt_tipo_pago == 2) {

                $('#id_tipo_pago_cancelatoria').css("display", "none");
                $('#id_tipo_pago_cuotas').css("display", "");

                $('#id_resumen_comp_cancelatoria').css("display", "none");
                $('#id_resumen_comp_anticipo').css("display", "");

                cuotas_html = "<select class='form-control' id='cbTipoPago_ant' name='cbTipoPago_ant' onchange='change_fee();''>";
                jQuery.each(arr_opciones_cuotas, function(i, val){
                    cuotas_html += "<option  value='"+val+"'>0"+val+" Cuota</option>";
                });
                cuotas_html += "</select>";
                $('#dtpicker').val('').datepicker('option', {minDate: '+1d', maxDate: '+7d'});
                $('#txtImporteCuota').val('$ ' + $('#imp_cuota_02').val());
                //$('#txtImporteAnticipo').val("");
                $('#txtFechaAnticipo_normal').val("");
                $('#txtFechaAnticipo').val("");
                $('#id_imp_anticipo_elemento').css("display", "");
                $('#id_fec_anticipo_elemento').css("display", "");
                $('#id_fec_anticipo_elemento_normal').css("display", "");
                let lastdate = last_date(7);
                $('#dtpicker').val('').datepicker('option', {minDate: '+1d', maxDate: lastdate});
                $('#cb_cuotas').html(cuotas_html);
            }
        }

        function last_date(cant_dias){
          let date = new Date();
          let firstDay = new Date(date.getFullYear(), date.getMonth(), 1);
          let lastDay = new Date(date.getFullYear(), date.getMonth() + 1, 0);
          let fecha_actual = moment(date);
          let fecha_final = moment(lastDay);
          let dias_dif = fecha_final.diff(fecha_actual, 'days');
          dias_dif += 1;
          let prop_dias = '+'+cant_dias+'d';
          if(cant_dias > dias_dif){
            prop_dias = '+'+dias_dif+'d';
          }
          return prop_dias;
        }

        function diff_days(p_fecha_1, p_fecha_2){
          return p_fecha_1.diff(p_fecha_2, 'days');
        }

        function charge_fee_amount(p_titular, p_deuda, p_cuota){
            $.ajax({
                type: "POST",
                url: 'guardar-compromiso',
                data: $("#form_compromiso_deuda").serialize(),
                success: function(data){ }
            });
        }

        function clear_input(){
            $('#txtDni').val("");
            $('#txtTelefono').val("");
            $('#txtEmail').val("");
            $('#appendbutton').val("");
            $('#txtDni').focus();
        }

        function saludo_mensaje(){
            var titular = $('#txtTitular').val();
            alert(titular);
        }

        function save_payment_promise(){

	    let opt_tipo_pago_val = $('#txtOpcionPagoVal').val();
	    let opt_tipo_pago = 0;
            let fecha_compromiso = null;
	    if (opt_tipo_pago_val == 1) {
                fecha_compromiso =  $.trim($('#dtpicker').val());  
            } else if (opt_tipo_pago_val == 2) {
		opt_tipo_pago = $('input:radio[name=opt_tipo_pago]:checked').val();
		if(opt_tipo_pago == 1){
			fecha_compromiso =  $.trim($('#dtpicker').val());
		} else {
			fecha_compromiso =  $.trim($('#dtpicker1').val());
		}
            }

            if (fecha_compromiso.length == 0) {
                $.alert({
                    icon: 'fa fa-exclamation-circle',
                    title: 'Info',
                    content: '<strong>Debe seleccionar una fecha de pago.</strong>',
                    theme: 'modern',
                    closeIcon: true,
                    animation: 'scale',
                    type: 'orange',
                });
                return false;
            }

            $.confirm({
                icon: 'fa fa-question-circle',
                title: false,
                content: '<strong>Confirmanos tu compromiso de pago</strong>',
                theme: 'modern',
                closeIcon: true,
                animation: 'scale',
                type: 'green',
                buttons: {
                confirmar: function () {
                    $.ajax({
                           type: "POST",
                           url: 'guardar-compromiso',
                           data: $("#form_compromiso_deuda").serialize(),
                           beforeSend: function(){
                             $('#btnCancelarCompromiso').click();
                             $('#btn_guardar_compromiso').attr("disabled", true);
                           },
                           success: function(data)
                           {
                             $('#btn_guardar_compromiso').attr("disabled", false);
                           }
                         });
                    },
                    cancelar: function(){
                    }
               }
            });
        }

        function change_fee(){
            get_amount();
        }

        function get_amount_old(){
            let cb_cuota = $('#cbTipoPago').val();
            $.ajax({
                type: "POST",
                url: 'carga-importe-cuota',
                data: $("#form_compromiso_deuda").serialize(),
                success: function(data)
                {
                $('#txtImporteCuota').val(data);
                    if(cb_cuota > 1){
                        $('#id_imp_anticipo_elemento').css("display", "");
                        $('#id_fec_anticipo_elemento').css("display", "");
                        $('#id_fec_anticipo_elemento_normal').css("display", "");
                        let lastdate = last_date(7);
                        $('#dtpicker').val('').datepicker('option', {minDate: '+1d', maxDate: lastdate});
                    }else{
                        let lastdate = last_date(15);
                        $('#dtpicker').val('').datepicker('option', {minDate: '+1d', maxDate: lastdate});
                        $('#id_imp_anticipo_elemento').css("display", "none");
                        $('#id_fec_anticipo_elemento').css("display", "none");
                        $('#id_fec_anticipo_elemento_normal').css("display", "none");
                    }
                }
            });
        }

	function get_amount(){
            //let cb_cuota = $('#cbTipoPago').val();
            //let cb_cuota_st = $('#cbTipoPago_ant').val();
            let cb_cuota = $('#cbTipoPago_ant').val();
            $('#id_nro_cuotas_st').text(cb_cuota);
            $.ajax({
                type: "POST",
                url: 'carga-importe-cuota',
                data: $("#form_compromiso_deuda").serialize(),
                success: function(data)
                {
                $('#txtImporteCuota').val('$ ' + data);
                $('#id_importe_anticipo_st').text(data);

                    if(cb_cuota > 1){
                        //$('#id_imp_anticipo_elemento').css("display", "");
                        //$('#id_fec_anticipo_elemento').css("display", "");
                        //$('#id_fec_anticipo_elemento_normal').css("display", "");
                        let lastdate = last_date(7);
                        $('#dtpicker').val('').datepicker('option', {minDate: '+1d', maxDate: lastdate});
                    }else{
                        let lastdate = last_date(15);
                        $('#dtpicker').val('').datepicker('option', {minDate: '+1d', maxDate: lastdate});
                        //$('#id_imp_anticipo_elemento').css("display", "none");
                        //$('#id_fec_anticipo_elemento').css("display", "none");
                        //$('#id_fec_anticipo_elemento_normal').css("display", "none");
                    }
                }
            });
        }

        function valida_email(email){
            return /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(email);
        }

        $(document).ready(function() {

            $("#txtDni").focus();


            $("#txtDni").keydown(function (e) {
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    (e.keyCode == 65 && e.ctrlKey === true) ||
                    (e.keyCode >= 35 && e.keyCode <= 39)) {
                         return;
                }

                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });

            $("#txtTelefono").keydown(function (e) {
                if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 110, 190]) !== -1 ||
                    (e.keyCode == 65 && e.ctrlKey === true) ||
                    (e.keyCode >= 35 && e.keyCode <= 39)) {
                         return;
                }

                if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
                    e.preventDefault();
                }
            });

            $('#btn_click').on('click', function(){
                alert("compromiso de pago");
                var p_dni       = '36953761';
                var id_deuda    = 1;
                $.ajax({
                    type: "get",
                    url: 'compromiso-pago/'+p_dni+"/"+id_deuda,
                    success: function(data)
                    {
                          $('#myModal').html(data);
                    }
                }).done(function(){
                    $('#dtpicker').datepicker();
                });
            });

            $('#btn_guardar_compromiso').click(function(){
                var titular = $('#txtTitular').val();
                alert(titular);
            });

            $('#btnConsultar').click(function(){


                var dni         = $.trim($('#txtDni').val());
                var telefono    = $.trim($('#txtTelefono').val());
                var email       = $.trim($('#txtEmail').val());
                var captcha     = $.trim($('#appendbutton').val());

                if (dni.length != 8) {
                    $.alert({
                        icon: 'fa fa-exclamation-circle',
                        title: 'Info',
                        content: '<strong>Ingrese un numero de DNI valido.</strong>',
                        theme: 'modern',
                        closeIcon: true,
                        animation: 'scale',
                        type: 'orange',
                    });
                    return false;
                }

                if (telefono.length < 7) {
                    $.alert({
                        icon: 'fa fa-exclamation-circle',
                        title: 'Info',
                        content: '<strong>Ingrese un numero telefonico valido.</strong>',
                        theme: 'modern',
                        closeIcon: true,
                        animation: 'scale',
                        type: 'orange',
                    });
                    return false;
                }

                if (valida_email(email) == false ) {
                    $.alert({
                        icon: 'fa fa-exclamation-circle',
                        title: 'Info',
                        content: '<strong>Ingrese una direccion Email valida, <em>Ejm: pepito@gmail.com.</em></strong>',
                        theme: 'modern',
                        closeIcon: true,
                        animation: 'scale',
                        type: 'orange',
                    });
                    return false;
                }

                if (captcha.length  != 4) {
                    $.alert({
                        icon: 'fa fa-exclamation-circle',
                        title: 'Info',
                        content: '<strong>Ingrese el codigo Captcha que se muestra en la imagen.</strong>',
                        theme: 'modern',
                        closeIcon: true,
                        animation: 'scale',
                        type: 'orange',
                    });
                    return false;
                }

                $.ajax({
                    type: "POST",
                    url: 'consulta-deuda',
                    data: $("#form_consulta_deuda").serialize(),
                    beforeSend: function(){
                        $('#btnConsultar').attr("disabled", true);
                    },
                    success: function(data){
                        $('#id_results_table').html(data);
                        paginacion();
                        $("#refresh_captcha").click();
                        $('#btnConsultar').attr("disabled", false);
                        $('#main_table_result').css("padding-top", "7px");
                        clear_input();
                    }
                });
            });

            $(".btn-refresh").click(function(){
                $.ajax({
                    type:'POST',
                    url: 'refresh_captcha-demo',
                    data: $('#form_consulta_deuda').serialize(),
                    error: function( jqXHR, textStatus, errorThrown ) {
                        if (jqXHR.status === 500){
                        }
                    },
                    success:function(data){
                        $(".captcha span").html(data.captcha);
                    }
                }).fail(function(jqXHR, textStatus, errorThrown){
                    if (jqXHR.status === 500){
                    }
                });
            })

            function paginacion(){

                var responsiveHelper_dt_basic = undefined;
                var responsiveHelper_datatable_fixed_column = undefined;
                var responsiveHelper_datatable_col_reorder = undefined;
                var responsiveHelper_datatable_tabletools = undefined;
                var breakpointDefinition = {
                    tablet : 1024,
                    phone : 480
                };

                $('#dt_basic').dataTable({
                    "sDom": "t"+
                        "<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
                    "autoWidth" : true,
                    "oLanguage": {
                        "sSearch": '<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>'
                    },
                    "preDrawCallback" : function() {
                        if (!responsiveHelper_dt_basic) {
                            responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#dt_basic'), breakpointDefinition);
                        }
                    },
                    "rowCallback" : function(nRow) {
                        responsiveHelper_dt_basic.createExpandIcon(nRow);
                    },
                    "drawCallback" : function(oSettings) {
                        responsiveHelper_dt_basic.respond();
                    }
                });
            }
        });

    </script>
    <script type='text/javascript'>
   /* var _glc =_glc || []; _glc.push('ag9zfmNsaWNrZGVza2NoYXRyEQsSB3dpZGdldHMYiMrjyxIM');
    var glcpath = (('https:' == document.location.protocol) ? 'https://my.clickdesk.com/clickdesk-ui/browser/' :
    'http://my.clickdesk.com/clickdesk-ui/browser/');
    var glcp = (('https:' == document.location.protocol) ? 'https://' : 'http://');
    var glcspt = document.createElement('script'); glcspt.type = 'text/javascript';
    glcspt.async = true; glcspt.src = glcpath + 'livechat-new.js';
    var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(glcspt, s);*/
    </script>
    </body>

</html>
