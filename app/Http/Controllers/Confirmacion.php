<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Mail\Welcome;

class Confirmacion extends Controller
{
    /*function EnviarConfirmacion($p_opcion, $p_dni, $p_sesion, $p_correo, $p_telefono){
    	if ($p_opcion == 1) {
    		EnviarConfirmacion($p_correo, $p_codigo);
    	}else if ($p_opcion == 2) {
    		EnviarPorSms($p_telefono, $p_codigo);
    	}
    	return 1;
    }*/

    /*function EnviarPorCorreo(p_correo, p_codigo){
    	$data = array(
	        'email_titular'     	=>  $email_titular,
	        'codigo_confirmacion'  	=>  $codigo_confirmacion
        );

        Mail::to($email_titular)->send(new SendMail($data));
    	return 1;
    }*/

    /*function EnviarPorSms(p_telefono, p_codigo){
    	return 1;
    }*/

    function confirmacionCodigo(){
        return View('codigo_confirmacion');
    }

    function enviarCodigo(){
        return View('enviar_confirmacion');
    }

    function enviarCodigoConfirmacion(Request $request){

        $p_opt_enviar_codigo        =   0;
        $p_id_sesion                =   "";
        $p_codigo_confirmacion      =   "";
        $p_codigo_confirmacion_tmp  =   "";
        $p_telefono_enviar_codigo   =   "";
        $p_email_enviar_codigo      =   "";
        $p_dni_titular              =   "";
        $p_opt_email                =   0;
        $p_opt_sms                  =   0;

        if ($request->isMethod('post')) { 
            $p_opt_enviar_codigo        = $request->input('p_opt_enviar_codigo');
            $p_telefono_enviar_codigo   = $request->input('p_telefono_enviar_codigo');
            $p_email_enviar_codigo      = $request->input('p_email_enviar_codigo');
            $p_dni_titular              = $request->input('p_dni_titular');
        }

        $length = 6;
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }

        $p_codigo_confirmacion = $randomString;
        
        DB::insert('CALL sp_inserta_confirmacion (?,?,?,?,?,?,?)', [$p_id_sesion, $p_codigo_confirmacion, $p_dni_titular, $p_opt_email, $p_opt_sms, $p_email_enviar_codigo, $p_telefono_enviar_codigo]);


        if ($p_opt_enviar_codigo == 1) {
            // Enviamos el codigo de confirmacion por correo electronico
            $p_opt_email = 1;
            $p_opt_sms = 0;

            $data = array(
                'name'      =>  'carlos',
                'message'   =>  'Hola, este es tu código de confirmación para que ingreses en la web de autoconsulta:  '.$randomString
            );

            Mail::to($p_email_enviar_codigo)->send(new Welcome($data));

        }else if($p_opt_enviar_codigo == 2) {
            // Enviamos el codigo de confirmacion por sms
            $p_opt_email = 0;
            $p_opt_sms = 1;

            $mensaje = "Hola, este es tu código de confirmación para que ingreses en la web de autoconsulta:  ".$randomString;
            $url = "http://wowland.us.to/smswww/cargaremota.php?numero=".$p_telefono_enviar_codigo."&mensaje=".urlencode($mensaje)."&apodo=factora2311";
            $ch = curl_init($url); // Inicia sesión cURL
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE); // Configura cURL para devolver el resultado como cadena
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // Configura cURL para que no verifique el peer del certificado dado que nuestra URL utiliza el protocolo HTTPS
            $info = curl_exec($ch); // Establece una sesión cURL y asigna la información a la variable $info
            curl_close($ch); // Cierra sesión cURL
            //return $info; // Devuelve la información de la función

        }

        return View('codigo_confirmacion');

    }

    function verificaCodigoConfirmacion(Request $request){

        $id_sesion                  = "ADAFSF";

        if ($request->isMethod('post')) { 
            $p_codigo_confirmacion      = $request->input('p_codigo_confirmacion');
            $p_telefono_enviar_codigo   = $request->input('p_telefono_enviar_codigo');
            $p_email_enviar_codigo      = $request->input('p_email_enviar_codigo');
            $p_dni_titular              = $request->input('p_dni_titular');
        }


        $cont_notif = 1;

        $confirmacion = DB::select('CALL sp_verifica_codigo_confirmacion(?, ?, ?)',[$id_sesion, $p_codigo_confirmacion, $p_dni_titular]);
        foreach ($confirmacion as $datos) {
            $cont_notif = $datos->cont_notif;
        }


        if($cont_notif >= 1){
            $deudas = DB::select('CALL sp_consulta_deudas(?)',[$p_dni_titular]);
            foreach ($deudas as $datos) {
                $id_titular = $datos->id_titular;
            }
            DB::insert('CALL sp_inserta_telefono_email (?,?,?,?)', [$id_titular, $p_dni_titular, $p_telefono_enviar_codigo, $p_email_enviar_codigo]);
            return View('listdeudas')->with('deudas', $deudas);

        }else if($cont_notif == 0){
            return -1;

        }

        
    }

    function resetCodigoVerificacion(Request $request){
         return View('enviar_confirmacion');
    }

}

