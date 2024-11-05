<?php
$nombre_titular = "";
foreach ($datos as $deuda) {
	$id_titular = $deuda->id_titular;
	$id_deuda = $deuda->id_deuda;
	$nombre = $deuda->nombre_titular;
	$dni = $deuda->dni_titular;
	$telefono = $deuda->telefono_titular;
	$email = $deuda->email_titular;
	$entidad = $deuda->entidad_deuda;
	$producto = $deuda->producto_deuda;
	$importe = $deuda->importe_deuda;
	$fecha_mora = $deuda->fecha_deuda;
	$codigo_rapipago = ($deuda->codigo_rapipago_deuda == "") ? "No se necesita código" :  $deuda->codigo_rapipago_deuda;
	$codigo_pagofacil = ($deuda->codigo_pagofacil_deuda == "") ? "No se necesita código" :  $deuda->codigo_pagofacil_deuda;
	$importe_cuota = $deuda->imp_cuota_01_deuda;
	$importe_cuota_02 = $deuda->imp_cuota_02_deuda;
	$importe_anticipo = $deuda->anticipo_deuda;
	$inst_pagofacil_inst_pago = $deuda->inst_pagofacil_inst_pago;
	$inst_rapipago_inst_pago = $deuda->inst_rapipago_inst_pago;
	$inst_transferencia_pago = $deuda->inst_transferencia_pago;

	$opciones_cuotas = "";
	//$opciones_cuotas .= ($deuda->imp_cuota_01_deuda > 0) ? '1,' : '';
	$opciones_cuotas .= ($deuda->imp_cuota_02_deuda > 0) ? '2,' : '';
	$opciones_cuotas .= ($deuda->imp_cuota_03_deuda > 0) ? '3,' : '';
	$opciones_cuotas .= ($deuda->imp_cuota_04_deuda > 0) ? '4,' : '';
	$opciones_cuotas .= ($deuda->imp_cuota_05_deuda > 0) ? '5,' : '';
	$opciones_cuotas .= ($deuda->imp_cuota_06_deuda > 0) ? '6,' : '';

	$opciones_cuotas = substr($opciones_cuotas, 0, strlen($opciones_cuotas)-1);

	$arr_fecha_mora          = explode("-", $fecha_mora);
    $new_fecha_mora          = $arr_fecha_mora[2]."/".$arr_fecha_mora[1]."/".$arr_fecha_mora[0];
}
?>

<style type="text/css">
	
	.popover{
		max-width: none;
		width: 500px;
	}

	/*.input-group .form-control {
	    position:;
	}*/
</style>

