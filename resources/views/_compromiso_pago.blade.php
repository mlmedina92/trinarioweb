<?php 
$nombre_titular = "";
foreach ($datos as $deuda) {
	$nombre = $deuda->nombre_titular;
	$dni = $deuda->dni_titular;
	$entidad = $deuda->entidad_deuda;
	$producto = $deuda->producto_deuda;
	$importe = $deuda->importe_deuda;
	$fecha_mora = $deuda->fecha_deuda;
	$codigo_rapipago = $deuda->codigo_rapipago_deuda;
	$codigo_pagofacil = $deuda->codigo_pagofacil_deuda;
} 
?>
<div class="modal-header">
	<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
		&times;
	</button>
	<h4 class="modal-title" id="myModalLabel" style="color: #29a22d; font-weight: bold">COMPROMISO DE PAGO</h4>
</div>
<div class="modal-body">
	<div class="row">
		<div class="col-md-7">
			<div class="form-group">
				<label for="category" style="color: #29a22d; font-weight: bold;"> Titular</label>
				<input name="txtTitular" id="txtTitular" type="text" class="form-control" id="tags" placeholder="Tags" value="<?php echo $nombre?>" disabled="disabled" />
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label for="tags" style="color: #29a22d; font-weight: bold;"> Dni</label>
				<input name="txtDni" id="txtDni" type="text" class="form-control" id="tags" placeholder="Tags" value="<?php echo $dni?>" disabled="disabled" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-7">
			<div class="form-group">
				<label for="category" style="color: #29a22d; font-weight: bold;"> Entidad</label>
				<input name="txtEntidad" id="txtEntidad" type="text" class="form-control" id="tags" placeholder="Tags" value="<?php echo $entidad?>" disabled="disabled" />
			</div>
		</div>
		<div class="col-md-5">
			<div class="form-group">
				<label for="tags" style="color: #29a22d; font-weight: bold;"> Producto</label>
				<input name="txtProducto" id="txtProducto" type="text" class="form-control" id="tags" placeholder="Tags" value="<?php echo $producto ?>" disabled="disabled" />
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label for="tags" style="color: #29a22d; font-weight: bold;"> Importe de Deuda</label>
				<input name="txtImporte" id="txtImporte" type="text" class="form-control" id="tags" placeholder="Tags" value="<?php echo "$.".$importe ?>" disabled="disabled" />
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="tags" style="color: #29a22d; font-weight: bold;"> Fecha de Mora</label>
				<input type="text" class="form-control" id="tags" placeholder="Tags" value="<?php echo $fecha_mora ?>" disabled="disabled" />
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="tags" style="color: #29a22d; font-weight: bold;"> Codigo RapiPago</label>
				<input type="text" class="form-control" id="tags" placeholder="Tags" value="<?php echo $codigo_rapipago ?>" disabled="disabled" style="border-color: #29a22d; background-color:#29a22d;  border-width: 3px;color:#FFFFFF; font-weight: bold; text-align: center" />
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="tags" style="color: #29a22d; font-weight: bold;"> Codigo PagoFacil</label>
				<input type="text" class="form-control" id="tags" placeholder="Tags" value="<?php echo $codigo_pagofacil ?>" disabled="disabled" style="border-color: #29a22d; background-color:#29a22d;  border-width: 3px;color:#FFFFFF; font-weight: bold; text-align: center"  />
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
						<input type="radio" name="opt_tipo_pago" id="opt_cancelatorio" value="1" class="radiobox style-2" data-bv-field="rating" checked="checked" onclick="mensaje();">
						<span>Cancelatoria</span> </label>
						<label class="radio radio-inline no-margin">
						<input type="radio" name="opt_tipo_pago" id="opt_cuotas" value="2" class="radiobox style-2" data-bv-field="rating" onclick="mensaje();">
						<span>Pago en Cuotas</span> </label>
					</div>
				</div>
		</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="category" style="color: #29a22d; font-weight: bold;"> Nro de Cuotas</label>
				<select class="form-control" id="category">
					<option>01 Cuota</option>
					<option>02 Cuotas</option>
					<option>03 Cuotas</option>
					<option>04 Cuotas</option>
					<option>05 Cuotas</option>
					<option>06 Cuotas</option>
				</select>
			</div>
		</div>
		<div class="col-md-3">
			<div class="form-group">
				<label for="tags" style="color: #29a22d; font-weight: bold;"> Importe Cuota</label>
				<input type="text" class="form-control" id="tags" placeholder="Tags" value="$.500.00" />
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
				<input class="form-control" id="from" type="text" placeholder="From">
				<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			</div>
		</div>
	</div>				
</div>
<div class="modal-footer">
	<button type="button" class="btn btn-default" data-dismiss="modal">
		Cancelar
	</button>
	<button type="button" class="btn btn-primary" style="background-color: #29a22d" onclick="mensaje();">
		Guardar compromiso de pago
	</button>
</div>
