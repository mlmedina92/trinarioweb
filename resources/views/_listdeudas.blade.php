<table id="dt_basic" class="table table-striped table-bordered table-hover" width="100%">
	<thead>			                
		<tr>
			<th data-hide="phone" style="width:22%">Entidad</th>
			<th data-class="expand"  style="width:28%"><i class="text-muted hidden-md hidden-sm hidden-xs"></i> Titular</th>
			<th data-hide="phone"  style="width:8%"><i class="text-muted hidden-md hidden-sm hidden-xs"></i> Dni</th>
			<th data-hide="phone,tablet" style="width:10%">Fecha Mora</th>
			<th data-hide="phone,tablet"  style="width:14%"><i class="xt-color-blue hidden-md hidden-sm hidden-xs"></i> Producto</th>
			<th style="width:10%">Deuda ($.)</th>
			<th style="width:3%;"></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($deudas as $deuda) { ?>
		<tr  style="background-color: #fff">
			<td style="padding-top: 4px; padding-bottom: 4px; vertical-align: middle;">{{$deuda->entidad_deuda}}</td>
			<td style="padding-top: 4px; padding-bottom: 4px; vertical-align: middle">{{$deuda->nombre_titular}}</td>
			<td style="padding-top: 4px; padding-bottom: 4px; vertical-align: middle">{{$deuda->dni_titular}}</td>
			<td style="padding-top: 4px; padding-bottom: 4px; vertical-align: middle">{{$deuda->fecha_deuda}}</td>
			<td style="padding-top: 4px; padding-bottom: 4px; vertical-align: middle">{{$deuda->producto_deuda}}</td>
			<td style="padding-top: 4px; padding-bottom: 4px; vertical-align: middle"><?php echo "$."; ?>{{$deuda->importe_deuda}}</td>
			<td style="padding-top: 4px; padding-bottom: 4px; vertical-align: middle">
				<a href="javascript:void(0);"  onclick="load_payment_promise('{{$deuda->dni_titular}}','{{$deuda->id_deuda}}');" class="btn btn-xs btn-warning pull-right" data-toggle="modal" data-target="#myModal" rel="tooltip" data-placement="top" data-original-title="<h4>Realice un acuerdo de pago!</h4>" data-html="true" ><i class="fa fa-check fa-lg"></i></a>
			</td>
		</tr>
		<?php } ?>
	</tbody>
</table>
