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

	$arr_fecha_mora          = explode("-", $fecha_mora);
    $new_fecha_mora          = $arr_fecha_mora[2]."/".$arr_fecha_mora[1]."/".$arr_fecha_mora[0];
} 
?>

<div class="modal-dialog">
	<div class="modal-content" id="payment_promise">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
				&times;
			</button>
			<h4 class="modal-title" id="myModalLabel" style="color: #29a22d; font-weight: bold">COMPROMISO DE PAGO</h4>
		</div>
		<div class="modal-body">
			<form id="form_compromiso_deuda" method="post">
				{{csrf_field()}}
				<div class="row">
					<div class="col-md-7">
						<div class="form-group">
							<label for="category" style="color: #29a22d; font-weight: bold;"> Titular</label>
							<input name="txtTitular" id="txtTitular" id_titular="<?php echo $id_titular; ?>" id_deuda="<?php echo $id_deuda; ?>" type="text" class="form-control" id="tags" placeholder="Tags" value="<?php echo $nombre?>" readonly="readonly" />
							<input type="hidden" name="titular" value="<?php echo $id_titular; ?>">
							<input type="hidden" name="deuda" value="<?php echo $id_deuda; ?>">
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold;"> Dni</label>
							<input name="txtDniTitular" id="txtDniTitular" type="text" class="form-control" id="tags" placeholder="Tags" value="<?php echo $dni?>" readonly="readonly" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-7">
						<div class="form-group">
							<label for="category" style="color: #29a22d; font-weight: bold;"> Email</label>
							<input name="txtEmailTitular" id="txtEmailTitular" type="text" class="form-control" id="tags" placeholder="Tags" value="<?php echo $email?>" readonly="readonly" />
							<input type="hidden" name="titular" value="<?php echo $id_titular; ?>">
							<input type="hidden" name="deuda" value="<?php echo $id_deuda; ?>">
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold;"> Telefono</label>
							<input name="txtTelefonoTitular" id="txtTelefonoTitular" type="text" class="form-control" id="tags" placeholder="Tags" value="<?php echo $telefono?>" readonly="readonly" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-7">
						<div class="form-group">
							<label for="category" style="color: #29a22d; font-weight: bold;"> Entidad</label>
							<input name="txtEntidad" id="txtEntidad" type="text" class="form-control" id="tags" placeholder="Tags" value="<?php echo $entidad?>" readonly="readonly" />
						</div>
					</div>
					<div class="col-md-5">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold;"> Producto</label>
							<input name="txtProducto" id="txtProducto" type="text" class="form-control" id="tags" placeholder="Tags" value="<?php echo $producto ?>" readonly="readonly" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-3">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold;"> Importe de Deuda</label>
							<input name="txtImporte" id="txtImporte" type="text" class="form-control" id="tags" placeholder="Tags" value="<?php echo $importe ?>" readonly="readonly" />
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold;"> Fecha de Mora</label>
							<input type="text" id="txtFechaMora" name="txtFechaMora" class="form-control" id="tags" placeholder="Tags" value="<?php echo $new_fecha_mora ?>" readonly="readonly" />
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold;"> Codigo RapiPago</label>
							<input type="text" id="txtCodigoRapiPago" name="txtCodigoRapiPago" class="form-control" id="tags" placeholder="Tags" value="<?php echo $codigo_rapipago ?>" readonly="readonly" style="border-color: #29a22d; background-color:#29a22d;  border-width: 3px;color:#FFFFFF; font-weight: bold; text-align: center" />
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold;"> Codigo PagoFacil</label>
							<input type="text" id="txtCodigoPagoFacil" name="txtCodigoPagoFacil" class="form-control" id="tags" placeholder="Tags" value="<?php echo $codigo_pagofacil ?>" readonly="readonly" style="border-color: #29a22d; background-color:#29a22d;  border-width: 3px;color:#FFFFFF; font-weight: bold; text-align: center"  />
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
								</div>
							</div>
					</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="category" style="color: #29a22d; font-weight: bold;"> Nro de Cuotas</label>
							<div id="cb_cuotas">
								<select class="form-control" id="cbTipoPago" name="cbTipoPago" readonly="readonly" onchange="change_fee();">
									<option value="1" selected="selected">01 Cuota</option>
								</select>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="form-group">
							<label for="tags" style="color: #29a22d; font-weight: bold;" > Importe Cuota</label>
							<input type="text" class="form-control" placeholder="Tags" value="<?php echo $importe_cuota; ?>" name="txtImporteCuota" id="txtImporteCuota" readonly="readonly" />
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-12">
						<label style="color: #29a22d; font-weight: bold;">Fecha de compromiso de pago</label>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<div class="input-group">
								<input class="form-control fj-date" id="dtpicker" name="dtpicker" type="text" placeholder="Fecha de compromiso de pago" readonly="readonly">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							</div>
						</div>
					</div>				
				</div>
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