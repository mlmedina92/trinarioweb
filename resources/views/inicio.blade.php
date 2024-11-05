<?php
    $page="home";
    $typepage="home";
    $title="Trinario";
    require_once("include/header.php");
?>
<script type="text/javascript" src="js/jssor.js"></script>
<script type="text/javascript" src="js/jssor.slider.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function ($) {
        var _CaptionTransitions = [
        {$Duration:900,$Clip:1,$Move:true,$Easing:{$Clip:$JssorEasing$.$EaseInOutCubic}}
        ];

        var _SlideshowTransitions = [
            {$Duration:1200,x:-0.3,$During:{$Left:[0.3,0.7]},$Easing:{$Left:$JssorEasing$.$EaseInCubic,$Opacity:$JssorEasing$.$EaseLinear},$Opacity:2}
            ];

        var options = {
            $AutoPlay: true, 
            $AutoPlayInterval: 4000,
            $PauseOnHover: 1, 
            $CaptionSliderOptions: {
                $Class: $JssorCaptionSlider$,
                $CaptionTransitions: _CaptionTransitions,
                $PlayOutMode: 3
            },
            $SlideshowOptions: { 
                    $Class: $JssorSlideshowRunner$,  
                    $Transitions: _SlideshowTransitions, 
                    $TransitionsOrder: 1
            },
            $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$,
                $ChanceToShow: 2, 
                $AutoCenter: 2
            }
        };
        var jssor_slider1 = new $JssorSlider$("sliderhome", options);
    });
</script>
    <div id="sliderhome">
        <div u="loading" style="position: absolute; top: 0px; left: 0px;">
            <div style="filter: alpha(opacity=70); opacity:0.7; position: absolute; display: block;
                background-color: #000000; top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
            <div style="position: absolute; display: block; background: url(images/loading.gif) no-repeat center center;
                top: 0px; left: 0px;width: 100%;height:100%;">
            </div>
        </div>

        <div u="slides" class="content-slider">
            <div>
                <img u="image" src="images/fondos/slider1.jpg" />
                <div u=caption t="*" class="captionOrange">
                    <h3>Soluciones de prevención de mora y recupero de créditos</h3>
                    <p>Si necesitas un servicio de cobranzas rápido y eficiente para tu empresa sin costos excesivos Trinario es la solución que estás buscando.</p>
                </div>
            </div>
            <div>
                <img u="image" src="images/fondos/slider2.jpg" />
                <div u=caption t="*" class="captionOrange">
                    <h3>Logra el máximo resultado en el recupero</h3>
                    <p class="small">Para lograr el máximo resultado en el recupero y evitar la pérdida de tiempo y dinero, cuestión fundamental en la cobranza de los activos, es necesario contar con un socio que tenga la experiencia y el know-how adecuado, capaz de entender el negocio y de garantizar la máxima eficiencia.</p>
                </div>
            </div>
            <div>
                <img u="image" src="images/fondos/slider3.jpg" />
                <div u=caption t="*" class="captionOrange">
                    <h3>Mas de 10 años de experiencia nos avalan</h3>
                    <p class="small">La comprobada experiencia y éxitos concretados en más de 10 años avalan el nivel de profesionalidad y la confiabilidad de Trinario. Nuestros pilares de negocio son la alta tecnología, personal calificado y personalización del servicio.</p>
                </div>
            </div>
        </div>
        <span u="arrowleft" class="jssora02l" style="width: 55px; height: 55px; top: 123px; left: 8px;"></span>
        <span u="arrowright" class="jssora02r" style="width: 55px; height: 55px; top: 123px; right: 8px"></span>
    </div>
    
    <div id="content">
        <div class="ovh">
            <div class="col-left2">
                <div class="box-home">
                    <h2>Acerca de Nosotros</h2>
                    <img src="images/nosotros.png" alt="Nosotros - Trinario" align="left">
                    <p>Desde el 2003 Trinario es un Call Center que brinda servicios especializados y altamente profesionales de saneamiento de créditos extrajudiciales y Agencia de Recupero para bancos, entidades financieras y grandes empresas nacionales e internacionales.</p>
                    <a href="nosotros.php" class="readmore">Ver más</a>
                </div>
                <div class="separador mbottom30 mtop40"></div>
                <div class="box-home">
                    <h2>¿Por qué en Trinario?</h2>
                    <img src="images/por-que-elegirnos.png" alt="¿Por qué Elegirnos? - Trinario" align="left">
                    <p>Reducción de costos de personal, estructura e inversión, eliminando riesgos de management, políticos y sociales. Mayor flexibilidad por la posibilidad de ampliar la cobertura horaria especialmente en las horas más productivas... </p>
                    <a href="por-que-elegirnos.php" class="readmore">Ver más</a>
                </div>
            </div>
            <div class="col-right2">
                <h2 class="title">Nuestros Servicios</h2>
                <div class="box-service bdotted">
                    <span class="icon ico1"></span>
                    <h4>Servicios de recupero</h4>
                    <ul class="list">
                        <li>Prevención de mora</li>
                        <li>Gestión de recupero</li>
                    </ul>
                </div>
                <div class="box-service bdotted mtop10">
                    <span class="icon ico2"></span>
                    <h4>Telemarketing</h4>
                    <ul class="list">
                        <li>Promoción</li>
                        <li>Generacion de leads</li>
                    </ul>
                </div>
                <div class="box-service bdotted mtop10">
                    <span class="icon ico8"></span>
                    <h4>Saneamiento de créditos integral</h4>
                    <p>Tercerizar a profesionales todo el ciclo de la saneamiento de créditos...</p>
                </div>
                <div class="box-service mtop10 pbottom0">
                    <span class="icon ico4"></span>
                    <h4>Recupero de Mora temprana</h4>
                    <p>Recuperar rápido y evitar el aumento de clientes   en las fases de mora...</p>
                </div>
                <a href="servicios.php" class="readmore">Ver todos los servicios</a>
            </div>
        </div>
    </div>

<?php
    require_once("include/footer.php");
?>
