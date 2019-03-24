<table align="center" width="100">
	<tr align="center">
		<td align="letf"><img src="img/ucv.png" width="75%" height="20%"></td>
		<td align="center" width="420"><h2><b>UNIVERSIDAD CENTRAL DE VENEZUELA<br>FACULTAD  DE HUMANIDADES Y EDUCACIÓN<br><?=$_SESSION['escuela'][$empleado->__get('escuela')-1]['nombre']?></b></h2></td>
		<td><img src="img/psicologia.png" width="55%" height="20%"></td>
	</tr>
</table>
<br>
<br>
<table align="center" width="565">
	<tr>
		<td align="letf"><p>PSI<?=$proceso->__get('cod_pla')?></p></td>
		<td align="right"><p>Caracas de <?=date('d m Y', strtotime($planilla->__get('fecha_reg')))?></p></td>
	</tr>
	<br>
	<tr>
		<td colspan="2"><p><b>Ciudadano<br>Vicenzo Piero Lo Mónaco<br>Decano Facultad de Humanidades y Educación<br>Presente.-</b><br><br></p></td>
	</tr>
	<tr>
		<td colspan="2" width="30%">
			<p></p><p>  Por medio de la presente tiene por objeto solicitar <?=$_SESSION['movimiento'][$planilla->__get('movimiento')-1]['descripcion']?> del profesor <b><?php echo strtoupper($empleado->__get('nombre_1').' '.$empleado->__get('nombre_2').' '.$empleado->__get('apellido_1').' '.$empleado->__get('apellido_2'));?> C.I.: <?=$empleado->__get('cedula')?></b>, <?=trim($_SESSION['dedicacion'][$empleado->__get('dedicacion')-1]['descripcion'])?>, a partir del <?=$fec?>, para la Cátedra de <?=trim($_SESSION['catedra'][$empleado->__get('catedra')-1]['nombre'])?>, del Departamento de <?=trim($_SESSION['departamento'][$empleado->__get('departamento')-1]['nombre'])?>, dicha  contratación será cubierta con la partida presupuestaria identificada con el IDAC <b><?=$_SESSION['idac'][$empleado->__get('idac')-1]['idac']?></b>.</p>
		</td>
	</tr>
	<tr>
		<td colspan="2"><p>Sin otro particular al cual hacer referencia, me despido,</p></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><p>Atentamente</p></td>
	</tr>
	<tr align='center'>
		<td colspan="2"><p>___________________<br><b>Prof. Eduardo Santoro.<br>Director (e).<br>Escuela de Psicología.</b></p></td>
	</tr>
</table>
