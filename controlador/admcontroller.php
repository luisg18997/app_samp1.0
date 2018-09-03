<?php
require_once ("modelo/usuario.php");
require_once ("datoscontroller.php");
require_once ("pdfcontroller.php");
class admcontroller{
    private $model;
    private $datos;
    private $pdf;
    public function __construct(){
        $this->model= new usuario();
        $this->datos = new datoscontroller();
        $this->pdf = new pdfcontroller();
    	if(isset($_SESSION['activa']) && !empty($_SESSION['activa'])){
    	    if($_SESSION['activa']['rol']!=1){ ?>
                <script>
                    alert("No tiene acceso como administrador");
                    history.back();
                </script> <?php
            }
        }else{ ?>
    	   <script type="application/javascript">
               window.location.href="<?=RUTA_HTTP?>";
           </script> <?php
        }
    }

    public function index(){
        $data = new usuario();
        $usuario= array();
        $result=$data->listar();
        foreach ($result as $d){
            if($d->__get('id')!=$_SESSION['activa']['id']){
                if (!empty($d->__get('rol')) && empty($d->__get('fecha_elim'))){
                    $dato = new usuario();
                    //print_r($_SESSION['rol'][$d->__get('rol')]['id']);
                    $dato->__set('id',$d->__get('id'));
                    $dato->__set('email',$d->__get('email'));
                    $dato->__set('nombre',$d->__get('nombre'));
                    $dato->__set('apellido',$d->__get('apellido'));
                    $dato->__set('rol',$_SESSION['rol'][$d->__get('rol')-1]['nombre']);
                    if (!empty($d->__get('escuela'))){
                        $dato->__set('ubicacion',$_SESSION['escuela'][$d->__get('escuela')-1]['nombre']);
                    }else{
                        $dato->__set('ubicacion',$_SESSION['ubicacion'][$d->__get('ubicacion')-1]['nombre']);
                    }
                    if($d->__get('status')== 1){
                        $dato->__set('status','activo');
                    }else{
                        $dato->__set('status','bloqueado');
                    }
                    $usuario[]=$dato;
                }
            }
        }
        require_once ("vista/include/header.php");
        require_once ("vista/include/menu_adm.php");
        require_once ("vista/adm/principal.php");
        require_once ("vista/include/footer.php");
    }

    public function usuario(){
        $registro = new usuario();
        switch ($_REQUEST["aux"]){
            case "buscar":{
                //print_r("cumple la condicion");
                $url='busqueda/busqueda_usuario.php';
                break;
            }
            case  "registrar":{
                $url='adm/registrar_usuario_adm.php';
                break;
            }
            case  "registro":{
                $url='adm/registrar_usuario_adm.php';
                break;
            }
            case "ver":{
                $url='adm/ver_usuario.php';
                break;
            }
        }
        if (isset($_REQUEST['id'])){
            $registro=$this->model->consultar(false,$_REQUEST['id']);
        }
        require_once ("vista/include/header.php");
        require_once ("vista/include/menu_adm.php");
        require_once ("vista/{$url}");
        require_once ("vista/include/footer.php");
    }

    public function validar(){
        $registro = array();
        $data= new  usuario;
        $result=$data->listar();
        foreach ($result as $d){
            if(empty($d->__get('rol'))){
                $dato = new usuario();
                $dato->__set('id',$d->__get('id'));
                $dato->__set('email',$d->__get('email'));
                $dato->__set('nombre',$d->__get('nombre'));
                $dato->__set('apellido',$d->__get('apellido'));
                if (!empty($d->__get('escuela'))){
                    $dato->__set('ubicacion',$_SESSION['escuela'][$d->__get('escuela')-1]['nombre']);
                }else{
                    $dato->__set('ubicacion',$_SESSION['ubicacion'][$d->__get('ubicacion')-1]['nombre']);
                }
                $registro[]=$dato;
                $_REQUEST['valido']=true;
            }
        }
        if(count($registro)==0){
            $_REQUEST['valido']=false;
        }
        require_once ("vista/include/header.php");
        require_once ("vista/include/menu_adm.php");
        require_once ("vista/adm/usuario_validar.php");
        require_once ("vista/include/footer.php");
    }

    public function valido(){
        $x1 = 0; $x2 = 0; $i = 0;
        foreach ($_REQUEST['x'] as $d) {
            $x1++;
            $valido = $this->model->consultar(false, $_REQUEST['id'][$i]);
            if ($d == 1) {
                $valido->__set('status', 1);
                $valido->__set('rol', $_REQUEST['rol'][$i]);
                $actualizar = $this->model->actualizar($valido);
            } elseif ($d==2) {
                $valido->__set('status', 1);
                $valido->__set('fecha_elim',$_SESSION['fecha']);
                $eliminar = $this->model->eliminar($valido);
                $x2++;
            }
            $i++;
        }
        if ($x1==0){
            $actualizar = true;
        }
        if ($x2==0){
            $eliminar =true;
        }
        if ($actualizar == true && $eliminar == true) {
            $msj = " Validaciones exitosa";
        } else {
            $msj = " Validaciones exitosa";
        } ?>
        <script type="application/javascript">
            ruta('<?=$msj?>','<?=RUTA_HTTP?>adm');
        </script> <?php
    }

    public function pdf_listar_usuario(){
        if (isset($_REQUEST['nombre'])){
            $usuario=array();
            for ($i=0; $i<count($_POST)-1;$i++){
                $result= new usuario();
                $result->__set('nombre',$_POST['nombre'][$i]);
                $result->__set('apellido',$_POST['apellido'][$i]);
                $result->__set('email',$_POST['email'][$i]);
                $result->__set('rol',$_POST['rol'][$i]);
                $result->__set('ubicacion',$_POST['ubicacion'][$i]);
                $result->__set('status',$_POST['status'][$i]);
                $usuario[]=$result;
            }
            if(isset($_SESSION['pdf'])){
                unset($_SESSION['pdf']);
            }
            require_once ("vista/pdf/status_usuario_adm.php");
            $html=ob_get_clean();
            $this->pdf->visualizar($html,'status_usuario'); ?> 
            <script type="text/javascript"> window.location.href='<?=RUTA_HTTP?>adm';</script> <?php
        }else{ ?>
            <script> window.location.href='<?=RUTA_HTTP?>adm'; </script><?php
        }
    }
}
?>