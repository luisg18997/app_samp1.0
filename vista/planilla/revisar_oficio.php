<form id="revisaroficio" action="<?=RUTA_HTTP?>presupuesto/confi_oficio" method="post">
	<h3 align="center">Planilla Oficio</h3>
	<h4>Codigo: <?=$proceso->__get('cod_pla')?></h4>
	<table class="table table-resonposive">
		<tr>
			<input type="hidden" name="cod_pla" value="<?=$proceso->__get('cod_pla')?>">
			<input type="hidden" name="id_empleado" value="<?=$empleado->__get('id')?>">
			<input type="hidden" name="id_planilla" value="<?=$oficio->__get('id')?>">
			<input type="hidden" name="id" value="<?=$proceso->__get('id')?>">
			<input type="hidden" name="x" value="3">
			<td><label>Escuela o Instituto:</label></td>
			<td><?=$_SESSION['escuela'][$oficio->__get('escuela')-1]['nombre']?></td>
			<td><label>Fecha de registro:</label></td>
			<td><?=$oficio->__get('fecha_reg')?></td>
		</tr>
		<tr>
			<td><label>Departamento:</label></td>
			<td><?=$_SESSION['departamento'][$empleado->__get('departamento')-1]['nombre']?></td>
			<td><label>Catedra:</label></td>
			<td><?=$_SESSION['catedra'][$empleado->__get('catedra')-1]['nombre']?></td>
		</tr>
		<tr>
			<td><label>Nombres y  Apellidos:</label></td>
			<td><?php echo $empleado->__get('nombre_1').' '. $empleado->__get('nombre_2').' '. $empleado->__get('apellido_1').' '. $empleado->__get('apellido_2');?></td>
			<td><label>Cedula:</label></td>
			<td><?=$empleado->__get('cedula')?></td>
		</tr>
		<tr>
			<td><label>Tipo de Movimiento:</label></td>
			<input type="hidden" name="movimiento" value="<?=$planilla->__get('movimiento')?>">
			<td><?=$_SESSION['movimiento'][$oficio->__get('movimiento')-1]['descripcion']?></td>
			<td><label>Idac:</label></td>
			<input type="hidden" name="idac" value="<?=$empleado->__get('idac')?>">
			<td><?=$_SESSION['idac'][$empleado->__get('idac')-1]['idac']?></td>
		</tr>
		<tr>
			<td><label>dedicacion:</label></td>
			<td><?=trim($_SESSION['dedicacion'][$dedicacion-1]['codigo']).' '.trim($_SESSION['dedicacion'][$dedicacion-1]['descripcion'])?></td>
			<td><label>Fecha:</label></td>
			<td>Inicio: <?=date('d-m-Y', strtotime($oficio->__get('fecha_ini')))?> Fin: <?=date('d-m-Y', strtotime($oficio->__get('fecha_fin')))?></td>
		</tr>
		<tr align="center" id='des'>
			<td colspan="4">
				<input type="button" id="aprobar" value="Confirmar" onclick="visible2('aprobar','des','ob','revisaroficio',1)">
				<input type="button" id="recharzar" value="Recharzar" onclick="visible2('rechazar','des','ob','enviar')"></td>
		</tr>
		<tr align="center" style="display: none" id='ob'>
			<td></td>
			<td><label>Observacion:</label></td>
			<td><textarea name="Observacion" required=""></textarea></td>
			<td></td>
		</tr>
		<tr align="center" style="display: none;" id='enviar'>
                    <td colspan="4">
                  <input type="submit" value="Registrar">
                        <input type="reset"  value="Restablecer">
              </td>
   		</tr>
	</table>