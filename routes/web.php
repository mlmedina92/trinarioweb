<?php

Route::get('/', function () {
    return view('inicio');
});

Route::get('/inicio', function(){
	return view('inicio');
});

/*Route::get('/consulta_deuda', function(){
    return view('consulta_deuda');
});*/

//Route::get('my-captcha','HomeController@myCaptcha')->name('myCaptcha');

//Route::post('my-captcha','HomeController@myCaptchaPost')->name('myCaptchaPost');

//Route::get('refresh_captcha','HomeController@refreshCaptcha')->name('refresh_captcha');

//Route::get('captcha_demo', 'Captcha@index');

/*Route::post('/send_info', function () { 
    $rules =  array('captcha' => ['required', 'captcha']); 
    $validator = Validator::make( 
        [ 'captcha' => Input::get('captcha') ], 
        $rules, 
        // Mensaje de error personalizado 
        [ 'captcha' => 'El captcha ingresado es incorrecto.' ]
    ); 
    if ($validator->passes()) { 
        echo "Todo Correcto, sigue codeando :)"; 
    } else { 
        return View::make('welcome')->withErrors($validator); 
    } 
});*/

/*Route::get('/captcha-test', function(){
	return view('captcha_demo');
});*/


Route::match('get','mensaje', 'CompromisoPago@mostrarMensaje')->name('mensaje');

Route::match('get','envio-mail', 'CompromisoPago@enviaEmail')->name('envio-mail');

//Route::match('get','envio-mail', 'MaiLController@SendMail')->name('envio-mail');

Route::match('post','consulta-deuda', 'ConsultaDeuda@listadeudas')->name('consulta-deuda');
Route::match('get','consulta-deuda', 'ConsultaDeuda@index')->name('consulta-deuda');

//Route::get('compromiso-pago/{id_titular}/{id_deuda}/{dni_titular}', 'CompromisoPago@MostrarCompromiso')->name('compromiso-pago');
Route::match('get','compromiso-pago', 'CompromisoPago@getMostrarCompromisoPost')->name('compromiso-pago');
Route::match('post','compromiso-pago', 'CompromisoPago@MostrarCompromisoPost')->name('compromiso-pago');

Route::match('post','carga-cuotas', 'CompromisoPago@cargacuotas')->name('carga-cuotas');
Route::match('get','carga-cuotas', 'CompromisoPago@getcargacuotas')->name('carga-cuotas');

Route::match('post','carga-importe-cuota', 'CompromisoPago@cargaimportecuota')->name('carga-importe-cuota');
Route::match('get','carga-importe-cuota', 'CompromisoPago@getcargaimportecuota')->name('carga-importe-cuota');

Route::match('post','refresh_captcha-demo', 'Captcha@actualizaCaptcha')->name('refresh_captcha-demo');
Route::match('get','refresh_captcha-demo', 'Captcha@getActualizaCaptcha')->name('refresh_captcha-demo');

Route::match('post','guardar-compromiso', 'CompromisoPago@guardarcompromiso')->name('guardar-compromiso');
Route::match('get','guardar-compromiso', 'CompromisoPago@getguardarcompromiso')->name('guardar-compromiso');


Route::match('post','codigo-confirmacion', 'Confirmacion@confirmacionCodigo')->name('codigo-confirmacion');
Route::match('get','codigo-confirmacion', 'Confirmacion@confirmacionCodigo')->name('codigo-confirmacion');

Route::match('post','enviar-confirmacion', 'Confirmacion@enviarCodigo')->name('enviar-confirmacion');
Route::match('get','enviar-confirmacion', 'Confirmacion@enviarCodigo')->name('enviar-confirmacion');

Route::match('post','enviar-codigo-confirmacion','Confirmacion@enviarCodigoConfirmacion')->name('enviar-codigo-confirmacion');
Route::match('get','enviar-codigo-confirmacion','Confirmacion@enviarCodigoConfirmacion')->name('enviar-codigo-confirmacion');

Route::match('post','verifica-codigo-confirmacion','Confirmacion@verificaCodigoConfirmacion')->name('verifica-codigo-confirmacion');
Route::match('get','verifica-codigo-confirmacion','Confirmacion@verificaCodigoConfirmacion')->name('verifica-codigo-confirmacion');

Route::match('post','verifica-codigo-confirmacion','Confirmacion@verificaCodigoConfirmacion')->name('verifica-codigo-confirmacion');
Route::match('get','verifica-codigo-confirmacion','Confirmacion@verificaCodigoConfirmacion')->name('verifica-codigo-confirmacion');

Route::match('post','reset-modal-confirmacion','Confirmacion@resetCodigoVerificacion')->name('reset-modal-confirmacion');
Route::match('get','reset-modal-confirmacion','Confirmacion@resetCodigoVerificacion')->name('reset-modal-confirmacion');