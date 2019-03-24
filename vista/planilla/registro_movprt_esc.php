
<div>
	<h3>Registro de Planilla Movimiento de Personal:  </h3>
    <h4>Personal: <?=$empleado->__get('nombre_1').' '.  $empleado->__get('apellido_1')?> Idac: <?=$_SESSION['idac'][$empleado->__get('idac')-1]['idac']?></h4>
	<hr>
	<form method="post" id="mov_per" action="<?=RUTA_HTTP?>escuela/guardar_planilla_mov" onsubmit="return validar('mov_per')" enctype="multipart/form-data" >
		<div>
            <table class=" table table-striped table-hover">
                <!-- Datos Personales -->
                <tr align="center">
                    <input type="hidden" name="id_empleado" value="<?=$planilla->__get('id_empleado')?>">
                    <?php if(empty($planilla->__get('cod_oficio'))){ ?>
                    <input type="hidden" name="cod_oficio" value="<?=$proceso->__get('cod_pla')?>">
                    <?php }else{ ?>
                    <input type="hidden" name="id_planilla_mov" value="<?=$planilla->__get('id')?>">
                    <?php } ?>
                    <input type="hidden" name="x" value="2">
                    <td colspan="4" align="center"><h4><b>Datos Personales<b></h4></td>
                </tr>
                <tr align="center">
                    <td><label for="nombre1">* Primer Nombre: </label></td>
                    <td>
                        <input type="text" name="nombre1" id="Primer nombre" required minlength="4" value="<?=$empleado->__get('nombre_1')?>"
                               placeholder="Ingrese el primer nombre"  maxlength="25" pattern="|^[a-zñáéíóú/A-ZÑÁÉÍÓÚ]*$|" readonly>
                    </td>
                    <td><label for="nombre2">Segundo Nombre: </label></td>
                    <td>
                        <input type="text" name="nombre2" id="Segundo nombre" pattern="|^[a-zñáéíóú/A-ZÑÁÉÍÓÚ]*$|" readonly
                               placeholder="Ingrese el Segundo nombre" minlength="4" maxlength="25" value="<?=$empleado->__get('nombre_2')?>">
                    </td>
                </tr>
                <tr align="center">
                    <td><label for="apellido1">* Apellido Paterno: </label></td>
                    <td>
                        <input type="text" name="apellido1" id="Apellido paterno" maxlength="25" minlength="4" readonly
                               placeholder="Ingrese el apellido Paterno" required pattern="|^[a-zñáéíóú/A-ZÑÁÉÍÓÚ]*$|"  value="<?=$empleado->__get('apellido_1')?>">
                    </td>
                    <td><label for="apellido2">* Apellido Materno: </label></td>
                    <td>
                        <input type="text" name="apellido2" id="Apellido materno" minlength="4" maxlength="25" readonly value="<?=$empleado->__get('apellido_2')?>"
                               placeholder="Ingrese el apellido Materno" required="required" pattern="|^[a-zñáéíóú/A-ZÑÁÉÍÓÚ]*$|">
                    </td>
                </tr>
                <tr align="center">
                    <td>
                        <label for="nacionalidad">Nacionalidad</label>
                    </td>
                    <td>
                        <select id="nacionalidad" name="nacionalidad" disabled>
                            <option value=" "></option>
                            <option value="V" <?php if($empleado->__get('nacionalidad')=='V'){?> selected <?php }?>>V-</option>
                            <option value="E" <?php if($empleado->__get('nacionalidad')=='E'){?> selected <?php }?>>E-</option>
                        </select>
                    </td>
                    <td><label for="cedula">* Cedula: </label></td>
                    <td>
                        <input type="text" name="cedula" id="cedula" value="<?=$empleado->__get('cedula')?>" readonly>
                    </td>
                </tr>
                <tr align="center">
                    <!-- Datos de direccion -->
                    <td colspan="4" align="center"><h4><b>Dirección:<b></h4></td>
                </tr>
                <tr align="center">
                    <td><label for="estado">* Estado:</label></td>
                    <td>
                        <select name="estado" id="estado" onchange="llenarselect(value,municipios,idmunicipio,idestmunicipios,'municipio',true,'parroquia')" onblur="formulario(this)">
                            <option value="">Seleccione...</option>
                            <?php foreach ($_SESSION['estado'] as $r){ ?>
                            <option value="<?=$r['id']?>" <?php if($r['id']==$empleado->__get('estado')){ ?>selected<?php }?>
                            ><?=$r['descripcion']?></option>
                            <?php }?>
                        </select>
                    </td>
                    <td><label for="municipio">* Municipio</label></td>
                    <td><?php if(!empty($empleado->__get('municipio'))){ ?> <input type="hidden" name="municipio" value="<?=$empleado->__get('municipio')?>"> <?php } ?>
                        <select name="municipio" id="municipio" onchange="llenarselect(value,parroquias,idparroquias,idmunparroquias,'parroquia')" disabled onblur="formulario(this)">
                            <option value=" ">Seleccione...</option>
                            <?php if(!empty($empleado->__get('municipio'))){ ?>
                                <option value="<?=$empleado->__get('municipio')?>" selected>
                                    <?=$_SESSION['municipio'][$empleado->__get('municipio')-1]['descripcion']?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr align="center">
                    <td><label for="parroquia">* Parroquia</label></td>
                    <td><?php if(!empty($empleado->__get('parroquia'))){ ?> <input type="hidden" name="parroquia" value="<?=$empleado->__get('parroquia')?>"> <?php } ?>
                        <select name="parroquia" id="parroquia" disabled onblur="formulario(this)">
                            <option value=" ">Seleccione...</option>
                            <?php if(!empty($empleado->__get('parroquia'))){ ?>
                                <option value="<?=$empleado->__get('parroquia')?>" selected>
                                    <?=$_SESSION['parroquia'][$empleado->__get('parroquia')-1]['descripcion']?></option>
                            <?php } ?>
                        </select>
                    </td>
                    <td><label for="direccion1">* <select name="direccion1" onblur="formulario(this)" id="direccion 1">
                                <option value=""></option>
                                <option value="Urbanización" <?php if($ubicacion[0]=='Urbanización'){ ?> selected <?php }?>>Urbanización</option>
                                <option value="Sector" <?php if($ubicacion[0]=='Sector'){ ?> selected <?php }?>>Sector</option>
                                <option value="Barrio"<?php if($ubicacion[0]=='Barrio'){ ?> selected <?php }?>>Barrio</option>
                            </select></label></td>
                    <td><input type="text" name="1direccion" onblur="formulario(this)" required <?php if(!empty($ubicacion[1])){ ?> value="<?=$ubicacion[1]?>"<?php }?>></td>
                </tr>
                <tr align="center">
                    <td>
                        <label for="direccion2">* <select onblur="formulario(this)" name="direccion2" id="direccion 2">
                                <option value=""></option>
                                <option value="Avenida"<?php if($direccion[0]=='Avenida'){ ?> selected <?php }?>>Avenida</option>
                                <option value="Calle"<?php if($direccion[0]=='Calle'){ ?> selected <?php }?>>Calle</option>
                                <option value="Vereda"<?php if($direccion[0]=='Vereda'){ ?> selected <?php }?>>Vereda</option>
                                <option value="Carretera"<?php if($direccion[0]=='Carretera'){ ?> selected <?php }?>>Carretera</option>
                            </select></label>
                    </td>
                    <td><input type="text" name="2direccion" onblur="formulario(this)" required<?php if(!empty($direccion[1])){ ?> value="<?=$direccion[1]?>"<?php }?>></td>
                    <td>
                        <label for="direccion3">* <select  onblur="formulario(this)" name="direccion3" id="direccion 3">
                                <option value=""></option>
                                <option value="Residencia"<?php if($tipo_viv[0]=='Residencia'){ ?> selected <?php }?> >Residencia</option>
                                <option value="Edificio"<?php if($tipo_viv[0]=='Edificio'){ ?> selected <?php }?>>Edificio</option>
                                <option value="Casa"<?php if($tipo_viv[0]=='Casa'){ ?> selected <?php }?>>Casa</option>
                                <option value="Habitacion"<?php if($tipo_viv[0]=='Habitacion'){ ?> selected <?php }?>>Habitacion</option>
                            </select>
                    </td>
                    <td><input type="text" name="3direccion" onblur="formulario(this)" required <?php if(!empty($tipo_viv[1])){ ?>value="<?=$tipo_viv[1]?>" <?php } ?>></td>
                </tr>
                <tr align="center">
                    <td>
                        <label for="direccion4">* <select onblur="formulario(this)" name="direccion4" id="direccion 4" onchange="direccion(value,'apartamento')">
                                <option value=""></option>
                                <option value="Piso"<?php if($id_viv[0]=='Piso'){ ?> selected <?php }?>>Piso</option>
                                <option value="Nivel"<?php if($id_viv[0]=='Nivel'){ ?> selected <?php }?>>Nivel</option>
                                <option value="Número"<?php if($id_viv[0]=='Número'){ ?> selected <?php }?>>Número</option>
                            </select></label>
                    </td>
                    <td><input type="text" onblur="formulario(this)" name="4direccion" required <?php if(!empty($id_viv[1])){ ?> value="<?=$id_viv[1]?>" <?php }?>></td>
                    <td><label for="apartamento">Apartamento:</label></td>
                    <td>
                        <input type="text" name="apartamento" id="apartamento" onblur="formulario(this)"
                        disabled value="<?=$empleado->__get('apartamento')?>">
                    </td>
                </tr>
                <tr align="center">
                    <!--Datos del Trabajo -->
                    <td colspan="4" align="center"><h4><b>Datos Laborales:<b></h4></td>
                </tr>
                <tr align="center">
                    <td><label for="ingreso">* Ingreso:</label></td>
                    <td>
                        <select name="ingreso" id="ingreso" onblur="formulario(this)">
                            <option value=" ">Seleccione...</option>
                            <?php foreach ($_SESSION['ingreso'] as $r){ ?>
                            <option value="<?=$r['id']?>" <?php if($empleado->__get('ingreso')==$r['id']){ ?> selected <?php }?>><?=$r['descripcion']?></option>
                                <?php }?>
                        </select>
                    </td>
                    <td><label for="tipoingreso">* Tipo de Ingreso:</label></td>
                    <td>
                        <select name="tipoingreso" id="tipo ingreso" onblur="formulario(this)">
                            <option value=" ">Seleccione...</option>
                            <?php foreach ($_SESSION['tipo_ingreso'] as $r){ ?>
                            <option value="<?=$r['id']?>" <?php if($empleado->__get('tipo_ingreso')==$r['id']){?> selected <?php }?>><?=$r['descripcion']?></option>
                                <?php }?>
                        </select>
                    </td>
                </tr>
                <tr align="center">
                    <td><label for="fechaing">* Fecha ingreso:</label></td>
                    <td>
                        <input type="date" name="fechaing" id="fecha de ingreso" value="<?=$empleado->__get('fecha_ing')?>" readonly>
                    </td>
                    <td><label for="movimiento">* Tipo de Movimiento:</label></td>
                    <td>
                        <input type="hidden" name="movimiento" value="<?=$planilla->__get('movimiento')?>">
                        <select id="movimiento" disabled>
                            <option value="<?=$planilla->__get('movimiento')?>" selected><?=$_SESSION['movimiento'][$planilla->__get('movimiento')-1]['descripcion']?></option>
                        </select>
                    </td>
                </tr>
                <tr align="center">
                    <td><label for="departamento">* Departamento:</label></td>
                    <td>
                        <input type="hidden" name="departamento" value="<?=$empleado->__get('departamento')?>">
                        <select id="departamento" disabled>
                                <option value="<?=$empleado->__get('departamento')?>" selected><?=$_SESSION['departamento'][$empleado->__get('departamento')-1]['nombre']?></option>
                        </select>
                    </td>
                    <td><label for="catedra">* Catedra:</label></td>
                    <td>
                        <input type="hidden" name="catedra" value="<?=$empleado->__get('catedra')?>">
                        <select id="catedra" disabled>           
                         <option value="<?=$empleado->__get('catedra')?>" selected><?=$_SESSION['catedra'][$empleado->__get('catedra')-1]['nombre']?></option>
                        </select>
                    </td>
                </tr>
                <tr align="center">
                    <td><label for="uni_ejec">* Unidad Ejecutora: </label></td>
                    <td>
                        <input type="hidden" name="uni_ejec" value="<?=$empleado->__get('unidad_ejec')?>">
                        <select id="unidad ejecutora" disabled onblur="formulario(this)" style="width: 65%">
                                <option value="<?=$empleado->__get('unidad_ejec')?>" selected> <?=$_SESSION['unidad_ejecutora'][$empleado->__get('unidad_ejec')-1]['descripcion']?> </option>
                        </select>
                    </td>
                    <td><label for="idac">* Idac: </label></td>
                    <td>
                        <input type="hidden" name="idac" value="<?=$empleado->__get('idac')?>">
                        <select id="idac" onblur="formulario(this)" disabled>                           <option value="<?=$empleado->__get('idac')?>" selected><?=$_SESSION['idac'][$empleado->__get('idac')-1]['idac']?></option>
                        </select>
                    </td>
                </tr>
                <?php if($planilla->__get('movimiento')!=1) { ?>
                <tr id='dedipro' align="center">
                    <td></td>
                    <td> <label>¿Desea dedicacion propuesta?</label></td>
                    <td>
                        <input type="button" id="si" value="SI" onclick="visible(value,'dedipro','dedicacion propuesta')">
                        <input type="button" id="no" value="NO" onclick =" visible(value,'dedipro','dedicacion propuesta')">
                    </td>
                    <td></td>
                </tr>
                <?php } ?>
                <tr align="center">
                    <td><label for="dedicacion1">* Dedicacion Actual:</label></td>
                    <td>
                        <input type="hidden" name="dedicacion1" value="<?=$empleado->__get('dedicacion')?>">
                        <select id="dedicacion actual" onblur="formulario(this)" <?php if($planilla->__get('movimiento')==1){?> disabled <?php } ?>>
                            <option value=" ">Seleccione</option>
                            <?php foreach ($_SESSION['dedicacion'] as $r){?>
                                <option value="<?=$r['id']?>" <?php if($empleado->__get('dedicacion')==$r['id']){?> selected<?php } ?>><?=$r['descripcion']?></option>
                            <?php }?>
                        </select>
                    </td>
                    <input type="hidden" name="dedicacion" value="<?=$planilla->__get('dedicacion_pro')?>">
                    <td><label for="dedicacion2">Dedicacion Propuesta:</label></td>
                    <td><select name="dedicacion2" id="dedicacion propuesta" onblur="formulario(this)" disabled>
                            <?php if($planilla->__get('movimiento')==1){ ?>
                                <option value="<?=$planilla->__get('dedicacion_pro')?>" selected><?=$_SESSION['dedicacion'][$planilla->__get('dedicacion_pro')-1]['descripcion']?></option>
                           <?php  }else{ ?>
                           <option value=" ">Seleccione</option>
                            <?php foreach ($_SESSION['dedicacion'] as $r){?>
                                <option value="<?=$r['id']?>"><?=$r['descripcion']?></option>
                            <?php } }?>
                        </select></td>
                </tr>
                <tr align="center">
                    <td><label for="Categoria">* Categoria</label></td>
                    <td>
                        <select name="categoria" id="categoria" onblur="formulario(this)" onchange="sueldoselect('categoria','movimiento','sueldo', 'sueldo1')">
                            <option value=" ">Seleccione</option>
                            <?php foreach ($categoria as $r){?>
                                <option value="<?=$r['id']?>" <?php if($empleado->__get('categoria')==$r['id']){?> selected<?php }?>><?=$r['descripcion']?></option>
                            <?php }?>
                        </select>
                    </td>
                    <td><label for="sueldo">* Sueldo</label></td>
                    <td>
                        <input type="hidden" name="sueldo" id="sueldo1" value="
                        <?php if(!empty($empleado->__get('id'))){
                         echo $empleado->__get('departamento');}?>">
                        <select id="sueldo" onblur="formulario(this)" disabled>
                            <option value="">Seleccione</option>
                            <?php foreach ($_SESSION['sueldo'] as $r){?>
                                <option value="<?=$r['id']?>" <?php if($empleado->__get('sueldo')==$r['id']){?> selected<?php }?>><?=$r['sueldo']?></option>
                            <?php }?>
                        </select>
                    </td>
                </tr>
                <tr align="center">
                    <td><label for="fecha_inicio">* Fecha Inicio:</label></td>
                    <td>
                        <input type="date" name="fechainic" id="fecha inicio" min="2015-01-01" onblur="formulario(this)" value="<?=$planilla->__get('fecha_ini')?>" readonly
                               required>
                    </td>
                    <td><label for="fecha_fin">* Fecha Fin:</label></td>
                    <td>
                        <input type="date" name="fechafin" id="fecha fin" readonly required onblur="formulario(this)" value="<?=$planilla->__get('fecha_fin')?>">
                    </td>
                </tr>
                <tr align="center">
                    <td><label for="anexos">* Anexos:</label></td>
                    <td><textarea name="anexos" id="anexos" disabled ><?php
                    if(empty($planilla->__get('anexos')) && !empty($anexo)){
                        echo $anexo;
                    }else{
                        echo $planilla->__get('anexos');
                    }?></textarea></td>
                    <td><label for="motivo">* Motivo:</label></td>
                    <td>
                        <textarea name="motivo" id="motivo" required onblur="formulario(this)"
                                  placeholder="Indique el motivo de realizar la planilla"><?=$planilla->__get('motivo')?></textarea>
                    </td>
                </tr><?php
                if(!empty($anexo)){ ?>
                    <!--<tr align="center" id="subir" align="center">
                        <td></td>
                        <td><label for="subir">¿Desea subir los anexos?</label></td>
                        <td>
                            <input type="button"  onclick="anexo('aceptar', 'anexos')" value="SI">
                            <input type="button" onclick="anexo('rechazar')" value="NO">
                        </td>
                        <td></td>
                    </tr>-->
                    <?php }?>
                <tr id="anexo" style="display: none;" align="center">
                    <td colspan="4" align="center"><h4><b>Subir Anexos:</b></h4></td>
                </tr>
                <tr align="center" id="mov_pert">
                    <td colspan="4"><label>* Campos Obligatorios</label></td>
                </tr>
                <tr align="center">
                    <td colspan="4">
                        <input type="submit"  value="Registrar">
                        <input type="reset"  value="Restablecer">
                    </td>
                </tr>
            </table>
		</div>
	</form>
</div>