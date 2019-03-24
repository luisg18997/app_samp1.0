<div>
    <h4>Datos:</h4>
    <p>Nombre: <?=$_SESSION['activa']['nombre']?></p>
    <p>Apellido: <?=$_SESSION['activa']['apellido']?></p>
    <p>Email: <?=$_SESSION['activa']['email']?></p>
    <p>Ubicación: <?=$_SESSION['activa']['ubicacion']?></p>
    <p>Rol: <?=$_SESSION['rol'][$_SESSION['activa']['rol']-1]['nombre']?></p>
</div>
<div>
    <?php if($revisar!=false){ ?>
        <form name="revisarrrhh" method="post" action="">
            <h4>Planillas y/o Oficios por revisar:</h4>
            <table class="table table-responsive-small table-striped table-hover">
                <tr>
                    <th>Codigo</th>
                    <th>Planilla</th>
                    <th>Movimiento</th>
                    <th>Fecha</th>
                    <th>Estatus</th>
                    <th>Escuela</th>
                    <th>Accion</th>
                </tr>
                <?php foreach ($revisar as $d){ ?>
                    <tr>
                        <td><?=$d->__get('cod_pla')?></td>
                        <td><?=$d->__get('tipo')?></td>
                        <td><?=$d->__get('movimiento')?></td>
                        <td><?=$d->__get('fecha')?></td>
                        <td><?=$d->__get('fase')?></td>
                        <td><?=$d->__get('escuela')?></td>
                        <td>
                            <a href="<?=RUTA_HTTP?>rrhh/planilla/<?=$d->__get('ruta')?>">Verificar Planilla</a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </form>
    <?php }?>
</div>