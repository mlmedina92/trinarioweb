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


	public function refreshCaptcha(){
    	return response()->json(['captcha'=>captcha_img()]);
    }

    public function actualizaCaptcha(Request $request){

        if ($request->isMethod('post')) {
            return response()->json(['captcha'=>captcha_img()]);
        }

        if($request->isMethod('get')){
            echo "DFKJHSDJAS";
        }

    }

    public function getActualizaCaptcha(){
        return redirect('consulta-deuda');
    }
}
