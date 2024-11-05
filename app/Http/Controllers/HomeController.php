<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/*class HomeController extends Controller
{
    public function myCaptcha(){
    	//return view(view:'myCaptcha');
    	return View('myCaptcha');
    }

    public function myCaptchaPost(Request $request){
    	$request->validate([
    		'email'=>'required|email',
    		'password'=>'required',
    		'captcha'=>'required|captcha'
    	],['captcha.captcha'=>'Invalid Captcha Code.']);
    }

    public function refreshCaptcha(){
    	return response()->json(['captcha'=>captcha_img()]);
    }
}*/

class HomeController extends Controller
{
    public function myCaptcha(){
    	//return view(view:'myCaptcha');
    	return View('myCaptcha');
    }

    public function myCaptchaPost(Request $request){
    	$request->validate([
    		'email'=>'required|email',
    		'password'=>'required',
    		'captcha'=>'required|captcha'
    	],['captcha.captcha'=>'Invalid Captcha Code.']);

    	if ($request->passes()) { 
	        echo "Todo Correcto, sigue codeando :)"; 
	    } else { 
	        return View::make('bienvenido_captcha')->withErrors($request); 
	    }
    }

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

    public function refreshCaptcha(){
    	return response()->json(['captcha'=>captcha_img()]);
    }
}
