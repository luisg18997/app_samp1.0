<table align="center" width="100">
	 <tr align="center">
        <td width="100" align="letf"><img src="img/ucv.png" width="50%" height="10%">
        </td>
        <td width="320"><b>UNIVERSIDAD CENTRAL DE VENEZUELA</b><br><br>
        	<b>FACULTAD DE HUMANIDADES Y EDUCACION</b></td>
        <td width="250"><b>Solicitud de Movimiento de Personal<br><br>
        	Numero:</b> <?=trim($proceso->__get('cod_pla'))?></td>
        <td width="110"><img src="img/faculta_humanidades_educacion.png" width="50%" height="10%"></td>
    </tr>
</table>
<table border="3" >
	<tr>
		<td colspan="3">
			<b><?=trim($_SESSION['escuela'][$planilla->__get('escuela')-1]['nombre'])?></b>
		</td>
		<td>
			<b>Fecha:</b> <?=date('d-m-Y', strtotime($planilla->__get('fecha_reg')))?>
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<b>Departamento:</b> <?=trim($_SESSION['departamento'][$empleado->__get('departamento')-1]['nombre'])?><br><br>
			<b>Nombres y Apellidos</b> <?php echo trim($empleado->__get('nombre_1').' '. $empleado->__get('nombre_2').' '. $empleado->__get('apellido_1').' '. $empleado->__get('apellido_2'));?>
		</td>
		<td colspan="2">
			<b>Cátedra:</b> <?=$_SESSION['catedra'][$empleado->__get('catedra')-1]['nombre']?><br><br>
			<b>C. I.:</b> <?=$empleado->__get('cedula')?>
		</td>
	</tr>
	<tr align="center">
		<td colspan="1.5">
			<b>Tipo de Movimiento</b>
		</td>
		<td>
			<b>Dedicación Actual</b>
		</td>
		<td>
		<b>Dedicación Propuesta</b>
	</td>
	</tr>
	<tr align="center">
		<td colspan="1.5">
			<?=trim($_SESSION['movimiento'][$planilla->__get('movimiento')-1]['descripcion'])?>
		</td>
		<td>
			<?php echo trim($_SESSION['dedicacion'][$empleado->__get('dedicacion')-1]['codigo']).': '.trim($_SESSION['dedicacion'][$empleado->__get('dedicacion')-1]['descripcion']); ?>
		</td>
		<td>
			<?php if(!empty($planilla->__get('dedicacion_pro'))){ echo trim($_SESSION['dedicacion'][$planilla->__get('dedicacion_pro')-1]['codigo']).': '.$_SESSION['dedicacion'][$planilla->__get('dedicacion_pro')-1]['descripcion']; }?>
		</td>
	</tr>
	<tr align="center">
		<td>
			<b>Sueldo</b>
		</td>
		<td>
		<b>Unidad Ejecutora</b>
		</td>
		<td>
			<b>Lapso</b><
		</td>
		<td>
			<b>Categoría</b>
		</td>
	</tr>
	<tr align="center">
		<td>
			<?=$_SESSION['sueldo'][$empleado->__get('sueldo')-235]['sueldo']?>
		</td>
		<td>
			<?=$_SESSION['unidad_ejecutora'][$empleado->__get('unidad_ejec')-1]['codigo']?>: <?=trim($_SESSION['unidad_ejecutora'][$empleado->__get('unidad_ejec')-1]['descripcion'])?>
		</td>
		<td>
			Inicio: <?=date('d-m-Y', strtotime($planilla->__get('fecha_ini')))?><br>Fin: <?=date('d-m-Y', strtotime($planilla->__get('fecha_fin')))?>
		</td>
		<td>
			<?=$_SESSION['categoria'][$empleado->__get('categoria')-1]['descripcion']?>
		</td>
	</tr>
	<tr>
		<td colspan="4">
			<b>Justificación u Observaciones:</b> <?=$planilla->__get('motivo')?> <br>			
			<b>Dirección:</b> <?php echo $ubicacion[0].' '.$ubicacion[1].', '.$direccion[0].' '.$direccion[1].', '. $tipo_viv[0]. ' '. $tipo_viv[1].', '.$id_viv[0].' '.$id_viv[1];
			if(!empty($empleado->__get('apartamento'))){
				echo ', '.$empleado->__get('apartamento');
			}
			echo ', Parroquia '.$_SESSION['parroquia'][$empleado->__get('parroquia')-1]['descripcion'].', Municipio '.$_SESSION['municipio'][$empleado->__get('municipio')-1]['descripcion'].', Edo. '.$_SESSION['estado'][$empleado->__get('estado')-1]['descripcion'] ?><br>
			<b>Ingreso:</b> <?=trim($_SESSION['ingreso'][$empleado->__get('ingreso')-1]['descripcion'])?> <b>Tipo Ingreso:</b> <?=trim($_SESSION['tipo_ingreso'][$empleado->__get('tipo_ingreso')-1]['descripcion'])?> <b>Fecha Ingreso:</b> <?=date('d-m-Y', strtotime($empleado->__get('fecha_ing')))?><br>
			<b>IDAC: <?=$_SESSION['idac'][$empleado->__get('idac')-1]['idac']?></b>
		</td>
	</tr>
	<tr>
		<td colspan="4">
			<b>Anexos:</b> <?=$anexo?>
		</td>
	</tr>
	<tr align="center">
		<td colspan="2">
			<br>
			<br>
			<br>
			<br>
			<br>
			____________________________<br>
			<b>Director o Jefe de Dependencia</b>
		</td>
		<td colspan="2">
			<br>
			<br>
			<br>
			<br>
			<br>
			____________________________
			<br><b>Decano o Coordinador</b>
		</td>
	</tr>
	<tr>
		<td colspan="2" width="50%">
			<b>Unidad Ejecutora:</b> <?=trim($_SESSION['unidad_ejecutora'][$empleado->__get('unidad_ejec')-1]['codigo'])?>: <?=trim($_SESSION['unidad_ejecutora'][$empleado->__get('unidad_ejec')-1]['descripcion'])?><br>
			<b>Cógo Programa:</b><br>
			<b>Código Contable:</b><br>
			<b>Sueldo:</b> <?=$_SESSION['sueldo'][$empleado->__get('sueldo')-235]['sueldo']?><br>
			<b>Fecha Efectiva:</b> <br><br>
			<b>Firma del Jefe de Presupuesto</b><br>
		</td>
		<td colspan="2" align="center" valign="top">
			<b>Observaciones de Departamento de Presupuesto</b>
		</td>
	</tr>
</table>