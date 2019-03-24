<form method="post" action="<?=RUTA_HTTP?>usuario/cambio" accept-charset="UTF-8"  id="recuperar"
      onsubmit="return validar('recuperar')">
    <table class="table table-responsive">
        <tr>
            <input type="hidden" name="id" value="<?=$recuperar->__get('id')?>">
            <td><label for="pregunta">Pregunta</label></td>
            <td>
                <label>
                    <?=$recuperar->__get('pregunta')?>
                </label>
            </td>
        </tr>
        <tr>
            <td><label for="respuesta">Respuesta: </label></td>
            <td>
                <input type="text" name="respuesta" id="respuesta" placeholder="ingrese la respuesta"
                       required minlength="4" maxlength="35" size="31" onblur="formulario(this)">
            </td>
        </tr>
        <tr align="center">
            <td colspan="2"><p>Cambio de clave</p></td>
        <tr>
            <td><label for="clave">Clave Nueva:</label></td>
            <td>
                <input type="password" name="clave" minlength="6" id="clave" size="31" required maxlength="12"
                       placeholder="ingrese su nueva clave" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w\S{6,12}"
                       onblur="formulario(this); clavever('clave','clavecon');"
                       title=" Requisitos mínimos: 6 caracteres, una mayúscula y una minúscula.
                        Puede usar caracteres especiales (*/.}{¿'=, etc..). No use espacios en blanco.">
            </td>
        </tr>
        <tr>
            <td><label for="clavecon">Confirme Clave:</label></td>
            <td>
                <input type="password" name="clavecon" minlength="6" id="clavecon" maxlength="12" size="31"
                       placeholder="Confirme su nueva clave" required pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z])\w\S{6,12}"
                       onblur="formulario(this)" disabled
                       title=" Requisitos mínimos: 6 caracteres, una mayúscula y una minúscula.
                       Puede usar caracteres especiales (*/.}{¿'=, etc..). No use espacios en blanco.">
            </td>
        </tr>
        <tr>
            <td colspan="2">
                <input type="submit" name="enviar" value="enviar">
                <input type="reset" name="restablecer" value="restablecer">
            </td>
        </tr>
    </table>
</form>