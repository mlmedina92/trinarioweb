<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="call_me/css/button_style.css">
<link rel="stylesheet" href="call_me/css/form_style.css">
<script type="text/javascript" src="js/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script type="text/javascript" src="call_me/js/jquery-captcha-lgh.min.js"></script>
<!-- BUTTON -->
<!-- <a href="#" id="btnOpenForm" class="float">
    <h2>Llámame!<i class="fa fa-phone my-float " aria-hidden="true"></i></h2>
</a> -->

<button id="btnOpenForm"  class="callme_button_with_text" >
    <div class="callme_button_text">
      <i class="fa fa-phone my-float " aria-hidden="true"></i> Llámame!
    </div>
</button>

<!-- FORM -->
<div class="form-popup-bg">
  <div class="form-container">
    <button id="btnCloseForm" class="close-button">X</button>
    <h1 style="padding-left: 40%; padding-bottom: 10px; color:#FFF "> <i class="fa fa-phone-square my-float " aria-hidden="true"></i> Llámame! </h1>
    <!-- <p>For more information. Please complete this form.</p> -->
    <form action="#" id="formCallMe">
      <div class="form-group">
        <label for="">Nombre</label>
        <input  id="nombre_callme" 
              style="border: none;
                    background: #FFF;
                    width: 57%;
                    margin-bottom: 15px;"
              name="nombre_callme" class="form-control form-input " type="text"  />
      </div>
      <div class="form-group">
        <label for="">DNI</label>
        <input class="form-control form-input " name="dni_callme" id="dni_callme" minlength="8" type="number" />
      </div>
      <div class="form-group">
        <label for="">Celular</label>
        <input class="form-control form-input " name="celular_callme" id="celular_callme" type="number" />
      </div>


      <div class="form-group">
        <label for="">Verificador</label>
        <canvas id="captcha"></canvas>
        <input type="hidden" id="code_hidden" >
        <input class="form-input" 
               style="width: 8%; margin-top:0px; position: fixed; " 
               name="code_callme"
               type="number"
               id="code_callme" />
        
      </div>

      <input 
        class="button_submit"
        style="background: #FF822F;
              padding: 6px 20px;
              color: white;
              border: solid 1px #FD6500;
              border-radius: 3px;
              font-size: 18px;
              cursor: pointer;
              margin-left: 33%;
              margin-top: 5px;"
        type="submit" 
        name="enviar_form" 
        value="Enviar">
    </form>
  </div>
</div>

<script type="text/javascript">
  function closeForm() {
    $('.form-popup-bg').removeClass('is-visible');
  }

$(document).ready(function($) {
  
    /* Contact Form Interactions */
    $('#btnOpenForm').on('click', function(event) {
      event.preventDefault();

      $('.form-popup-bg').addClass('is-visible');
    });
    
      //close popup when clicking x or off popup
    $('.form-popup-bg').on('click', function(event) {
      if ($(event.target).is('.form-popup-bg') || $(event.target).is('#btnCloseForm')) {
        event.preventDefault();
        $(this).removeClass('is-visible');
      }
    });

    // VALIDATOR-----------------------------

    $.validator.setDefaults({
      
      submitHandler: function() {

        let nombre = $("#nombre_callme").val();
        let dni = $("#dni_callme").val();
        let celular = $("#celular_callme").val();

        $.ajax({
            data: JSON.stringify({ 
                "dni" : dni, 
                "nombre" : nombre,
                "celular" : celular, 
                "pagina": "https://factora.net"
                }),
            type: "POST",
            // headers: {
            //     'x-api-key':'JU11lHRxt8ay7PwKNP9Z8KcAJqTugmf1O6nA8cXj',
            //     'Content-Type':'application/json'
            // },
            contentType: "application/json;charset=utf-8",
            dataType: "json",
            url: "https://6ub8udoxoi.execute-api.us-east-2.amazonaws.com/prod/contacto",
        })
        .done(function( data, textStatus, jqXHR ) {
            Toast.fire({
              icon: 'success',
              title: 'Enviado correctamente'
            })
        })
        .fail(function( jqXHR, textStatus, errorThrown ) {
            Toast.fire({
              icon: 'error',
              title: 'No se pudo enviar, pruebe en otro momento'
            })
        });

        $('.form-popup-bg').removeClass('is-visible');
        
        $("#nombre_callme").val('');
        $("#dni_callme").val(''); 
        $("#celular_callme").val('');
        $("#code_callme").val('');

      }
    });

  // SWALERT========
  const Toast = Swal.mixin({
    toast: true,
    position: 'top',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.addEventListener('mouseenter', Swal.stopTimer)
      toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
  })

  // CAPTCHA=============
  const captcha =new Captcha($('#captcha'),
  {
    autoRefresh:false,
    caseSensitive:true
  });

  // VALIDACION=========
    $("#code_hidden").val(captcha.getCode());
    $("#formCallMe").validate({
			rules: {
				nombre_callme: {
					required: true,
					minlength: 2
				},
				dni_callme: {
					required: true,
          minlength: 8,
          maxlength:8,
          digits: true
        },
        
        celular_callme: {
					required: true,
					minlength: 8,
          digits: true
        },
        code_callme: {
					required: true,
					minlength: 4,
          equalTo: '#code_hidden'
				},
			},
			messages: {
				nombre_callme: {
					required: "Campo obligatorio",
					minlength: "Tu nombre debe tener al menos 2 letras",
				},
				dni_callme: {
					required: "Campo obligatorio",
          minlength: "DNI incorrecto",
          maxlength: "DNI incorrecto"
        },
        celular_callme: {
					required: "Campo obligatorio",
					minlength: "Celular incorrecto"
        },
        code_callme: {
					required: "Campo obligatorio",
          minlength: "Código incorrecto",
          equalTo: 'Código incorrecto'
				},
      }

      });
  });

</script>
