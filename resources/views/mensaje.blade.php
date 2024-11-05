<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

	<h3>Estimado Cliente, le recordamos que tiene un compromiso de pago con nosotros. A continuación se adjunta el detalle</h3>
	<br>
	<table border="1" style="border: 2px; border:1px solid #30C553; border-collapse: collapse;
  border-spacing: 20px;" width="70%">
		<tr>
			<td colspan="2" style="background-color: #29a22d; color: #FFFFFF;padding-left: 5px; padding-top: 2px; padding-bottom: 2px"><strong>Datos del Titular</strong></td>
		</tr>
		<tr>
			<td width="30%"  style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">Nombre y Apellido:</td>
			<td width="70%"  style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">{{ $data['nombre_titular'] }}</td>
		</tr>
		<tr>
			<td width="30%"  style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">DNI:</td>
			<td width="70%"  style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">{{ $data['dni_titular'] }}</td>
		</tr>
		<tr>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">EMAIL:</td>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">{{ $data['email_titular'] }}</td>
		</tr>	
		<tr>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">TELEFONO:</td>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">{{ $data['telefono_titular'] }}</td>
		</tr>
		<tr>
			<td colspan="2" style="background-color: #29a22d; color: #FFFFFF;padding-left: 5px; padding-top: 2px; padding-bottom: 2px"><strong>Datos de la Deuda</strong></td>
		</tr>
		<tr>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">Entidad:</td>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">{{ $data['entidad_deuda'] }}</td>
		</tr>
		<tr>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">Producto:</td>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">{{ $data['producto_deuda'] }}</td>
		</tr>	
		<!--<tr>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">Importe Deuda:</td>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">{{ $data['importe_deuda'] }}</td>
		</tr>
		<tr>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">Fecha Mora:</td>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">{{ $data['fecha_mora'] }}</td>
		</tr>
		<tr>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">Código RapiPago:</td>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">{{ $data['codigo_rapipago'] }}</td>
		</tr>
		<tr>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">Código PagoFacil:</td>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">{{ $data['codigo_pagofacil'] }}</td>
		</tr>
		<tr>-->
			<td colspan="2" style="background-color: #29a22d; color: #FFFFFF;padding-left: 5px; padding-top: 2px; padding-bottom: 2px"><strong>Datos del Compromiso de pago</strong></td>
		</tr>
		<tr>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">Tipo de pago:</td>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">{{ $data['tipo_pago'] }}</td>
		</tr>
		<tr>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">Cantidad de cuotas:</td>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">{{ $data['nro_cuota'] }}</td>
		</tr>	
		<?php if($data['nro_cuota'] == 1) { ?>
		<tr>
                        <td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">Importe de cada cuota:</td>
                        <td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">{{ $data['importe_cuota'] }}</td>
                </tr>
		<tr>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">Fecha de cancelación:</td>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">{{ $data['fecha_compromiso'] }}</td>
		</tr>
		<?php }else if($data['nro_cuota'] > 1){ ?>
                <tr>
                        <td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">Importe de anticipo:</td>
                        <td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">{{ $data['importe_anticipo'] }}</td>
                </tr>
                <tr>
                        <td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">Fecha de anticipo:</td>
                        <td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">{{ $data['fecha_anticipo'] }}</td>
                </tr>
		<tr>
                        <td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">Importe de cada cuota:</td>
                        <td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">{{ $data['importe_cuota'] }}</td>
                </tr>
		<tr>
                        <td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">Fecha de pago primera cuota:</td>
                        <td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">{{ $data['fecha_compromiso'] }}</td>
                </tr>
		<?php } ?>
	
		<tr>
			<td colspan="2" style="background-color: #29a22d; color: #FFFFFF;padding-left: 5px; padding-top: 2px; padding-bottom: 2px"><strong>Opciones de Pago</strong></td>
		</tr>
		<tr>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">Código RAPIPAGO:</td>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px"><?php echo $data['opt_pago_rapipago'] ?></td>
		</tr>
		<tr>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">Código PAGOFACIL:</td>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px"><?php echo $data['opt_pago_pagofacil'] ?></td>
		</tr>
		<tr>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px">Otras formas de pago:</td>
			<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px"><?php echo $data['opt_pago_otros'] ?></td>
			<!--<td style="padding-left: 5px; padding-top: 2px; padding-bottom: 2px"><strong><label style='font-weight: bold; text-decoration-line:underline'>Instrucciones por Transferencia Bancaria:</label></strong><br><strong>1.</strong> Ingresar a la página Web de tu banco e ingresar a tu cuenta bancaria. <br> <strong>2.</strong> Seleccionar la opción Transferencias o Transferir. <br> <strong>3.</strong> Ingresar los datos de la cuenta: <br> CUENTA: <strong>1286760401</strong> <br> CUIT: <strong>30712237984</strong> <br> CBU: <strong>0070040520000012867619</strong> <br> <strong>4.</strong> Asegurarse que el titular de la cuenta sea <strong>IMPRUNETA</strong> <br> <strong>5.</strong> Enviar el comprobante a nuestro mail: <strong>documentacion@imprunetasa.com</strong></td>-->
		</tr>
	</table>
	<br><br>
	<table>
		<tr>
			<td><strong>Saludos.<strong></td>
		</tr>
		<tr>
			<td><strong>Atte.<strong></td>
		</tr>
		<tr>
			<td><img src="http://www.trinario.com/images/logo.png" alt="SmartAdmin" style="width: 350px"></td>
		</tr>
	</table>

</body>
</html>
