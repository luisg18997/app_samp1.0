<div>
    <form action="<?=RUTA_HTTP?>escuela/buscar/oficio_buscar" method="post">
        <table>
            <tr>
                <td><label for="cedula">* Cedula:
                   <select id="nacionalidad" name="nacionalidad" onblur="formulario(this)">
                            <option value=" "></option>
                            <option value="V">V-</option>
                            <option value="E">E-</option>
                        </select></label></td>
                <td>
                    <input type="search" name="busqueda"
                           placeholder="Ingrese numero de cedula" required onblur="formulario(this)" onkeypress="return valida(event)">
                </td>
                <td>
                    <input type="submit" value="buscar">
                </td>
            </tr>
        </table>
    </form>
</div>