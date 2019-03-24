<!--<li><a href="">Consultar Planilla</a></li>
                    <li><a href="<?=RUTA_HTTP?>escuela/">Planilla Aprobada</a></li>
                    <?php }
                    if(/*$_SESSION['activa']['rol']>2) { */ ?>
                    <li><a href="<?=RUTA_HTTP?><?=$_REQUEST['c']?>">Verificar Planilla</a></li>
                    <?php  /*} */ ?>
                </ul></li>
            <li>Estatus<ul>
                    <li><a href="<?=RUTA_HTTP?><?=$_REQUEST['c']?>">IDAC</a></li>
                    <li><a href="<?=RUTA_HTTP?><?=$_REQUEST['c']?>">Planilla</a></li>
                </ul></li>
            <?php /* if($_SESSION['activa']['rol']==4 || $_SESSION['activa']['rol']==6){ */ ?>
            <li><a href="">Datos</a><ul>
                    <li><a href="<?=RUTA_HTTP?><?=$_REQUEST['c']?>">Añadir</a></li>
                    <li><a href="<?=RUTA_HTTP?><?=$_REQUEST['c']?>">Actualizar</a></li>
                    <li><a href="<?=RUTA_HTTP?><?=$_REQUEST['c']?>">Consultar</a></li>
                    <li><a href="<?=RUTA_HTTP?><?=$_REQUEST['c']?>">Listar</a></li>
                </ul></li> -->
            <?php /*}*/ ?>

            <li><a href="<?=RUTA_HTTP?>adm/acciones">Historial</a></li>
            <li><a href="<?=RUTA_HTTP?>adm/usuario/buscar">Consultar Usuarios</a></li>
                    <li><a href="<?=RUTA_HTTP?>adm/gestion_buscar"> Gestionar usuario</a></li>