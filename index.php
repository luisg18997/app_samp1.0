<?php
define( 'RUTA_HTTP', 'http://' . $_SERVER['HTTP_HOST'] . '/proyecto_ucv/' );
require_once("controlador/usuariocontroller.php");
require_once ("controlador/admcontroller.php");
require_once ("controlador/escuelacontroller.php");
require_once ("controlador/presupuestocontroller.php");
require_once ("controlador/rrhhcontroller.php");

session_start();
if(!isset($_REQUEST["c"])){
    require_once ("vista/include/header.php");
    require_once ("vista/sesion/login.php");
    require_once ("vista/include/footer.php");
}else{
    $controller = $_REQUEST['c'].'controller';
    $accion = isset($_REQUEST['a'])? $_REQUEST['a']:'index';
    if($accion=='pdf'){
    	$_SESSION['pdf']=true;
    }else{
    	unset($_SESSION['pdf']);
    }
    $controller = new $controller();
    call_user_func(array($controller,$accion));
}
?>