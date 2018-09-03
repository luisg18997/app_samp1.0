<form id="revisarplamov" action="<?=RUTA_HTTP?>presupuesto/confi_mov_per" method="post">
	<h3 align="center">Solicitud de Movimiento de Personal</h3>
	<h4>Codigo: <?=$proceso->__get('cod_pla')?></h4>
	<!--Datos Personales -->
	<table class="table table-resonposive">
		<tr>
			<input type="hidden" name="cod_pla" value="<?=$proceso->__get('cod_pla')?>">
			<input type="hidden" name="id_empleado" value="<?=$empleado->__get('id')?>">
			<input type="hidden" name="id_planilla_mov" value="<?=$planilla->__get('id')?>">
			<input type="hidden" name="id" value="<?=$proceso->__get('id')?>">
			<input type="hidden" name="x" value="3">
			<td><label>Escuela o Instituto:</label></td>
			<td><?=$_SESSION['escuela'][$planilla->__get('escuela')-1]['nombre']?></td>
			<td><label>Fecha de registro:</label></td>
			<td><?=$planilla->__get('fecha_reg')?></td>
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
			<td><?=$_SESSION['movimiento'][$planilla->__get('movimiento')-1]['descripcion']?></td>
			<td><label>Idac:</label></td>
			<input type="hidden" name="idac" value="<?=$empleado->__get('idac')?>">
			<td><?=$_SESSION['idac'][$empleado->__get('idac')-1]['idac']?></td>
		</tr>
		<tr>
			<td><label>Dedicacion Acutal:</label></td> 
			<td><?php if(!empty($empleado->__get('dedicacion'))){ echo trim($_SESSION['dedicacion'][$empleado->__get('dedicacion')-1]['codigo']).' '.trim($_SESSION['dedicacion'][$empleado->__get('dedicacion')-1]['descripcion']); }?></td>
			<td><label>Dedicacion Propuesta:</label></td>
			<td><?php if(!empty($planilla->__get('dedicacion_pro'))){ echo trim($_SESSION['dedicacion'][$planilla->__get('dedicacion_pro')-1]['codigo']).' '.$_SESSION['dedicacion'][$planilla->__get('dedicacion_pro')-1]['descripcion']; }?></td>
		</tr>
		<tr>
			<td><label>Unidad Ejecutora:</label></td>
			<td><?=$_SESSION['unidad_ejecutora'][$empleado->__get('unidad_ejec')-1]['codigo']?>: <?=trim($_SESSION['unidad_ejecutora'][$empleado->__get('unidad_ejec')-1]['descripcion'])?></td>
			<td><label>Sueldo:</label></td>
			<td><?=$empleado->__get('sueldo')?></td>
		</tr>
		<tr>
			<td><label>Categoria:</label></td>
			<td><?=$empleado->__get('categoria')?></td>
			<td><label>Fecha:</label></td>
			<td><?=date('d-m-Y', strtotime($planilla->__get('fecha_ini')))?> Fin: <?=date('d-m-Y', strtotime($planilla->__get('fecha_fin')))?></td>
		</tr>
		<tr>
			<td><label>Justificacion u Obersvaciones:</label></td>
			<td><?=$planilla->__get('motivo')?></td>
			<td><label>Direccion</label></td>
			<td><?php echo $ubicacion[0].' '.$ubicacion[1].', '.$direccion[0].' '.$direccion[1].', '. $tipo_viv[0]. ' '. $tipo_viv[1].', '.$id_viv[0].' '.$id_viv[1];
			if(!empty($empleado->__get('apartamento'))){
				echo ', '.$empleado->__get('apartamento');
			}
			echo ', Parroquia '.$_SESSION['parroquia'][$empleado->__get('parroquia')-1]['descripcion'].', Municipio '.$_SESSION['municipio'][$empleado->__get('municipio')-1]['descripcion'].', Edo. '.$_SESSION['estado'][$empleado->__get('estado')-1]['descripcion'] ?></td>
		</tr>
		<tr>
			<td><label>Ingreso</label></td>
			<td><?=trim($_SESSION['ingreso'][$empleado->__get('ingreso')-1]['descripcion'])?></td>
			<td><label>Tipo Ingreso: </label></td>
			<td><?=trim($_SESSION['tipo_ingreso'][$empleado->__get('tipo_ingreso')-1]['descripcion'])?></td>
		</tr>
		<tr>
			<td><label>Fecha Ingreso: </label></td>
			<td><?=date('d-m-Y', strtotime($empleado->__get('fecha_ing')))?></td>
			<td><label>Telefono</label></td>
			<td><?=$empleado->__get('telf_local')?></td>
		</tr>
		<tr>
			<td colspan="2"><label>Anexos</label></td>
			<td colspan="2"><?=$anexo?></td>
		</tr>
		<?php if($proceso->__get('ubicacion')==2){ ?>
		<tr align="center" id='des'>
			<td colspan="4">
				<input type="button" id="aprobar" value="Confirmar" onclick="visible2('aprobar','des','ob','revisarplamov',1)">
				<input type="button" id="recharzar" value="Recharzar" onclick="visible2('rechazar','des','ob','enviar')"></td>
		</tr>
		<tr align="center" style="display: none" id='ob'>
			<td></td>
			<td><label>Observacion:</label></td>
			<td><textarea name="Observacion" required=""></textarea></td>
			<td></td>
		</tr>
   		 <?php }else{?>
   		 <tr align="center" id='des'>
   		 <td colspan="4">
				<input type="button" id="aprobar" value="Confirmar" onclick="visible2('aprobar','des','ap','enviar')">
				<input type="button" id="recharzar" value="Recharzar" onclick="visible2('rechazar','des','ap','enviar')"></td>
		</tr>
		<tr style="display: none;" id="ap">
   		 	<td><label>Codigo Programa</label></td>
   		 	<td>
   		 		<select name="programa">
   		 			<option value="0">Seleccione</option>
   		 			<?php  foreach($_SESSION['programa'] as $r) {?>
   		 			<option value="<?=$r['id']?>"><?=$r['codigo']?></option>
   		 			<?php }?>
   		 		</select>
   		 	</td>
   		 	<td><label>Codigo Contable</label></td>
   		 	<td>
   		 		<select name="contable">
   		 			<option value="0">Seleccione</option>
   		 			<?php  foreach($_SESSION['contable'] as $r) {?>
   		 			<option value="<?=$r['id']?>"><?=$r['codigo']?></option>
   		 			<?php }?>
   		 		</select>
   		 	</td>
   		 </tr>
   		 <?php } ?>
   		 
   		 <tr align="center" style="display: none;" id='enviar'>
                    <td colspan="4">
                  <input type="submit" value="Registrar">
                        <input type="reset"  value="Restablecer">
              </td>
   		</tr>
	</table>
</form>