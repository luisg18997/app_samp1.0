<div align="center">
    <h3><?=$registro->__get('nombre')." ". $registro->__get('apellido')?></h3>
    <form>
        <table class="table table-responsive table-striped table-hover">
            <tr>
                <input type="hidden" name="id" value="<?=$registro->__get('id')?>">
                <td><label for="Nombre">Nombre:</label></td>
                <td>
                    <input type="text" id="nombre" readonly size="30" name="nombre"
                           value="<?=$registro->__get('nombre')?>">
                </td>
            </tr>
            <tr>
                <td><label for="Apellido">Apellido:</label></td>
                <td>
                    <input type="text" id="apellido" readonly size="30" name="apellido"
                           value="<?=$registro->__get('apellido')?>">
                </td>
            </tr>
            <tr>
                <td><label for="Email">Email:</label></td>
                <td>
                    <input type="email" id="email" name="email" readonly size="30"
                           value="<?=$registro->__get('email')?>">
                </td>
            </tr>
            <tr>
                <td><label for="rol">Rol</label></td>
                <td>
                    <input type="text" id="rol" readonly size="30" name="rol"
                           value="<?=$_SESSION['rol'][$registro->__get('rol')-1]['nombre']?>">
                </td>
            </tr>
            <tr>
                <td><label for="ubicacion">Ubicacion</label></td>
                <td>
                    <input type="text" id="ubicacion" readonly size="30" name="ubicacion"
                           value="<?=$_SESSION['ubicacion'][$registro->__get('ubicacion')-1]['nombre']?>">
                </td>
            </tr>
            <tr>
                <td><label for="status">Status</label></td>
                <td>
                    <input type="text" id="status" readonly size="30" name="status"
                           value="<?=$registro->__get('status')==1?'Activo':'Bloqueado'?>">
                </td>
            </tr>
            <tr>
                <td><label for="fechacrea">Fecha de Registro</label></td>
                <td>
                    <input type="datetime" id="fechacrea" readonly size="30" name="fechacrea"
                           value="<?=$registro->__get('fecha_crea')?>">
                </td>
            </tr>
            <tr align="center">
                <td colspan="2">
                    <a href="<?=RUTA_HTTP?>adm/usuario/registro/<?=$registro->__get('id')?>">Editar</a>
                    <a onclick="Javascript:return confirm('¿Seguro de eliminar este registro?');"
                          href="<?=RUTA_HTTP?>usuario/eliminar/<?=$registro->__get('id')?>">Eliminar</a>
                </td>
            </tr>
        </table>
    </form>
</div>