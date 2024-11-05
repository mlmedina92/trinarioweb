<table border="1">
	<tr>
		<!--<th>Entidad</th>-->
		<th>Titular</th>
		<!--<th>DNI</th>
		<th>Fecha Mora</th>
		<th>Producto</th>
		<th>Deuda Total</th>-->
	</tr>
	<?php foreach ($deudas as $deuda) { ?>
		<tr>
			<td>{{$deuda->titular}}</td>
		</tr>
	<?php } ?>
</table>