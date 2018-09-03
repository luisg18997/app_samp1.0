<div>
    <form action="<?=RUTA_HTTP?>escuela/buscar/mov_per_buscar" method="post">
        <table>
            <tr>
                <td><label for="oficio">Codigo de Oficio:</label></td>
                <td>
                    <input type="search" name="busqueda"
                           placeholder="Ingrese numero de planilla de oficio generada" required>
                </td>
                <td>
                    <input type="submit" value="buscar">
                </td>
            </tr>
        </table>
    </form>
</div>