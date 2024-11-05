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
	$codigo_rapipago = $deuda->codigo_rapipago_deuda;
	$codigo_pagofacil = $deuda->codigo_pagofacil_deuda;
	$importe_cuota = $deuda->imp_cuota_01_deuda;
	$importe_cuota_02 = $deuda->imp_cuota_02_deuda;
	$importe_anticipo = $deuda->anticipo_deuda;
	$inst_pagofacil_inst_pago = $deuda->inst_pagofacil_inst_pago;
	$inst_rapipago_inst_pago = $deuda->inst_rapipago_inst_pago;

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

<div class="modal-dialog" style="width:800px">
	<div class="modal-content" id="payment_promise">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
				&times;
			</button>
			<h4 class="modal-title" id="myModalLabel" style="color: #29a22d; font-weight: bold">COMPROMISO DE PAGO</h4>
		</div>
		<div class="modal-body">
			<form id="form_compromiso_deuda" method="post">
				{!!csrf_field()!!}
				<div class="row">
					<div class="col-md-7">
						<div class="form-group">
							<label for="category" style="color: #29a22d; font-weight: bold;"> Titular</label>
							<input name="txtTitular" id="txtTitular" id_titular="<?php echo "".$id_titular; ?>" id_deuda="<?php echo $id_deuda; ?>" type="text" class="form-control" id="tags" placeholder="Tags" value="{!!$nombre!!}" readonly="readonly" />
							<input type="hidden" name="titular" value="<?php echo $id_titular; ?>">
							<input type="hidden" name="deuda" value="<?php echo $id_deuda; ?>">
							<input type="hidden" name="imp_cuota_02" id="imp_cuota_02" value="<?php echo number_format($importe_cuota_02,2); ?>">

						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold;"> Dni</label>
							<input name="txtDniTitular" id="txtDniTitular" type="text" class="form-control" id="tags" placeholder="Tags" value="{!!$dni!!}" readonly="readonly" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-7">
						<div class="form-group">
							<label for="category" style="color: #29a22d; font-weight: bold;"> Email</label>
							<input name="txtEmailTitular" id="txtEmailTitular" type="text" class="form-control" id="tags" placeholder="Tags" value="<?php echo $email?>" readonly="readonly" />
							<input type="hidden" name="titular" value="{!!$id_titular!!}">
							<input type="hidden" name="deuda" value="<?php echo $id_deuda; ?>">
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold;"> Telefono</label>
							<input name="txtTelefonoTitular" id="txtTelefonoTitular" type="text" class="form-control" id="tags" placeholder="Tags" value="{!!$telefono!!}" readonly="readonly" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-7">
						<div class="form-group">
							<label for="category" style="color: #29a22d; font-weight: bold;"> Entidad</label>
							<input name="txtEntidad" id="txtEntidad" type="text" class="form-control" id="tags" placeholder="Tags" value="{!!$entidad!!}" readonly="readonly" />
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold;"> Producto</label>
							<input name="txtProducto" id="txtProducto" type="text" class="form-control" id="tags" placeholder="Tags" value="{!!$producto!!}" readonly="readonly" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold;"> Imp. de Deuda</label>
							<input name="txtImporte" id="txtImporte" type="text" class="form-control" id="tags" placeholder="Tags" value="{!! number_format($importe,2) !!}" readonly="readonly" />
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold;"> Fecha de Mora</label>
							<input type="text" id="txtFechaMora" name="txtFechaMora" class="form-control" id="tags" placeholder="Tags" value="{!!$new_fecha_mora!!}" readonly="readonly" />
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold;"> Codigo RapiPago</label>
							<!--<div class="col-sm-12" style="padding-left: 0px; padding-right: 0px">
								<div class="input-group">
									<input class="form-control" id="appendbutton" type="text">
									<div class="input-group-btn">
										<button class="btn btn-default" type="button" rel="popover" data-placement="bottom" data-original-title="Popover Down" data-content="RAPIPAGO: realizar el pago a nombre de CREDITO DIRECTO codigo 3507, informando el DNI y el monto">
											<i class="fa fa-info"></i>
										</button>
									</div>
								</div>
							</div>-->
							<a href="javascript:void(0);" class="btn btn-default" rel="popover" data-placement="bottom" data-original-title="¿Como pagar?" data-content="{!!$inst_pagofacil_inst_pago!!}" style="width:170px"> <strong>{!!$codigo_rapipago!!}</strong></a>
							<!--<a href="javascript:void(0);" class="btn btn-default" rel="popover" data-placement="bottom" data-original-title="Popover Down" data-content="RAPIPAGO: realizar el pago a nombre de CREDITO DIRECTO codigo 3507, informando el DNI y el monto"><i class="fa fa-arrow-down"></i></a>

							<input type="text" id="txtCodigoRapiPago" name="txtCodigoRapiPago" class="form-control" id="tags" placeholder="Tags" value="{!!$codigo_rapipago!!}" readonly="readonly" style="border-color: #29a22d; background-color:#29a22d;  border-width: 3px;color:#FFFFFF; font-weight: bold; text-align: center" />-->
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold;"> Codigo PagoFacil</label>
							<!--<input type="text" id="txtCodigoPagoFacil" name="txtCodigoPagoFacil" class="form-control" id="tags" placeholder="Tags" value="{!!$codigo_pagofacil!!}" readonly="readonly" style="border-color: #29a22d; background-color:#29a22d;  border-width: 3px;color:#FFFFFF; font-weight: bold; text-align: center"  />-->

							<a href="javascript:void(0);" class="btn btn-default" rel="popover" data-placement="bottom" data-original-title="¿Como pagar?" data-content="{!!$inst_rapipago_inst_pago!!}" style="width:300px"> <strong>{!!$codigo_pagofacil!!}</strong></a>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6">
					<div class="form-group">
						<label class="control-label" style="color: #29a22d; font-weight: bold;">Tipo de Pago</label>
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
					<div class="col-md-3" id="id_imp_anticipo_elemento" style="display:none">
						<label style="color: #29a22d; font-weight: bold;">Anticipo</label>
						<input type="text" class="form-control" placeholder="{!! number_format($deuda->anticipo_deuda,2) !!}" value="{!! $deuda->anticipo_deuda !!}" name="txtImporteAnticipo" id="txtImporteAnticipo" readonly="readonly" />
					</div>

					<div class="col-md-3" id="id_fec_anticipo_elemento" style="display:none">
						<label style="color: #29a22d; font-weight: bold;">Fecha Anticipo</label>
						<input type="text" class="form-control" placeholder="dd/mm/yyyy" value="" name="txtFechaAnticipo_normal" id="txtFechaAnticipo_normal" readonly="readonly" />
					</div>

				</div>

				<div class="row">
					<div class="col-md-4">
						<div class="form-group">
							<label style="color: #29a22d; font-weight: bold;">Fecha de comp. de pago</label>
							<div class="input-group">
								<input class="form-control fj-date" id="dtpicker" name="dtpicker" type="text" placeholder="Fecha de compromiso de pago" readonly="readonly">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							</div>
						</div>
					</div>



					<div class="col-md-3">
						<div class="form-group">
							<label for="category" style="color: #29a22d; font-weight: bold;"> N° Cuotas</label>
							<div id="cb_cuotas">
								<select class="form-control" id="cbTipoPago" name="cbTipoPago" readonly="readonly" onchange="change_fee();">
									<option value="1" selected="selected">01 Cuota</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-2">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold;" > Imp Cuota</label>
							<input type="text" class="form-control" placeholder="Tags" value="<?php echo number_format($importe_cuota,2); ?>" name="txtImporteCuota" id="txtImporteCuota" readonly="readonly" />
						</div>
					</div>
					<div class="col-md-3" id="id_fec_anticipo_elemento_normal" style="display:none">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold;" > Fecha 1ra Cuota</label>
							<input type="text" class="form-control" placeholder="dd/mm/yyyy" value="" name="txtFechaAnticipo" id="txtFechaAnticipo" readonly="readonly" />
						</div>
					</div>

				</div>

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
