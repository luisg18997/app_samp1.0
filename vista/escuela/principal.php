<style type="text/css">
    div #datos{
        padding: 0;
        margin: 8%;
        border-radius: 5%;
        border-style: inherit;
        width: 80%
    }
</style>

<div id="datos">
    <h4 align="center">Datos:</h4>
    <p>Nombre: <?=$_SESSION['activa']['nombre']?></p>
    <p>Apellido: <?=$_SESSION['activa']['apellido']?></p>
    <p>Email: <?=$_SESSION['activa']['email']?></p>
    <p>Ubicación: <?=$_SESSION['activa']['ubicacion']?></p>
    <p>Rol: <?=$_SESSION['rol'][$_SESSION['activa']['rol']-1]['nombre']?></p>
</div>
<div>
    <?php if($planilla!=false){ ?>
        <form name="Aprobadospla" method="post" action="">
            <h4>Planillas Aprobadas:</h4>
            <table class="table  table-striped table-hover">
                <tr>
                    <th>Codigo</th>
                    <th>Planilla</th>
                    <th>Movimiento</th>
                    <th>Nombre y Apellido</th>
                    <th></th>
                    <th>Fecha</th>
                    <th>Fase</th>
                    <th>Accion</th>
                </tr>
                <?php foreach ($planilla as $d){?>
                    <tr>
                        <td><?=$d->__get('cod_pla')?></td>
                        <td><?=$d->__get('tipo')?></td>
                        <td><?=$d->__get('movimiento')?></td>
                        <td><?=$d->__get('nombre')?> <?=$d->__get('apellido')?></td>
                        <td></td>
                        <td><?=$d->__get('fecha')?></td>
                        <td><?=$d->__get('fase')?></td>
                        <td>
                            <a href="<?=RUTA_HTTP?>escuela/pdf/<?=$d->__get('ruta')?>" target="_blank">Generar PDF</a>
                        </td>
                    </tr>
                <?php }?>
            </table>
        </form>
    <?php } ?>
</div>