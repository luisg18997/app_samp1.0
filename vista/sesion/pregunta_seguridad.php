<h3>Pregunta de Seguridad</h3>
<form id="cambiopregunta" action="<?=RUTA_HTTP?>usuario/cambio" method="post"
      onsubmit="return validar('cambiopregunta')" accept-charset="UTF-8">
    <div class="table-responsive">
        <table class="table table-striped table-bordered table-hover" width="20%">
            <tr>
                <input type="hidden" name="id" value="<?=$_SESSION['activa']['id']?>">
                <input type="hidden" name="x" value="1">
                <td><label for="pregunta">Pregunta Secreta</label></td>
                <td>
                    <select id="pregunta" name="pregunta">
                        <option value=" ">Seleccione...</option>
                        <?php foreach ($_SESSION['pregunta'] as $dato){ ?>
                            <option value="<?=$dato['id']?>"><?=$dato['pregunta']?></option>
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="respuesta">Respuesta: </label></td>
                <td>
                    <input type="text" name="respuesta" id="respuesta" placeholder="ingrese la respuesta"
                           required minlength="4" maxlength="35" size="31">
                </td>
            </tr>
            <?php if($this->model->conpassword($_SESSION['activa']['clave'],'123456')){ ?>
            <tr>
                <td><label for="clave">Clave Nueva:</label></td>
                <td>
                    <input type="password" name="clave" minlength="6" id="clave" size="31" required maxlength="12"
                           placeholder="ingrese su nueva clave" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w\S{6,12}"
                           title=" Requisitos mínimos: 6 caracteres, una mayúscula y una minúscula.
                            Puede usar caracteres especiales (*/.}{¿'=, etc..). No use espacios en blanco.">
                </td>
            </tr>
            <tr>
                <td><label for="clavecon">Confirme Clave:</label></td>
                <td>
                    <input type="password" name="clavecon" minlength="6" id="clavecon" maxlength="12" size="31"
                           placeholder="Confirme su nueva clave" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w\S{6,12}"
                           title=" Requisitos mínimos: 6 caracteres, una mayúscula y una minúscula.
                           Puede usar caracteres especiales (*/.}{¿'=, etc..). No use espacios en blanco.">
                </td>
            </tr>
            <?php }?>
            <tr>
                <td colspan="2" align="center">
                    <label> * Campos Obligatorios</label>
                </td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" name="guardar" value="guardar">
                    <input type="reset" name="restablecer" value="restablecer">
                </td>
            </tr>
        </table>
    </div>
</form>