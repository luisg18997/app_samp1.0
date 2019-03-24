<div align="right">
    <p>Bienvenido Administrador: <?=$_SESSION['activa']['nombre']?> <?=$_SESSION['activa']['apellido']?>  <a onclick="javascript: return confirm('¿Seguro que desea cerrar sesion?');"
                href="<?=RUTA_HTTP?>usuario/cerrar">Cerrar Sesión</a></p>
</div>
<div>
	<nav>
		<ul>
			<li ><a href="<?=RUTA_HTTP?>adm">Inicio</a></li>
			<li>usuario<ul class="">
                    <li><a href="<?=RUTA_HTTP?>adm/usuario/registrar">Nuevo</a></li>
                    <li><a href="<?=RUTA_HTTP?>adm/validar">Validar</a></li>
                </ul></li>
		</ul>
	</nav>
</div>