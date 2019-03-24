<style type="text/css">
    *{
       margin: 0;
        padding: 0; 
    }
    div #nav{
        margin: 0;
        padding: 0;
    }
    #nav {  
        margin: 0; 
        padding: 0; 
        float: left;
    }
#nav li { list-style: none; background: #fff; width: 250px; border-bottom: 1px solid #666; }
#nav li a { display: block; padding: 8px; border-left: 4px solid #444; text-decoration: none; box-shadow: 2px 2px 5px #ccc; color: #555; }
#nav li a:hover { border-left: 4px solid #069; background: #f8f8f8; }
#nav li #sub { display: none; }
#nav li:hover #sub { display: block; }
#nav li:hover #sub li { background: #333; }
#nav li:hover #sub li a { color: #ccc; }
#nav li:hover #sub li a:hover { background: #232; border-left: 4px solid #900; }
#nav li #sub li #sub2 {display: none;}
#nav li #sub li:hover #sub2 { display: block; }
.sesion{
    text-align: right;
    color: cornflowerblue;
    padding: 0;
    margin: 0;
}
#barra{
    margin: 0;
    padding: 0;
    border-bottom: double;
    background-color: azure;
    margin-bottom: 1%;
}

.close a{
    text-align: center;
    color: red;
    padding: 0;
    margin: 0;
}
</style>
<div id="barra">
    <p class='sesion'>Usuario: <?=$_SESSION['activa']['nombre']?> <?=$_SESSION['activa']['apellido']?>
        Ubicación: <?=$_SESSION['activa']['ubicacion']?> <a onclick="javascript: return confirm('¿Seguro que desea cerrar sesion?');" href="<?=RUTA_HTTP?>usuario/cerrar" class='close'> Cerrar Sesión</a>
    </p>
</div>
	<ul id="nav">
    	<li><a href="<?=RUTA_HTTP?><?=$_REQUEST['c']?>">Inicio</a></li>
        <?php if($_SESSION['activa']['rol']<3){ ?>
    	<li><a href="#">Planilla</a>
            <ul id="sub">
    		<li><a href="#">Oficio </a>
                <ul id="sub2">
                    <li><a href="<?=RUTA_HTTP?>escuela/planilla/oficio">Nuevo</a></li>
                    <li><a href="<?=RUTA_HTTP?>escuela/busqueda/buscar_oficio">Existente</a></li>
                </ul></li>
                <li><a href="<?=RUTA_HTTP?>escuela/busqueda/buscar_mov_per">Movimiento de Personal</a></li> 
               <li><a href="">Consultar Planilla</a></li>
                <li><a href="<?=RUTA_HTTP?>escuela/">Planilla Aprobada</a></li>
                <?php } if($_SESSION['activa']['rol']>2) { ?>
                <li><a href="<?=RUTA_HTTP?><?=$_REQUEST['c']?>">Verificar Planilla</a></li>
                <?php } ?>
                </ul></li>
            <li><a href="#">Estatus</a><ul id="sub">
                    <li><a href="<?=RUTA_HTTP?><?=$_REQUEST['c']?>">IDAC</a></li>
                    <li><a href="<?=RUTA_HTTP?><?=$_REQUEST['c']?>">Planilla</a></li>
                </ul></li>
            <?php if($_SESSION['activa']['rol']==4 || $_SESSION['activa']['rol']==6){ ?>
            <li><a href="#">Datos</a><ul id="sub">
                <li><a href="<?=RUTA_HTTP?><?=$_REQUEST['c']?>">Añadir</a></li>
                <li><a href="<?=RUTA_HTTP?><?=$_REQUEST['c']?>">Actualizar</a></li>
                <li><a href="<?=RUTA_HTTP?><?=$_REQUEST['c']?>">Consultar</a></li>
                <li><a href="<?=RUTA_HTTP?><?=$_REQUEST['c']?>">Listar</a></li>
                </ul></li>
            <?php }?>
    </ul>

