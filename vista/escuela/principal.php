<div>
    <h4>Datos:</h4>
    <p>Nombre: <?=$_SESSION['activa']['nombre']?></p>
    <p>Apellido: <?=$_SESSION['activa']['apellido']?></p>
    <p>Email: <?=$_SESSION['activa']['email']?></p>
    <p>Ubicación: <?=$_SESSION['activa']['ubicacion']?></p>
    <p>Rol: <?=$_SESSION['rol'][$_SESSION['activa']['rol']-1]['nombre']?></p>
</div>
<div>
    <?php if($planilla!=false){ ?>
        <form name="Aprobadospla" method="post" action="">
            <h4>Planillas y/o Oficios Aprobados:</h4>
            <table class="table  table-striped table-hover">
                <tr>
                    <th>Codigo</th>
                    <th>Planilla</th>
                    <th>Movimiento</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Fecha</th>
                    <th>Fase</th>
                    <th>Accion</th>
                </tr>
                <?php foreach ($planilla as $d){?>
                    <tr>
                        <td><?=$d->__get('cod_pla')?></td>
                        <td><?=$d->__get('tipo')?></td>
                        <td><?=$d->__get('movimiento')?></td>
                        <td><?=$d->__get('nombre')?></td>
                        <td><?=$d->__get('apellido')?></td>
                        <td><?=$d->__get('fecha')?></td>
                        <td><?=$d->__get('fase')?></td>
                        <?php if($d->__get('fase')==4){?>
                        <td>
                            <a href="<?RUTA_HTTP?>escuela/planilla/<?=$d->__get('ruta')?>">Modificar</a>
                        </td>
                        <?php }else{?>
                        <td>
                            <a href="<?RUTA_HTTP?>escuela/pdf/<?=$d->__get('ruta')?>">Generar PDF</a>
                        </td>
                        <?php }?>
                    </tr>
                <?php }?>
            </table>
        </form>
    <?php } ?>
</div>