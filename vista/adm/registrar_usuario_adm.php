
<div align="center">
	<h3>Usuario: <?=!empty($registro->__get('nombre'))? "{$registro->__get('nombre')} {$registro->__get('apellido')}":"Nuevo"?> </h3>
	<form method="post" action="<?=RUTA_HTTP?>usuario/guardar"
          id="usuario" onsubmit="return validar('usuario')">
        <table class="table">
            <tr>
                <input type="hidden" name="id" value="<?=$registro->__get('id')?>">
                <input type="hidden" name="x" value="2">
                <td><label for="Nombre">* Nombre:</label></td>
                <td>
                    <input type="text" id="nombre" required placeholder="ingrese nombre" minlength="4" onblur="formulario(this)" size="30"
                           size="33" name="nombre" maxlength="25" pattern="|^[a-zñáéíóú/A-ZÑÁÉÍÓÚ]*$|" value="<?=$registro->__get('nombre')?>">
                </td>
            </tr>
            <tr>
                <td><label for="Apellido">* Apellido:</label></td>
                <td>
                    <input type="text" id="apellido" required placeholder="ingrese apellido" size="30"  onblur="formulario(this)"
                           minlength="4" name="apellido" maxlength="25" pattern="|^[a-zñáéíóú/A-ZÑÁÉÍÓÚ]*$|" value="<?=$registro->__get('apellido')?>">
                </td>
            </tr>
            <tr>
                <td><label for="Email">* Email:</label></td>
                <td>
                    <input type="email" id="email" name="email" placeholder="ejemplo.ejemplo@ucv.ve"
                           minlength="10" required maxlength="50" size="30" value="<?=$registro->__get('email')?>"
                           onchange=" return veremil('email','enviar')"
                        <?php if($registro->__get('email')!=""){ ?> readonly <?php } ?> onblur="formulario(this)">
                </td>
            </tr>
            <tr>
                <td><label for="rol">* Tipo de Rol</label></td>
                <td>
                    <select name="rol" id="rol" onblur="formulario(this)" onchange="selectesc('rol','escu','escuela')">
                        <option value= "" >Seleccione...</option>
                        <?php foreach ($_SESSION["rol"] as $data){ ?>
                            <option value="<?=$data['id']?>"
                            <?php if ($registro->__get('rol')==$data['id']){ ?> selected <?php } ?>
                            ><?=trim($data['nombre'])?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <?php if(!empty($registro->__get('escuela')) && $registro->__get('rol')==2){ ?>
            <tr id="escu">
             <?php }else{ ?>
            <tr style="display:none;" id="escu">
             <?php } ?>
                <td><label for="escuela">* Escuela</label></td>
                <td>
                    <select name="escuela" id="escuela" disabled="" onblur="formulario(this)">
                        <option value= "" >Seleccione...</option>
                        <?php foreach ($_SESSION["escuela"] as $data){ ?>
                            <option value="<?=$data['id']?>"
                                <?php if ($registro->__get('escuela')==$data['id']){ ?> selected <?php } ?>
                            ><?=trim($data['nombre'])?></option>
                        <?php }?>
                    </select>
                </td>
            </tr>
            <?php if(!empty($registro->__get('id'))){ ?>
                <tr>
                    <td><label for="status">Status</label></td>
                    <td>
                        <select name="status" id="status" onblur="formulario(this)">>
                            <option value="">Seleccione...</option>
                            <option value="1" <?php if($registro->__get('status')==1){ ?>
                            selected <?php }?>>Activo </option>
                            <option value="0" <?php if ($registro->__get('status')==0) { ?> selected <?php } ?>
                            >Bloqueado</option>
                        </select>
                    </td>
                </tr>
            <?php } ?>
            <tr>
                <td colspan="2" align="center"><label>Campos Obligatorios *</label></td>
            </tr>
            <tr>

                <td colspan="2" align="center">
                    <input type="submit" id="enviar" value="enviar">
                    <input type="reset" value="cancelar">
                </td>
            </tr>
        </table>
	</form>
</div>