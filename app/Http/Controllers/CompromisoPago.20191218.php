<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;
use App\Mail\Welcome;

class CompromisoPago extends Controller
{
    public function MostrarCompromiso($id_titular, $id_deuda, $dni_titular){

        $datos_compromiso = DB::select('CALL sp_consulta_datos(?,?,?)',[$id_titular, $id_deuda, $dni_titular]);
		return View('compromiso_pago')->with('datos', $datos_compromiso);

    }

    public function MostrarCompromisoPost(Request $request){
        if ($request->isMethod('post')) {
            $id_titular         = $request->input('p_valor1');
            $dni_titular        = $request->input('p_valor3');
            $id_deuda           = $request->input('p_valor2');
            $datos_compromiso = DB::select('CALL sp_consulta_datos(?,?,?)',[$id_titular, $id_deuda, $dni_titular]);
            return View('compromiso_pago')->with('datos', $datos_compromiso);
        }
    }


    public function enviaEmail(){
         $data = array(
                    'name'      =>  'carlos',
                    'message'   =>  'hola'
                );
        Mail::to('budspencerdev@gmail.com')->send(new Welcome($data));
    }

    public function guardarcompromiso(Request $request){
        if($request->isMethod('post')){
            $id_titular         = $request->input('titular');
            $nombre_titular     = $request->input('txtTitular');
            $dni_titular        = $request->input('txtDniTitular');
            $email_titular      = $request->input('txtEmailTitular');
            $telefono_titular   = $request->input('txtTelefonoTitular');
            $id_deuda           = $request->input('deuda');
            $entidad_deuda      = $request->input('txtEntidad');
            $producto_deuda     = $request->input('txtProducto');
            $importe_deuda      = $request->input('txtImporte');
            $fecha_mora         = $request->input('txtFechaMora');
            $codigo_rapipago    = $request->input('txtCodigoRapiPago');
            $codigo_pagofacil   = $request->input('txtCodigoPagoFacil');
            $tipo_pago          = $request->input("opt_tipo_pago");
            $n_tipo_pago        = ($tipo_pago == 1) ? "Cancelatoria" : "Pago en Cuotas";
            $nro_cuota          = $request->input("cbTipoPago");
            $importe_cuota      = $request->input("txtImporteCuota");
            $fecha_compromiso   = $request->input("dtpicker");

            $arr_fecha          = explode("/", $fecha_compromiso);
            $new_fecha          = $arr_fecha[2]."-".$arr_fecha[1]."-".$arr_fecha[0];

            DB::insert('CALL sp_insert_compromiso_pago (?,?,?,?,?,?)', [$id_deuda, $dni_titular, $tipo_pago, $new_fecha, $nro_cuota, $importe_cuota]);

            $data = array(
                'nombre_titular'    =>  $nombre_titular,
                'dni_titular'       =>  $dni_titular,
                'email_titular'     =>  $email_titular,
                'telefono_titular'  =>  $telefono_titular,
                'entidad_deuda'     =>  $entidad_deuda,
                'producto_deuda'    =>  $producto_deuda,
                'importe_deuda'     =>  $importe_deuda,
                'fecha_mora'        =>  $fecha_mora,
                'codigo_rapipago'   =>  $codigo_rapipago,
                'codigo_pagofacil'  =>  $codigo_pagofacil,
                'tipo_pago'         =>  $n_tipo_pago,
                'nro_cuota'         =>  $nro_cuota,
                'importe_cuota'     =>  $importe_cuota,
                'fecha_compromiso'  =>  $fecha_compromiso
            );

            Mail::to($email_titular)->send(new SendMail($data));
        }
    }


    public function mostrarMensaje(){
        return View('mensaje');
    }

    public function cargacuotas(Request $request){
        if ($request->isMethod('post')) {
            $tipo_pago = $request->input('opt_tipo_pago');
            if ($tipo_pago == 1) {
                             
            }
        }
    }

    public function cargaimportecuota(Request $request){

        if($request->isMethod('post')){
            $id_deuda = $request->input('deuda');
            $cuota = $request->input('cbTipoPago');
            $datos_cuota = DB::select('CALL sp_cpnsulta_importe_cuota(?, ?)', [$cuota, $id_deuda]);
            foreach ($datos_cuota as $consulta_importe) {
                $importe = $consulta_importe->importe_cuota;
            } 
            return $importe;
        }
    }

    //Metodos GET
    public function getMostrarCompromisoPost(){
        return redirect('consulta-deuda');
    }

    public function getguardarcompromiso(){
        return redirect('consulta-deuda');
    }

    public function getcargacuotas(){
        return redirect('consulta-deuda');   
    }

    public function getcargaimportecuota(){
        return redirect('consulta-deuda');
    }
}
