<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('inicio');
});

Route::get('/inicio', function(){
	return view('inicio');
});


Route::get('/consulta_deuda_dev', function(){
	return view('consulta_deuda_dev');
});

/*Route::get('/conoce-tu-deuda', function(){
	return view('consulta_deuda_temp');
});*/

Route::get('demo', 'ConsultaDeuda@demo');

Route::get('consulta-deuda', 'ConsultaDeuda@index');

Route::get('listall', 'ConsultaDeuda@listall');

//Route::get('listadeudas/{dni}/{telefono}/{email}', 'ConsultaDeuda@listadeudas');
//Route::post('listadeudas', 'ConsultaDeuda@listadeudas')->name('lista_deudas');

Route::get('my-captcha','HomeController@myCaptcha')->name('myCaptcha');

Route::post('my-captcha','HomeController@myCaptchaPost')->name('myCaptchaPost');

Route::get('refresh_captcha','HomeController@refreshCaptcha')->name('refresh_captcha');

Route::get('captcha_demo', 'Captcha@index');

Route::post('/send_info', function () { 
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
});

Route::get('/captcha-test', function(){
	return view('captcha_demo');
});

// [your site path]/Http/routes.php
//Route::post('captcha-valida', 'ConsultaDeuda@captchavalida')->name('captchavalida');
Route::match('post','consulta-deuda', 'ConsultaDeuda@listadeudas')->name('consulta-deuda');



//Route::match('post','compromiso-pago', 'CompromisoPago@MostrarCompromiso')->name('compromiso-pago');
//Route::match('post','compromiso-pago', 'CompromisoPago@MostrarCompromiso')->name('compromiso-pago');
//Route::post('compromiso-pago', 'CompromisoPago@MostrarCompromiso')->name('compromiso-pago');

Route::get('compromiso-pago/{dni}/{id_deuda}', 'CompromisoPago@MostrarCompromiso')->name('compromiso-pago');

    /*if (request()->getMethod() == 'POST') {
        $rules = ['captcha' => 'required|captcha'];
        $validator = validator()->make(request()->all(), $rules);
        if ($validator->fails()) {
            echo '<p style="color: #ff0000;">Incorrect!</p>';
        } else {
            return view('bienvenido_captcha');
        }
    }*/
