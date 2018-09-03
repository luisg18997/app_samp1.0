<div align="right">
    <p>Usuario: <?=$_SESSION['activa']['nombre']?> <?=$_SESSION['activa']['apellido']?>
        Ubicación: <?=$_SESSION['activa']['ubicacion']?>
        <a  onclick="javascript: return confirm('¿Seguro que desea cerrar sesion?');"
                href="<?=RUTA_HTTP?>usuario/cerrar">Cerrar Sesión</a></p>
</div>
<div>
	<nav>
		<ul>
			<li><a href="<?=RUTA_HTTP?><?=$_REQUEST['c']?>">Inicio</a></li>
			<li>Planilla<ul>
                    <?php if($_SESSION['activa']['rol']<3){ ?>
				<li>Oficio<ul>
                        <li><a href="<?=RUTA_HTTP?>escuela/planilla/oficio">Nuevo</a></li>
                        <li><a href="<?=RUTA_HTTP?>escuela/busqueda/buscar_oficio">Existente</a></li>
                    </ul></li>
                    <li><a href="<?=RUTA_HTTP?>escuela/busqueda/buscar_mov_per">Movimiento de Personal</a></li>
                    <li><a href="">Consultar Planilla</a></li>
                    <?php }
                    if($_SESSION['activa']['rol']>2) { ?>
                    <li><a href="<?=RUTA_HTTP?>rrhh/">Verificar Planilla</a></li>
                    <?php }
                    if($_SESSION['activa']['rol']>4){ ?>
                    <li><a href="<?=RUTA_HTTP?>presupuesto/">Planilla Aprobada</a></li>
                    <?php } ?>
                </ul></li>
            <li>Estatus<ul>
                    <li><a href="<?=RUTA_HTTP?><?=$_REQUEST['c']?>">IDAC</a></li>
                    <li><a href="<?=RUTA_HTTP?><?=$_REQUEST['c']?>">Planilla</a></li>
                </ul></li>
            <?php if($_SESSION['activa']['rol']==4 || $_SESSION['activa']['rol']==6){ ?>
            <li><a href="">Datos</a><ul>
                    <li><a href="<?=RUTA_HTTP?><?=$_REQUEST['c']?>">Añadir</a></li>
                    <li><a href="<?=RUTA_HTTP?><?=$_REQUEST['c']?>">Actualizar</a></li>
                    <li><a href="<?=RUTA_HTTP?><?=$_REQUEST['c']?>">Consultar</a></li>
                    <li><a href="<?=RUTA_HTTP?><?=$_REQUEST['c']?>">Listar</a></li>
                </ul></li>
            <?php } ?>
        </ul>
    </nav>
</div>