<div class="modal-dialog" style="width:800px">
	<div class="modal-content" id="payment_promise">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
				&times;
			</button>
			<h4 class="modal-title" id="myModalLabel" style="color: #29a22d; font-weight: bold">COMPROMISO DE PAGO</h4>
		</div>
		<div class="modal-body" style="padding-top: 12px; padding-bottom: 5px">
			<form id="form_compromiso_deuda" method="post">
				<!--<legend style="padding-top: 0px; margin-bottom: 10px">Información Personal</legend>-->
				<div class="alert alert-info fade in">
					<i class="fa-fw fa fa-user"></i>
					<strong>INFORMACIÓN PERSONAL</strong>
				</div>
				{!!csrf_field()!!}
				<div class="row">
					<div class="col-md-4">
						<div class="form-group" style="margin-bottom: 5px">
							<label for="category" style="color: #29a22d; font-weight: bold;"> Titular</label>
							<input name="txtTitular" id="txtTitular" id_titular="<?php echo "".$id_titular; ?>" id_deuda="<?php echo $id_deuda; ?>" type="text" class="form-control" id="tags" placeholder="Tags" value="{!!$nombre!!}" readonly="readonly" />
							<input type="hidden" name="titular" value="<?php echo $id_titular; ?>">
							<input type="hidden" name="deuda" value="<?php echo $id_deuda; ?>">
							<input type="hidden" name="imp_cuota_02" id="imp_cuota_02" value="<?php echo number_format($importe_cuota_02,0); ?>">

						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group"  style="margin-bottom: 5px">
							<label for="category" style="color: #29a22d; font-weight: bold;"> Email</label>
							<input name="txtEmailTitular" id="txtEmailTitular" type="text" class="form-control" id="tags" placeholder="Tags" value="<?php echo $email?>" readonly="readonly" />
							<input type="hidden" name="titular" value="{!!$id_titular!!}">
							<input type="hidden" name="deuda" value="<?php echo $id_deuda; ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group"  style="margin-bottom: 5px">
							<label for="tags" style="color: #29a22d; font-weight: bold;"> Teléfono</label>
							<input name="txtTelefonoTitular" id="txtTelefonoTitular" type="text" class="form-control" id="tags" placeholder="Tags" value="{!!$telefono!!}" readonly="readonly" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4">
						<div class="form-group"  style="margin-bottom: 5px">
							<label for="tags" style="color: #29a22d; font-weight: bold;"> DNI</label>
							<input name="txtDniTitular" id="txtDniTitular" type="text" class="form-control" id="tags" placeholder="Tags" value="{!!$dni!!}" readonly="readonly" />
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="category" style="color: #29a22d; font-weight: bold;"> Entidad</label>
							<input name="txtEntidad" id="txtEntidad" type="text" class="form-control" id="tags" placeholder="Tags" value="{!!$entidad!!}" readonly="readonly" />
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold;"> Producto</label>
							<input name="txtProducto" id="txtProducto" type="text" class="form-control" id="tags" placeholder="Tags" value="{!!$producto!!}" readonly="readonly" />
						</div>
					</div>

				</div>

				<!--<legend style="padding-top: 0px; margin-bottom: 10px">Información de Deuda</legend>-->

				<div class="alert alert-info fade in">
					<i class="fa-fw fa fa-dollar"></i>
					<strong> INFORMACIÓN DE DEUDA</strong>
				</div>

				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold;"> Importe de Deuda</label>
							<input name="txtImporte" id="txtImporte" type="text" class="form-control" id="tags" placeholder="Tags" value="$ {!! number_format($importe,0) !!}" readonly="readonly" />
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold;"> Fecha de Mora</label>
							<input type="text" id="txtFechaMora" name="txtFechaMora" class="form-control" id="tags" placeholder="Tags" value="{!!$new_fecha_mora!!}" readonly="readonly" />
						</div>
					</div>
				</div>
				
				<!--<legend style="padding-top: 0px; margin-bottom: 10px">Tipo de Pago</legend>-->

				<div class="alert alert-info fade in">
					<i class="fa-fw fa fa-th-large"></i>
					<strong>TIPO DE PAGO</strong>
				</div>

				<div class="row">
					<div class="col-md-8">
						<div class="form-group">
							<div class="row">
								<div class="col-md-12" style="padding-top: 8px">
									<label class="radio radio-inline no-margin">
									<input type="radio" name="opt_tipo_pago" id="opt_cancelatoria" value="1" class="radiobox style-2" data-bv-field="rating" checked="checked" onclick="charge_fees();">
									<span>Cancelatoria</span> </label>
									<label class="radio radio-inline no-margin">
									<input type="radio" name="opt_tipo_pago" id="opt_pago_cuotas" value="2" class="radiobox style-2" data-bv-field="rating" onclick="charge_fees();">
									<span>Pago en Cuotas</span> </label>
									<input type="hidden" id="txtOpcionesCuotas" name="txtOpcionesCuotas" class="form-control" id="tags" placeholder="Tags" value="{!!$opciones_cuotas!!}" readonly="readonly" />
								</div>
							</div>
						</div>
					</div>
				</div>



				<!--<div class="row">
					<div class="col-md-3" id="id_imp_anticipo_elemento" style="display:none">
						<label style="color: #29a22d; font-weight: bold;">Anticipo</label>
						<input type="text" class="form-control" placeholder="{!! number_format($deuda->anticipo_deuda,2) !!}" value="{!! $deuda->anticipo_deuda !!}" name="txtImporteAnticipo" id="txtImporteAnticipo" readonly="readonly" />
					</div>

					<div class="col-md-3" id="id_fec_anticipo_elemento" style="display:none">
						<label style="color: #29a22d; font-weight: bold;">Fecha Anticipo</label>
						<input type="text" class="form-control" placeholder="dd/mm/yyyy" value="" name="txtFechaAnticipo_normal" id="txtFechaAnticipo_normal" readonly="readonly" />
					</div>

				</div>-->

				<div class="row" id="id_tipo_pago_cancelatoria" style="display:">
					<div class="col-md-5">
						<div class="form-group">
							<label style="color: #29a22d; font-weight: bold;">Seleccionar fecha de cancelación</label>
							<div class="input-group">
								<input class="form-control fj-date" id="dtpicker" name="dtpicker" type="text" placeholder="Fecha de compromiso de pago" readonly="readonly">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group">
							<label for="category" style="color: #29a22d; font-weight: bold;"> N° de cuotas</label>
							<div id="cb_cuotas_una">
								<select class="form-control" id="cbTipoPago" name="cbTipoPago" readonly="readonly" onchange="change_fee();">
									<option value="1" selected="selected">01 Cuota</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold;" > Importe cancelatorio</label>
							<input type="text" class="form-control" placeholder="Tags" value="<?php echo number_format($importe_cuota,0); ?>" name="txtImporteCuota_una" id="txtImporteCuota_una" readonly="readonly" />
						</div>
					</div>

					<!--<div class="col-md-3" id="id_fec_anticipo_elemento_normal" style="display:none">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold; margin-bottom: 5px > Fecha 1ra Cuota</label>
							<input type="text" class="form-control" placeholder="dd/mm/yyyy" value="" name="txtFechaAnticipo" id="txtFechaAnticipo" readonly="readonly" />
						</div>
					</div>-->
				</div>


				<!--<div class="alert alert-info fade in">
					<i class="fa-fw fa fa-info"></i>
					<strong>Info!</strong> Para acceder al plan de pago en cuotas, debe pagar un anticipo.
				</div>-->

				<div id="id_tipo_pago_cuotas" style="display: none">

				<div style="padding-bottom: 8px; color: #305d8c; font-style: italic">
					<i class="fa-fw fa fa-file-text-o"></i>
					<strong>Nota:</strong> Para acceder al plan de pago en cuotas, debe pagar un anticipo.
				</div>

				<div class="row">
					<div class="col-md-5">
						<div class="form-group"  style="margin-bottom: 5px">
							<label style="color: #29a22d; font-weight: bold;">Seleccionar fecha de anticipo</label>
							<div class="input-group">
								<input class="form-control fj-date" id="dtpicker1" name="dtpicker1" type="text" placeholder="Fecha de compromiso de pago" readonly="readonly">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							</div>
						</div>
					</div>

					<div class="col-md-4" id="id_imp_anticipo_elemento">
						<label style="color: #29a22d; font-weight: bold;">Importe del anticipo</label>
						<input type="text" class="form-control" placeholder="{!! number_format($deuda->anticipo_deuda,0) !!}" value="{!! number_format($deuda->anticipo_deuda,0) !!}" name="txtImporteAnticipo" id="txtImporteAnticipo" readonly="readonly" />
					</div>

					<div class="col-md-3">
						
					</div>

				</div>

				<div class="row">
					<div class="col-md-5" id="id_fec_anticipo_elemento_normal">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold; margin-bottom: 5px" > Fecha de pago de la 1ra Cuota</label>
							<input type="text" class="form-control" placeholder="DD/MM/YYYY" value="" name="txtFechaAnticipo" id="txtFechaAnticipo" readonly="readonly" />
						</div>
					</div>


					<div class="col-md-4">
						<div class="form-group">
							<label for="category" style="color: #29a22d; font-weight: bold; margin-bottom: 5px"> N° de cuotas</label>
							<div id="cb_cuotas">
								<select class="form-control" id="cbTipoPago" name="cbTipoPago" readonly="readonly" onchange="change_fee();">
									<option value="1" selected="selected">01 Cuota</option>
								</select>
							</div>
						</div>
					</div>

					<div class="col-md-3">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold; margin-bottom: 5px" > Importe de cada cuota</label>
							<input type="text" class="form-control" placeholder="Tags" value="<?php echo number_format($importe_cuota,0); ?>" name="txtImporteCuota" id="txtImporteCuota" readonly="readonly" />
						</div>
					</div>

				</div>

				<div style="padding-bottom: 10px; color: #305d8c; font-style: italic">
					<i class="fa-fw fa fa-file-text-o"></i>
					<strong>Nota:</strong> Las cuotas son iguales, mensuales y consecutivas. En caso de incumplimiento de cualquier pago en las fechas acordadas, el acuerdo se dará de baja y el saldo se actualizará y será inmediatamente exigible.
				</div>

				</div>

				<div class="alert alert-info fade in">
					<i class="fa-fw fa fa-credit-card"></i>
					<strong>Forma de Pago Habilitada</strong>
				</div>

				<!--<legend style="padding-top: 0px; margin-bottom: 10px">Forma de Pago</legend>-->

				<div class="row">				
					<div class="col-md-12">
						<div class="row">				
							<div class="col-md-3">
								<label for="tags" style="color: #29a22d; font-weight: bold; margin-top: 7px"> Código RAPIPAGO:</label>
							</div>
							<div class="col-md-6">
								<input name="txtImporte" id="txtImporte" type="text" class="form-control" placeholder="Tags" value="{!!$codigo_rapipago!!}" readonly="readonly" style="margin-bottom: 8px; background-color: #BDBDBD; color: #000000">
							</div>
							<div class="col-md-3" style="margin-top: 7px">
								<a href="javascript:void(0);" rel="popover" data-placement="top" data-original-title="¿Cómo pagar?" data-html="true" data-content="<label>{!!$inst_rapipago_inst_pago!!}</strong>">¿Cómo pagar? Click aquí</a>
							</div>
						</div>
					</div>
				</div>

				<div class="row">				
					<div class="col-md-12">
						<div class="row">				
							<div class="col-md-3">
								<label for="tags" style="color: #29a22d; font-weight: bold; margin-top: 7px"> Código PAGOFACIL:</label>
							</div>
							<div class="col-md-6">
								<!--<a href="javascript:void(0);" class="btn btn-default" style=""> <strong>{!!$codigo_pagofacil!!}</strong></a>-->
								<input name="txtImporte" id="txtImporte" type="text" class="form-control" placeholder="Tags" value="{!!$codigo_pagofacil!!}" readonly="readonly" style="margin-bottom: 8px; background-color: #BDBDBD; color: #000000">
							</div>
							<div class="col-md-3" style="margin-top: 7px">
								<a href="javascript:void(0);" rel="popover" data-placement="top" data-original-title="¿Cómo pagar?" data-html="true" data-content="<label>{!!$inst_pagofacil_inst_pago!!}</strong>">¿Cómo pagar? Click aquí</a>

							</div>
						</div>
					</div>
				</div>	

				<div class="row" style="padding-bottom: 10px">				
					<div class="col-md-12">
						<div class="row">				
							<div class="col-md-3">
								<label for="tags" style="color: #29a22d; font-weight: bold; margin-top: 7px"> Otras formas de pago:</label>
							</div>
							<div class="col-md-6">

							</div>
							<div class="col-md-3" style="margin-top: 7px">
								<a href="javascript:void(0);" rel="popover" data-placement="top" data-original-title="¿Cómo pagar?" data-html="true" data-content="<strong><label style='font-weight: bold; text-decoration-line:underline'>Instrucciones por Transferencia Bancaria:</label></strong><br>{!!$inst_transferencia_pago!!}">¿Cómo pagar? Click aquí</a>
							</div>
						</div>
					</div>
				</div>								

				<div class="alert alert-info fade in">
					<i class="fa-fw fa fa-thumbs-o-up"></i>
					<strong>CONFIRMACIÓN DE PROMESA</strong>
				</div>

				<div id="id_resumen_comp_cancelatoria">
					<div class="alert alert-success fade in">
						<i class="fa-fw fa fa-check"></i>
						Registramos una <strong>Cancelacion</strong> de <strong> $ <?php echo number_format($importe_cuota,0); ?> </strong> para el <strong id="id_fecha_cancelatoria"> dd/mm/yyyy </strong>
					</div>
				</div>

				<div id="id_resumen_comp_anticipo" style="display: none">
					<div class="alert alert-success fade in">
						<i class="fa-fw fa fa-smile-o"></i>
						Registramos un <strong>Anticipo</strong> de <strong> $ <?php echo number_format($deuda->anticipo_deuda,0) ?> </strong> pesos para el <strong id="id_fecha_anticipo"> dd/mm/yyyy </strong> y un pago de <strong id="id_nro_cuotas_st"> 2 </strong> cuotas de <strong id="id_importe_anticipo_st"> $ <?php echo number_format($importe_cuota,0); ?></strong> cada una.
					</div>
				</div>

				<!--<div class="row">
					<div class="col-md-8">
					<div class="col-md-4" style="padding-right: 0px">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold;"> Codigo RapiPago</label>
							<a href="javascript:void(0);" class="btn btn-default" style=""> <strong>{!!$codigo_rapipago!!}</strong></a>
							<a href="javascript:void(0);" class="btn btn-default txt-color-orange" rel="popover" data-placement="top" data-original-title="¿Como pagar?" data-html="true" data-content="<label>{!!$inst_rapipago_inst_pago!!}</strong><br><br><strong><label style='font-weight: bold; text-decoration-line:underline'>Instrucciones por Transferencia Bancaria:</label></strong><br>{!!$inst_transferencia_pago!!}"><i class="fa fa-info-circle fa-lg"></i></a>

						</div>
					</div>
					<div class="col-md-8" style="padding-right: 0px">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold;"> Codigo PagoFacil</label>
							<a href="javascript:void(0);" class="btn btn-default" style=""> <strong>{!!$codigo_pagofacil!!}</strong></a>

							<a href="javascript:void(0);" class="btn btn-default txt-color-orange" rel="popover" data-placement="top" data-original-title="¿Como pagar?" data-html="true" data-content="<label>{!!$inst_pagofacil_inst_pago!!}</strong><br><br><strong><label style='font-weight: bold; text-decoration-line:underline'>Instrucciones por Transferencia Bancaria:</label></strong><br>{!!$inst_transferencia_pago!!}"><i class="fa fa-info-circle fa-lg"></i></a>
						</div>
					</div>
					</div>
				</div>-->

				<!--<div class="row">
					<div class="col-sm-6">
						<label style="color: #29a22d; font-weight: bold;">Fecha de compromiso de pago</label>
					</div>
					<div class="col-sm-3" id="id_titulo_anticipo" style="display:none">
						<label style="color: #29a22d; font-weight: bold;">Anticipo</label>
					</div>
					<div class="col-sm-3" id="id_titulo_fecha_anticipo" style="display:none">
						<label style="color: #29a22d; font-weight: bold;">Fecha Anticipo</label>
					</div>
				</div>-->

				<!--<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<div class="input-group">
								<input class="form-control fj-date" id="dtpicker" name="dtpicker" type="text" placeholder="Fecha de compromiso de pago" readonly="readonly">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							</div>
						</div>
					</div>
					<div class="col-md-3" id="id_elemento_anticipo" style="display:none">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="0.00" value="<?php echo $importe_anticipo; ?>" name="txtImporteAnticipo" id="txtImporteAnticipo" readonly="readonly" />
						</div>
					</div>
					<div class="col-md-3" id="id_elemento_fecha_anticipo" style="display:none">
						<div class="form-group">
							<input type="text" class="form-control" placeholder="dd/mm/yyyy" value="" name="txtFechaAnticipo" id="txtFechaAnticipo" readonly="readonly" />
						</div>
					</div>
				</div>-->

				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal" id="btnCancelarCompromiso">
						Cancelar
					</button>
					<button type="button" id="btn_guardar_compromiso" onclick="save_payment_promise();" class="btn btn-primary" style="background-color: #29a22d">
						Guardar compromiso de pago
					</button>
				</div>
			</form>
		</div>
	</div>
</div>
