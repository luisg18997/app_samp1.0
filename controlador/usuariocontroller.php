<script src="<?=RUTA_HTTP?>js/app.js"></script>
<?php
require_once ("modelo/usuario.php");
require_once ("datoscontroller.php");
class usuariocontroller{
    private $model;
    private $datos;

    public function __construct(){ //funcion del constructor
        $this->model= new usuario();
        $this->datos= new datoscontroller();
        date_default_timezone_set('America/Caracas'); //cambia la zona horaria a la de caracas
        $_SESSION["fecha"]=date("Y-m-d H:i:s"); //almacena la fecha de hoy y hora
    }

    public function vista($vista){ // llamar las vistas relacionada con usuario
        require_once ("vista/include/header.php");
        require_once ("vista/{$vista}");
        require_once ("vista/include/footer.php");
    }

    public function autenticar(){ // autenticar usuario
        $result=$this->model->autenticar(trim($_REQUEST["email"]),trim($_REQUEST["clave"]));
        $ruta="../";
        if(is_int($result) && $result==1){  //si el correo no existe muestra el siguiente mensaje
            $msj=" Usuario No existe!!";
        }elseif( is_int($result) && $result==2){  //si la clave es incorrecta muestra el siguiente mensaje
            $msj=" Clave Incorrecta";
        }elseif(is_int($result) && $result==3){
            $msj="Usuario no validado por el administador! Contacte el administrador";
        }elseif (is_int($result) && $result==4){
            $msj="Usuario Bloqueado por el administador! Contacte el administrador";
        }elseif (is_int($result) && $result==5){
            $msj="Usuario Eliminado";
        }else{ //si coinciden email y usuario almacena los datos en una variable session
            $_SESSION["activa"]["id"]=$result->__get('id');
            $_SESSION["activa"]["nombre"]=$result->__get('nombre');
            $_SESSION["activa"]["apellido"]=$result->__get('apellido');
            $_SESSION["activa"]["email"]=$result->__get('email');
            $_SESSION["activa"]["rol"]=$result->__get('rol');
            if(!empty($result->__get('escuela'))){
                $_SESSION['activa']['escuela']=$result->__get('escuela');
                $_SESSION["activa"]["ubicacion"]=$_SESSION['escuela'][$result->__get('escuela')-1]['nombre'];
            }else{
                $_SESSION["activa"]["ubicacion"]=$_SESSION['ubicacion'][$result->__get('ubicacion')-1]['nombre'];
            }
            $_SESSION["activa"]["status"]=$result->__get('status');
            $_SESSION["activa"]["fecha_act"]=$result->__get('fecha_act');
            $_SESSION["activa"]["fecha_elim"]=$result->__get('fecha_elim');
            $_SESSION["activa"]["clave"]=$result->__get('clave');//print_r($_SESSION['activa']);
            if(empty($_SESSION['activa']['fecha_act']) && empty($_SESSION['activa']['respuesta'])){ //si fecha de actualizacion esta vacia  e igual que respuesta primero llena los datos faltantes
                $this->clave("pregunta");
            }elseif (empty($_SESSION['activa']['fecha_elim'])){ // si la fecha de eliminacion esta vacia puede acceder al sistema
                $this->acceso($_SESSION['activa']['rol']);
            }
        }
        if(!isset($_SESSION['activa'])){?>
        <script type="application/javascript">
            ruta("<?=$msj?>","<?=$ruta?>");
        </script> <?php }
    }

    public function acceso($rol){ // ruta de acceso despues de ser  logeado y tener todo correcto
        $msj= "Bienvenido usuario";
        switch ($rol){
            case 1:{ // administador
                $msj= "Bienvenido Administrador";
                $ruta = RUTA_HTTP."adm";
                break;
            }
            case 2:{ //escuela
                $ruta = RUTA_HTTP."escuela";
                break;
            }
            case ($rol>=3 && $rol<=4):{ //departamento de Recursos Humanos y Coorddinador
                $ruta = RUTA_HTTP."rrhh";
                break;
            }
            case ($rol>=5 && $rol<=6):{ //departamento de Presupuesto y Coorddinador
                $ruta = RUTA_HTTP."presupuesto";
                break;
            }
            default:{ // error de acceso
                $msj="Error no se pudo acceder al sistema";
                $ruta=RUTA_HTTP;
                break;
            }
        } ?>
        <script type="application/javascript">
            ruta("<?=$msj?>","<?=$ruta?>");
        </script> <?php
    }

    public function eliminar(){ // eliminar usuario de manera logica
        if($_REQUEST['aux']!=$_SESSION['activa']['id']){ // si el usuario a eliminar no es el mismo que el en a
            $eliminar= new usuario();
            $eliminar->__set('id',$_REQUEST['aux']);
            $eliminar->__set('status',0);
            $eliminar->__set('fecha_elim',$_SESSION['fecha']);
            $result=$this->model->eliminar($eliminar);
            if($result==true){
                $msj="Usuario eliminado con exito";
            }else{
                $msj="Usuario eliminado con exito";
            }
        }else{
            $msj="No se puede eliminar su mismo usuario";
        }
        $ruta=RUTA_HTTP."adm";
        ?> <script type="application/javascript">
            ruta("<?=$msj?>","<?=$ruta?>");
        </script> <?php
    }

    public function clave(){ //funcion que permite dirigirse y agg pregunta o buscar el correo para cambio de respuesta
        switch ($_REQUEST['aux']){
            case 'pregunta':{
                if (isset($_SESSION['activa'])){
                    $url="sesion/pregunta_seguridad.php";
                }else{ ?>
                    <script type="application/javascript">
                        window.location.href="<?=RUTA_HTTP?>";
                    </script> <?php
                }
                break;
            }
            case 'correo':{
                $url="busqueda/buscar_correo.php";
                break;
            }
        }
        $this->vista($url);
    }

