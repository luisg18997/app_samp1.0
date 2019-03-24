<div>
    <h4>Usuario a Validar acceso</h4>
    <?php if(isset($_REQUEST['valido']) && $_REQUEST['valido']== true) { ?>
    <form action="<?=RUTA_HTTP?>adm/valido" method="post" id="validar" onsubmit=" return validar('validar')">
        <table class="table">
            <thead>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Correo</th>
            <th>Ubicacion</th>
            <th>Rol</th>
            <th>Validar</th>
            </thead>
                <?php $i=0; foreach ($registro as $r) {?>
                    <tr>
                        <td>
                            <input type="hidden" name="x[]" id="x<?=$i?>">
                            <input type="hidden" name="id[]" value="<?=$r->__get('id')?>">
                            <?=$r->__get('nombre')?></td>
                        <td><?=$r->__get('apellido')?></td>
                        <td><?= $r->__get('email')?></td>
                        <td><?=$r->__get('ubicacion')?></td>
                        <td>
                            <select id="rol" name="rol[]">
                                <option value=" ">Seleccione...</option>
                                <?php  foreach ($_SESSION['rol'] as $r){
                                    if($r['id']!=1){?><option value="<?=$r['id']?>"><?=$r['nombre']?></option><?php } }?>
                            </select>
                        </td>
                        <td>
                            <div style="display: block" id="opcion<?=$i?>">
                                <input type="button" value="SI" id="si<?=$i?>" onclick="validarusu('si<?=$i?>','x<?=$i?>','opcion<?=$i?>','confi<?=$i?>')" >
                                <input type="button" value="NO" id="no<?=$i?>"  onclick="validarusu('no<?=$i?>','x<?=$i?>','opcion<?=$i?>','confi<?=$i?>')" >
                            </div>
                            <div style="display: none" id="confi<?=$i?>"></div>
                        </td>
                    </tr>
                <?php $i++; } ?>
            <tr>
                <td>
                    <input type="submit" value="enviar">
                    <input type="reset" value="cancelar">
                </td>
            </tr>
        </table>
    </form>
        <?php }else{
            echo "<p>NO hay usuario que validar</p>";
        }?>
</div>