$(document).ready(function() {
    if(window.location.hash) {
        var section=window.location.hash;
        if (section=="#inicio"){
            $("#footer").hide();
            $("#footer-home").show();
        }else{
            $("#footer-home").hide();
        }
    } else {
        $("#footer").hide();
        $("#footer-home").show();
    }

    $('#pagepiling').pagepiling({
        direction: 'horizontal',
        menu: '#menu',
        anchors: ['inicio', 'nosotros', 'servicios', 'metodologia', 'por-que-elegirnos','trabaja-con-nosotros','contacto'],
        navigation: false,
        verticalCentered: false
    });

    $.fn.pagepiling.setAllowScrolling(false);
    $.fn.pagepiling.setKeyboardScrolling(false);

    $(".link-inner").on("click", function(){
        $("#footer").show();
        $("#footer-home").hide();
        $(".menumovil").fadeOut();
        $("#showmenu").removeClass("open");
    });

    $(".link-home").on("click", function(){
        $("#footer").hide();
        $("#footer-home").show();
        $(".introhome").show();
        $(".menumovil").fadeOut();
        $("#showmenu").removeClass("open");
    });

    $('#tabvalores, #tabmetodologia, #tabelegirnos').responsiveTabs({
        rotate: false,
        /*startCollapsed: 'accordion',
        collapsible: 'accordion',*/
        setHash: false,
        animation: 'slide'
    });

    $(".box-white .nano").nanoScroller({alwaysVisible: true });

    adaptContent(); 
    
    $('input[type="file"]').uniform({fileDefaultHtml: 'Selecciona un archivo'});

    $("#showmenu").on("click", function(event){
        event.preventDefault();
        $(".mainmenu").fadeToggle();
        $(".mainmenu").addClass("menumovil");
        $(this).toggleClass("open");
    });

    $("#buttonFooter a").click(function(){
        $footer=$('#footer').hasClass('expanded');
        if($footer){
            setTimeout(function(){
            $("#footer").addClass('bouncingDown');
                setTimeout(function(){$("#footer").removeClass('bouncingDown');
                },200);
            },200);
            $('#footer').toggleClass('expanded');
        }else{
            $('#footer').toggleClass('expanded');
            setTimeout(function(){
                $("#footer").addClass('bouncingUp');
                setTimeout(function(){
                    $("#footer").removeClass('bouncingUp');
                },200);
            },200);
        };
    });
    $('#menu, #pagepiling, .mainmenu li a, .lista-footer li a').click(function(){
        $footerArea=$('#footer').hasClass('expanded')&!$('#footer').hasClass('alwaysOpen');
        if($footerArea){
            setTimeout(function(){
                $("#footer").addClass('bouncingDown');
                setTimeout(function(){
                    $("#footer").removeClass('bouncingDown');
                },200);
            },200);
            $('#footer').toggleClass('expanded');
        }else{};
    });

    /***** google map **/
    $('#map_addresses').gMap(
        {
            zoom: 17,
            arrowStyle: 2,
            controls: {
                panControl: true,
                zoomControl: true,
                mapTypeControl: false,
                scaleControl: false,
                streetViewControl: true,
                overviewMapControl: false
            },
            markers:[
                {
                    latitude: -34.608343,
                    longitude: -58.379603,
                    popup: false
                }
            ]
        }
    );

    $(window).resize(function(){
        adaptContent();
        if(browserWidth > 768){
            $(".mainmenu").show();
            $(".mainmenu").removeClass("menumovil");
        }else{
            $(".mainmenu").hide();
        }
    });



    /**** envio de formularios */
    $('#frmContacto').validate({
        submitHandler: function(form) {
            $(form).ajaxSubmit({
                type:"POST",
                data: $(form).serialize(),
                url:"contacto.php",
                success: function() {
                    $('#frmContacto input[type="text"]').val('');
                    $('#frmContacto textarea').val('');
                    $('#frmContacto input[type="submit"]').hide();
                    $('#success').fadeIn();
                },
                error: function() {
                    $('#error').fadeIn();
                }
            });
        },
        debug:true
    });

    $('#frmPostula').validate({
        rules: {
            curriculum_file: {
                required: true,
                accept: "pdf|doc|docx",
                maxFileSize: {
                    "unit": "MB",
                    "size": 1
                },
                minFileSize: {
                    "unit": "KB",
                    "size": "1"
                }
            }
        }
    });

    $("#frmPostula").on('submit',(function(e){
        e.preventDefault();
        $("#successt").hide();
        $("#errort").hide();
        $('#loading').show();
        if($(this).valid()){
            $.ajax({
                url: "rrhh.php",
                type: "POST",
                data:  new FormData(this),
                datatype: 'json',
                contentType: false,
                cache: false,
                processData:false,
                success: function(data){
                    $('#loading').hide();
                    obj = JSON.parse(data);
                    if (obj.state=="success") {
                        $("#successt").show();
                        $("#successt").html(obj.message);
                        $('#frmPostula input[type="submit"]').hide();
                    }else{
                        $("#errort").show();
                        $("#errort").html(obj.message);
                    }
                },
                error: function(){}             
            });
        }
    }));

    $('#callPopup').bind('click', function(e) {
        e.preventDefault();
        $('#contentPopup').bPopup({
            modalClose: false,
            opacity: 0.6,
            positionStyle: 'fixed'
        });
    });

});

function adaptContent(){
    browserWidth=0;
    browserHeight=0;
    if(typeof(window.innerWidth)=="number"){
        browserWidth=window.innerWidth;
        browserHeight=window.innerHeight;
    }else if(document.documentElement&&(document.documentElement.clientWidth||document.documentElement.clientHeight)){
        browserWidth=document.documentElement.clientWidth;
        browserHeight=document.documentElement.clientHeight;
    }else if(document.body&&(document.body.clientWidth||document.body.clientHeight)){
        browserWidth=document.body.clientWidth;
        browserHeight=document.body.clientHeight;
    }
    maxHeight = browserHeight - 230;
    maxHeightHome = browserHeight;
    $(".map").height(browserHeight);
    $(".gmap").height(browserHeight);
    $(".box-contact").css({"top": Math.round(maxHeight/2 )+ "px"}); 
    //setScroll("#section1", maxHeightHome);
    setScroll("#section2", maxHeight);
    setScroll("#section3", maxHeight);
    setScroll("#section4", maxHeight);
    setScroll("#section5", maxHeight);
    //setScroll("#section6", maxHeight);
}

function setScroll(obj, altmax){
    var alto = $(obj).height();
    var parent=obj+ " .nano.wrapper";
    if (alto > altmax){
      $(parent).css({"height": altmax + "px"}); 
      $(parent).nanoScroller({alwaysVisible: true });
    }
}