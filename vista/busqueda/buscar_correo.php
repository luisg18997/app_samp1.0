<h3>Recuperar clave</h3>
<form id="buscar" method="post" action="<?=RUTA_HTTP?>usuario/recuperar_clave">
    <table class="table-responsive table">
        <tr>
            <td><label for="">ingrese correo:</label></td>
            <td>
                <input type="email" name="email" id="email" placeholder="ingrese correo" required>
            </td>
            <td>
                <input type="button" onclick="return valemail('email','buscar');" value="Buscar">
            </td>
        </tr>
    </table>
</form>
<a href="<?=RUTA_HTTP?>"> salir </a>