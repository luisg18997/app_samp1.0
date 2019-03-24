<?php ob_start(); ?>
<table  align="center">
    <tr align="center">
        <td><span><img src="img/ucv.png" width="15%" height="35%"></span></td>
        <td><h2>SISTEMA AUTOMATIZADO DEL MOVIMIENTO DE PERSONAL</h2></td>
        <td><img src="img/faculta_humanidades_educacion.png" width="15%" height="35%"></td>
    </tr>
</table>
<br>
<h1 style="text-align: center;">Status Usuarios:</h1>
<br>
<table align="center" border="1">
    <tr align="center">
        <td>N°</td>
        <td>Nombre</td>
        <td>Apellido</td>
        <td>email</td>
        <td>rol</td>
        <td>Ubicacion</td>
        <td>status</td>
    </tr>
    <?php $i=1;
    foreach ($usuario as $r){?>
    <tr align="center">
        <td><?=$i?></td>
        <td><?=$r->__get('nombre')?></td>
        <td><?=$r->__get('apellido')?></td>
        <td><?=$r->__get('email')?></td>
        <td><?=$r->__get('rol')?></td>
        <td><?=$r->__get('ubicacion')?></td>
        <td><?=$r->__get('status')?></td>
    </tr>
<?php $i++; } ?>
</table>
