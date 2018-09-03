<div align="right">
    <p>Bienvenido Administrador: <?=$_SESSION['activa']['nombre']?> <?=$_SESSION['activa']['apellido']?>  <a onclick="javascript: return confirm('¿Seguro que desea cerrar sesion?');"
                href="<?=RUTA_HTTP?>usuario/cerrar">Cerrar Sesión</a></p>
</div>
<div>
	<nav class="">
		<ul class="">
			<li ><a href="<?=RUTA_HTTP?>adm">Inicio</a></li>
			<li>usuario<ul class="">
                    <li><a href="<?=RUTA_HTTP?>adm/usuario/registrar">Nuevo</a></li>
                    <li><a href="<?=RUTA_HTTP?>adm/validar">Validar</a></li>
                    <li><a href="<?=RUTA_HTTP?>adm/usuario/buscar">Consultar Usuarios</a></li>
                    <li><a href="<?=RUTA_HTTP?>adm/gestion_buscar"> Gestionar usuario</a></li>
                </ul></li>
			<li><a href="<?=RUTA_HTTP?>adm/acciones">Historial</a></li>
		</ul>
	</nav>
</div>
<div class="clearfix"></div>