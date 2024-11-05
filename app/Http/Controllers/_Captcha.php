<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Captcha extends Controller
{
    
    //Route::get('captcha_demo', 'Captcha@index');
    public function index(){
		//return View('consulta_deuda_temp');
		return View('captcha_demo');
	}
}
