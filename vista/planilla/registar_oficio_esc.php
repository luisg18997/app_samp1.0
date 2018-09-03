<div>
    <hr>
	<h3 align="center">Registro de Planilla Oficio: </h3>
	<form method="post" id="oficio" action="<?=RUTA_HTTP?>escuela/guardar_oficio"  accept-charset="UTF-8"
          onsubmit="return validar('oficio')" class="form-group">
        <div style="margin: auto">
            <table class=" table">
                <tr>
                    <input type="hidden" name="id_empleado" value="<?=$empleado->__get('id')?>">
                    <input type="hidden" name="id_planilla" value="<?=$oficio->__get('id')?>">
                    <input type="hidden" name="id_proceso" value="<?=$proceso->__get('id_proceso')?>">
                    <td><label for="nombre1">* Primer Nombre: </label></td>
                    <td>
                        <input type="text" name="nombre1" id="Primer nombre" required minlength="4" onblur="formulario(this)" value="<?=$empleado->__get('nombre_1')?>"
                               placeholder="Ingrese el Primer nombre"  maxlength="25" pattern="|^[a-zñáéíóú/A-ZÑÁÉÍÓÚ]*$|">
                    </td>
                    <td><label for="nombre2"> Segundo Nombre: </label></td>
                    <td>
                        <input type="text" name="nombre2" id="Segundo nombre" pattern="|^[a-zñáéíóú/A-ZÑÁÉÍÓÚ]*$|" value="<?=$empleado->__get('nombre_2')?>"
                               placeholder="Ingrese el Segundo nombre" minlength="4" maxlength="25" onblur="formulario(this)">
                    </td>
                </tr>
                <tr>
                    <td><label for="apellido1">* Apellido Paterno: </label></td>
                    <td>
                        <input type="text" name="apellido1" id="Apellido paterno" maxlength="25" minlength="4" onblur="formulario(this)" value="<?=$empleado->__get('apellido_1')?>"
                               placeholder="Ingrese el apellido Paterno" required pattern="|^[a-zñáéíóú/A-ZÑÁÉÍÓÚ]*$|" >
                    </td>
                    <td><label for="apellido2">* Apellido Materno: </label></td>
                    <td>
                        <input type="text" name="apellido2" id="Apellido materno" minlength="4" maxlength="25" onblur="formulario(this)" value="<?=$empleado->__get('apellido_2')?>"
                               placeholder="Ingrese el apellido Materno" required="required" pattern="|^[a-zñáéíóú/A-ZÑÁÉÍÓÚ]*$|">
                    </td>
                </tr>
                <tr>
                    <td><label for="cedula">* Cedula:
                    <select id="nacionalidad" name="nacionalidad" onblur="formulario(this)">
                            <option value=" "></option>
                            <option value="V" <?php if($empleado->__get('nacionalidad')=='V'){?> selected <?php }?>>V-</option>
                            <option value="E" <?php if($empleado->__get('nacionalidad')=='E'){?> selected <?php }?>>E-</option>
                        </select></label></td>
                    <td>
                        <input type="text" name="cedula" id="cedula" maxlength="8" minlength="6" onblur="formulario(this)" value="<?=$empleado->__get('cedula')?>" 
                               placeholder="Ingrese el numero de cedula" required onkeypress="return valida(event)">
                    </td>
                    <td><label for="email">* Email:</label></td>
                    <td>
                        <input type="email" id="email" name="email" placeholder="ejemplo.ejemplo@ucv.ve" onblur="formulario(this)" value="<?=$empleado->__get('email')?>"
                               minlength="10" required maxlength="50">
                    </td>
                </tr>
                <?php if(empty($empleado->__get('id')) && $empleado->__get('status')==0) {?>
                <tr>
                    <td><label for="genero">* Genero:</label></td>
                    <td>
                        <select id="genero" name="genero" onblur="formulario(this)" style="width: 30%">
                            <option value=" "></option>
                            <option value="F" <?php if($empleado->__get('genero')=='F'){?> selected <?php }?>>Femenino</option>
                            <option value="M" <?php if($empleado->__get('genero')=='M'){?> selected <?php }?>>Masculino</option>
                        </select>
                    </td>
                    <td><label>* Fecha Nacimiento:</label></td>
                    <td>
                        <input type="date" name="fechanac" id="Fecha nacimineto" placeholder="DD/MM/AAAA"
                        required value="<?=$empleado->__get('fecha_nac')?>" min="1920-01-01" max="<?=date('Y-m-d')?>" onblur="formulario(this)">
                    </td>
                </tr>
                <tr>
                    <td><label for="telf_movil">* Telefono Movil:</label></td>
                    <td>
                        <input type="text" name="telf_movil" id="Telefono Movil" maxlength="11" minlength="7" onkeypress="return valida(event)" value="<?=$empleado->__get('telf_movil')?>"
                               placeholder="Ingrese Telefono Movil del Empleado" required onblur="formulario(this)">
                    </td>
                    </td>
                    <td><label for="telf_local">* Telefono Local:</label></td>
                    <td>
                        <input type="text" name="telf_local" id="Telefono Local" maxlength="11" minlength="7" onkeypress="return valida(event)" value="<?=$empleado->__get('telf_local')?>"
                               placeholder="Ingrese Telefono Local del Empleado" required  onblur="formulario(this)">
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <td> <label for="movimiento">* Tipo de Movimiento:</label></td>
                    <td>
                        <select name="movimiento" id="movimiento" onblur="formulario(this)">
                            <option value=" ">Seleccione</option>
                            <?php if(!empty($empleado->__get('id'))){
                            foreach ($_SESSION['movimiento'] as $r){
                                if($r['id']!=1){?>
                                <option value="<?=$r['id']?>"><?=$r['descripcion']?></option>
                            <?php }} }else{ ?>
                            <option value="<?=$_SESSION['movimiento'][0]['id']?>"><?=$_SESSION['movimiento'][0]['descripcion']?> </option>
                            <?php } ?>
                        </select>
                    </td>
                    <td><label for="dedicacion">* dedicacion:</label></td>
                    <td>
                        <select id="dedicacion" name="dedicacion" onblur="formulario(this)">
                            <option value=" ">Seleccione..</option>
                            <?php foreach ($_SESSION['dedicacion'] as $r){?>
                                <option value="<?=$r['id']?>"><?=$r['descripcion']?></option>
                            <?php }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="departamento">* Departamento:</label></td>
                    <td>
                        <select name="departamento" id="departamento" onchange=" llenarselect(value,catedras,idcatedra,iddepcatedra,'catedra',true,'unidad ejecutora',2)"
                                onblur="formulario(this)">
                            <option value=" " >Seleccione</option>
                            <?php foreach ($_SESSION['departamento'] as $r){ if($_SESSION['activa']['escuela']==$r['id_escuela']){ ?>
                           <option value="<?=$r['id']?>" <?php if($r['id']==$empleado->__get('departamento')) {?> selected <?php } ?>><?=$r['nombre']?></option>
                            <?php } } ?>
                        </select>
                    </td>
                    <td><label for="catedra">* Catedra:</label></td>
                    <td>
                        <select name="catedra" id="catedra" disabled onchange=" unid_ejec('catedra',codigocat[value-1] ,'unidad ejecutora')"
                                onblur="formulario(this)">
                            <option value=" ">Seleccione</option>
                            <?php if(!empty($empleado->__get('catedra'))){ ?>
                                <option value="<?=$empleado->__get('catedra')?>" selected><?=$_SESSION['catedra'][$empleado->__get('catedra')-1]['nombre']?> </option>
                            <?php }?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="fecha_inicio">* Fecha Inicio:</label></td>
                    <td>
                        <input type="date" name="fechainic" id="fecha inicio" min="2015-01-01" onblur="formulario(this)" value="<?=$oficio->__get('fecha_ini')?>"
                        required onchange="fecinifin('fecha inicio','fecha fin')" max="<?=date('Y-m-d')?>">
                    </td>
                    <td><label for="fecha_fin">* Fecha Fin:</label></td>
                    <td>
                        <input type="date" name="fechafin" id="fecha fin" required onblur="formulario(this)" value="<?=$oficio->__get('fecha_fin')?>"
                               onchange="fecinifin('fecha fin','fecha inicio')">
                    </td>
                </tr>
                <tr>
                    <td><label for="idac">* Idac: </label></td>
                    <td>
                        <select name="idac" id="idac" onblur="formulario(this)">
                            <option value=" ">Seleccione</option>
                            <?php if(empty($empleado->__get('idac'))){ foreach ($_SESSION['idac'] as $r){
                                if($r['status']==true){?>
                                <option value="<?=$r['id']?>"><?=$r['idac']?></option>
                            <?php } } }else{ ?>
                             <option value="<?=$r['id']?>"><?=$r['idac']?></option>
                            <?php  }?>
                        </select>
                    </td>
                    <td><label for="uni_ejec">* Unidad Ejecutora: </label></td>
                    <td>
                        <select name="uni_ejec" id="unidad ejecutora" onchange="unid_ejec('unidad ejecutora',codigoejec[value-1],'catedra','departamento')" onblur="formulario(this)" style="width: 65%">
                            <option value=" ">Seleccione</option>
                            <?php foreach ($_SESSION['unid_ejec'] as $r) {?>
                                <option value="<?=$r['id']?>" <?php if($r['id']==$empleado->__get('unidad_ejec')){ ?> selected <?php }?>><?=$r['descripcion']?></option>
                            <?php  }?>
                        </select>
                    </td>
                </tr>
                <tr align="center">
                    <td colspan="4"><label>* Campos Obligatorios</label></td>
                </tr>
                <tr align="center">
                    <td colspan="4">
                        <input type="submit" value="Registrar">
                        <input type="reset" value="Restablecer">
                    </td>
                </tr>
            </table>
        </div>
	</form>
</div>