<div id="container">
    <div class="login" style="margin: auto">
        <h3>Inicio de Sesión</h3>
        <form id="login" method="post" action="<?=RUTA_HTTP?>usuario/autenticar" class="login"
              onsubmit="return validar('login')" accept-charset="UTF-8">
            <table class="table ">
                <tr>
                    <td><label for="correo">Correo:</label></td>
                    <td>
                        <input type="email" name="email" id="email" onblur="formulario(this)"
                               placeholder="Ingrese su email" required maxlength="50">
                    </td>
                </tr>
                <tr>
                    <td><label for="clave">Clave:</label></td>
                    <td>
                        <input type="password" name="clave" id="clave" title="clave" onblur="formulario(this)"
                               placeholder="ingrese su clave" minlength="6" maxlength="12">
                    </td>
                </tr>

                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" value="enviar">
                        <input type="reset" value="cancerlar">
                    </td>
                </tr>
            </table>
        </form>
        <div>
            <a href="<?=RUTA_HTTP?>usuario/clave/correo">¿Olvido Clave?</a>
            <br>
            <a href="<?=RUTA_HTTP?>usuario/nuevo">Usuario Nuevo</a>
        </div>
    </div>
</div>