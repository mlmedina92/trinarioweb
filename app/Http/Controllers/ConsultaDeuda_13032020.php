<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\DB;
use DB;

class ConsultaDeuda extends Controller
{

	public function index(){
		return view('consulta_deuda');
	}

	public function demo(){
		return View('demo');
	}

	public function listadeudas(Request $request){
		//dump($request);

		if($request->isMethod('post')){
			$dni 		= $request->input("txtDni");
			$telefono 	= $request->input("txtTelefono");
			$email 		= $request->input("txtEmail");

			if (request()->getMethod() == 'POST') {
		        $rules 		= ['captcha' => 'required|captcha'];
		        $validator	= validator()->make(request()->all(), $rules);
		        if ($validator->fails()) {
		            return View('listall');
		        } else {
		            $deudas = DB::select('CALL sp_consulta_deudas(?)',[$dni]);
		            foreach ($deudas as $datos) {
		                $id_titular = $datos->id_titular;
		            } 
		            DB::insert('CALL sp_inserta_telefono_email (?,?,?,?)', [$id_titular, $dni, $telefono, $email]);
					return View('listdeudas')->with('deudas', $deudas);
		        }
		    }

		}

	}

	public function captchavalida(Request $request){

		if (request()->getMethod() == 'POST') {
	        $rules = ['captcha' => 'required|captcha'];
	        $validator = validator()->make(request()->all(), $rules);
	        if ($validator->fails()) {
	            echo '<p style="color: #ff0000;">Incorrect!</p>';
	        } else {
	            return view('bienvenido_captcha');
	        }
	    }

	}

}
