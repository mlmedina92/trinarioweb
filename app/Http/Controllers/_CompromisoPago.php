<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompromisoPago extends Controller
{
    public function MostrarCompromiso($dni, $id_deuda){
    	//echo "DNI:".$dni;
    	/*if ($request->isMethod('post')){
            $dni = $request->input("dni");
            var_dump($dni);
        }*/
		/*$datos_deuda = DB::select('select a.entidad_deuda, b.nombre_titular, b.dni_titular, a.fecha_deuda, a.producto_deuda, a.importe_deuda from tbl_deuda a inner join tbl_titular b on a.id_titular = b.id_titular where b.dni_titular = :doc', ['doc' => '4417070']);*/
		//return View('compromiso_pago')->with('deudas', $datos_deuda);

		$datos_compromiso = DB::select('select a.id_deuda, b.id_titular, a.entidad_deuda, b.nombre_titular, b.dni_titular, a.fecha_deuda, a.producto_deuda, a.importe_deuda, codigo_rapipago_deuda, codigo_pagofacil_deuda from tbl_deuda a inner join tbl_titular b on a.id_titular = b.id_titular where a.id_deuda = :id', ['id' => $id_deuda]);
		return View('compromiso_pago')->with('datos', $datos_compromiso);
    	//return View('compromiso_pago');
    }
}
