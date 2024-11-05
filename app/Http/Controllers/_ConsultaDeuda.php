<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultaDeuda extends Controller
{

	public function index(){
		//return View('consulta_deuda_temp');
		return View('consulta_deuda_dev');
	}

	public function demo(){
		return View('demo');
	}

	public function listall(){
		//echo "fsfddfaf";
		$deudas = DB::select('select a.entidad_deuda, b.nombre_titular, b.dni_titular, a.fecha_deuda, a.producto_deuda, a.importe_deuda from tbl_deuda a inner join tbl_titular b on a.id_titular = b.id_titular where b.dni_titular = :doc', ['doc' => '4417070']);
		return View('listall')->with('deudas', $deudas);
	}

	//public function listadeudas($dni, $telefono, $email){
	public function listadeudas(Request $request){
		
		$dni = $request->input("txtDni");
		$telefono = $request->input("txtTelefono");
		$email = $request->input("txtEmail");

		//echo $dni." - ".$telefono." - ".$email;

		if (request()->getMethod() == 'POST') {
	        $rules = ['captcha' => 'required|captcha'];
	        $validator = validator()->make(request()->all(), $rules);
	        if ($validator->fails()) {
	            echo '<p style="color: #ff0000;">Incorrect!</p>';
	        } else {
	            //return view('bienvenido_captcha');
	            $deudas = DB::select("select a.id_deuda, a.entidad_deuda, b.nombre_titular, b.dni_titular, a.fecha_deuda, a.producto_deuda, a.importe_deuda from tbl_deuda a inner join tbl_titular b on a.id_titular = b.id_titular where b.dni_titular = '$dni'");
				return View('listdeudas')->with('deudas', $deudas);
	        }
	    }



		/*$deudas = DB::select("select a.entidad_deuda, b.nombre_titular, b.dni_titular, a.fecha_deuda, a.producto_deuda, a.importe_deuda from tbl_deuda a inner join tbl_titular b on a.id_titular = b.id_titular where b.dni_titular = '$dni'");
		return View('listdeudas')->with('deudas', $deudas);*/
		/*if (request()->getMethod() == 'POST') {
	        $rules = ['captcha' => 'required|captcha'];
	        $validator = validator()->make(request()->all(), $rules);
	        if ($validator->fails()) {
	            echo '<p style="color: #ff0000;">Incorrect!</p>';
	        } else {
	            return view('bienvenido_captcha');
	        }
	    }*/
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