    public function recuperar_clave(){ //funcion para recuperar la clave
        $recuperar = $this->model->consultar($_REQUEST['email']); // se consulta en la base de datos a traves del correo
        foreach ($_SESSION['pregunta'] as $r){
            if ($r['id']==$recuperar->__get('pregunta')){
                $recuperar->__set('pregunta',$r['pregunta']);
            }
        }
        require_once ("vista/include/header.php");
        require_once ("vista/sesion/recuperar_clave.php");
        require_once ("vista/include/footer.php");
    }

    public function cambio(){ // cambio de clave y agg pregunta y respuesta de seguridad
        $data = new usuario();
        $data->__set('id', $_REQUEST['id']);
        if (isset($_REQUEST['clave'])) { // si hubo cambio de clave
            $clave = $data->password(trim($_REQUEST['clave']));
            $data->__set('clave', $clave);
        }
        if(isset($_REQUEST['x']) && $_REQUEST['x'] == 1) { // si por primera vez agg una respuesta de seguridad
            $data->__set('pregunta', $_REQUEST['pregunta']);
            $respuesta=$this->model->password(trim($_REQUEST['respuesta'])); // se encripta la respuesta de seguridad
            $data->__set('respuesta', $respuesta);
            $data->__set('fecha_act', $_SESSION['fecha']);  // se actualiza la fecha de modificacion
            $guardar = $this->model->actualizar($data); // se procede a actualizar los datos
        } else { //consulta la respuesta de seguridad
            $guardar=false;
            $datos = $this->model->consultar( false, $data->__get('id')); // se consulta la base de datos para extraer la respuesta de seguridad guardada
            $conresp = $this->model->conpassword($datos->__get('respuesta'), $_REQUEST['respuesta']);
            if ($conresp!=true){
                $msj="Respuesta Incorrrecta";
                $registro=false;
            }else{
                $datos->__set('clave',$clave);
                $registro= $registro=$this->model->actualizar($datos);
            }
        }
        if ($guardar==true && isset($_REQUEST['pregunta'])) { // si guardar fue exitoso y agrego pregunta de seguridad se hace lo siguiente
            $this->acceso($_SESSION['activa']['rol']); // llama a acceso de pag depediendo de su rol
        } elseif ($conresp == true && $registro==true) {  // si realizo cambio de clave y fue exitoso
            $msj="Cambio de Clave exitoso";
        }else{
            $msj="Error de guardado";
        } ?>
        <script type="application/javascript">
            ruta("<?=$msj?>","../");
        </script> <?php
    }

    public function cerrar(){ //cerrar sesion
        session_destroy(); ?>
        <script type="application/javascript">
            ruta("Hasta luego","../");
        </script> <?php
    }

    public function nuevo(){ // llama a la pagina de registro de usuario
        $this->vista('sesion/registro.php');
    }

    public function guardar(){ // guarda los datos de usuario nuevo o actualiza
        $agg = new usuario();
        if (isset($_REQUEST['id'])){ // si realizo una actualizacion debe existir un id
            $agg->__set('id', $_REQUEST['id']);
        }
        $agg->__set('nombre', trim($_REQUEST['nombre']));
        $agg->__set('apellido', trim($_REQUEST['apellido']));
        $agg->__set('email', trim($_REQUEST['email']));
        if (isset($_REQUEST['escuela'])){
            $agg->__set('escuela', $_REQUEST['escuela']);
        }
        if(isset($_REQUEST['rol'])){
            $ubicacion=$agg->ubicacion($_REQUEST['rol']);
            $agg->__set('ubicacion', $ubicacion);
            $agg->__set('rol', $_REQUEST['rol']);
        }else{
            $agg->__set('ubicacion', $_REQUEST['ubicacion']);
        }
        if (empty($agg->__get('id')) && empty($_REQUEST['id'])) {
            $msj= "Se registro el usuario correctamente!! ";
            if ($_REQUEST["x"] == 1) { // si el usuario se registro el mismo
                $clave = $agg->password($_REQUEST['clave']);
                $agg->__set('clave', trim($clave));
                $agg->__set('status', 0);
                $url="../";
                $msj.= " Esperar que el administrador valide su acceso";
            } elseif($_REQUEST["x"] == 2) { // si fue registrado por el administrador
                $clave = $agg->password('123456');
                $agg->__set('clave', trim($clave));
                $agg->__set('status', 1);
                $url=RUTA_HTTP."adm";
            }
            $agg->__set('fecha_crea', $_SESSION['fecha']); // guardar la fecha que se creo el usuario
            $registro = $this->model->agg($agg);
            if ($registro){ ?>
            <script type="application/javascript">
                ruta(" <?=$msj?>","<?=$url?>");
                <?php }else{ ?>
                ruta("NO se registro el usuario correctamente","<?=$url?>"); <?php
            } ?></script> <?php
        }else{
            $agg->__set('status', $_REQUEST['status']);
            $actualizar = $this->model->actualizar($agg);
            //print_r("<br> entro en actualizar");
            if($actualizar){ ?>
                <script type="application/javascript">
                    ruta("Se actualizo el usuario correctamente","<?=RUTA_HTTP?>adm");
                    <?php }else{ ?>
                    ruta("NO se actualizo el usuario correctamente","<?=RUTA_HTTP?>adm"); <?php
            } ?></script> <?php
        }
    }
}
?>