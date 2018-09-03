<div>
    <h4>Datos:</h4>
    <p>Nombre: <?=$_SESSION['activa']['nombre']?></p>
    <p>Apellido: <?=$_SESSION['activa']['apellido']?></p>
    <p>Email: <?=$_SESSION['activa']['email']?></p>
</div>
<div>
    <?php if($usuario!=false){ ?>
        <form name="revisarusu" method="post" action="<?=RUTA_HTTP?>adm/pdf_listar_usuario">
            <h4 align="center">Status de Usuarios</h4>
            <table class="table table-striped table-hover table-responsive">
                <tr align="center">
                    <td>Nombre</td>
                    <td>Apellido</td>
                    <td>email</td>
                    <td>rol</td>
                    <td>Ubicacion</td>
                    <td>status</td>
                    <td colspan="3">Acciones</td>
                </tr>
                <?php foreach ($usuario as $r){?>
                    <tr align="center">
                        <td>
                            <input type="hidden" value="<?=$r->__get('nombre')?>" name="nombre[]">
                            <?=$r->__get('nombre')?></td>
                        <td>
                            <input type="hidden" value="<?=$r->__get('apellido')?>" name="apellido[]">
                            <?=$r->__get('apellido')?></td>
                        <td>
                            <input type="hidden" value="<?=$r->__get('email')?>" name="email[]">
                            <?=$r->__get('email')?></td>
                        <td>
                            <input type="hidden" value="<?=$r->__get('rol')?>" name="rol[]">
                            <?=$r->__get('rol')?></td>
                        <td>
                            <input type="hidden" value="<?=$r->__get('ubicacion')?>" name="ubicacion[]">
                            <?=$r->__get('ubicacion')?></td>
                        <td>
                            <input type="hidden" value="<?=$r->__get('status')?>" name="status[]">
                            <?=$r->__get('status')?></td>
                        <td>
                            <a href="<?=RUTA_HTTP?>adm/usuario/registro/<?=$r->__get('id')?>">Editar</a>
                        </td>
                        <td>
                            <a onclick="Javascript:return confirm('¿Seguro de eliminar este registro?');"
                               href="<?=RUTA_HTTP?>usuario/eliminar/<?=$r->__get('id')?>">Eliminar</a>
                        </td>
                        <td>
                            <a href="<?=RUTA_HTTP?>adm/usuario/ver/<?=$r->__get('id')?>">Ver</a>
                        </td>
                    </tr>
                <?php } ?>
                <tr align="center">
                    <td colspan="9"><input type="submit" value=" Generar PDF"></td>
                </tr>
            </table>
        </form>
    <?php } ?>
</div>
