<?php
require_once ("modelo/planilla.php");
require_once("modelo/empleado.php");
require_once("modelo/proceso.php");
require_once("planillacontroller.php");

class planillacontroller{
    private $model;
    private $empleado;
    private $proceso;

    public function __construct(){
        $this->empleado= new empleado();
        $this->proceso = new proceso();
        $this->model= new planilla();
    }

    public function oficio(){
        $oficio= new planilla();
        $empleado = new empleado();
        $proceso = new proceso();
       if(isset($_REQUEST['id'])){
        $empleado=$this->empleado->consultar(1,$_REQUEST['id'],false);
            /*if($_REQUEST['id'])){
              $cod=str_replace('_','-',$_REQUEST['id']);
                $proceso=$this->proceso->consultar_status(true,$cod);
                $oficio=$this->planilla->consultar($proceso->__get('id_planilla'),false);
                $empleado=$this->empleado->consultar($planilla->__get('id_empleado'),false);
            }else{
                $empleado=$this->empleado->consultar($_REQUEST['id'],false);
            }*/
        }
    require_once ("vista/include/header.php");
    require_once ("vista/include/menu.php");
    require_once ("vista/planilla/registar_oficio_esc.php");
    require_once ("vista/include/footer.php");
    }

    public function oficio_guardar($id){
        $ofico= new planilla();
        if(!empty($_REQUEST['id_planilla'])){
            $ofico->__set('id',$_REQUEST['id_planilla']);
        }else{
            $ofico->__set('fecha_reg',$_SESSION['fecha']);
        }
        if(isset($_REQUEST['x']) && $_REQUEST['x']==3){
            $ofico->__set('fecha_apro', $_SESSION['fecha']);
            $ofico->__set('status',0);
        }else{
            $ofico->__set('movimiento',$_REQUEST['movimiento']);
        $ofico->__set('fecha_ini',$_REQUEST['fechainic']);
        $ofico->__set('fecha_fin',$_REQUEST['fechafin']);
        $ofico->__set('status',1);
        $ofico->__set('escuela',$_SESSION['activa']['escuela']);
        $ofico->__set('tipo_planilla',1);
        $ofico->__set('id_usuario_registro',$_SESSION['activa']['id']);
        if($ofico->__get('movimiento')==1){
            $ofico->__set('dedicacion_pro',$_REQUEST['dedicacion']);
        }
        $ofico->__set('id_empleado',$id);
        $reg=$this->model->agg_oficio($ofico);
        if($reg==true){
            $result=$this->model->consultar(false,$ofico->__get('fecha_reg'));
            return $result->__get('id');
        }else {
            return false;
        }
        }
    }

    public function mov_personal(){
        $proceso = new proceso();
        $empleado = new empleado();
        $planilla= new planilla();
        if(isset($_REQUEST['id'])){
            $cod=str_replace('_','-',$_REQUEST['id']);
            $proceso=$this->proceso->consultar_status(false,$cod);
            $planilla=$this->model->consultar($proceso->__get('id_planilla'),false);
            if($planilla->__get('movimiento')==1){
                $empleado=$this->empleado->consultar(false,$planilla->__get('id_empleado'),false);
            }else{
                $empleado=$this->empleado->consultar(1,$planilla->__get('id_empleado'),false);
            }
            if($planilla->__get('movimiento')==1){
                $dedicacion=$planilla->__get('dedicacion_pro');
            }else{
                $dedicacion=$empleado->__get('dedicacion');
            }
            $i=0;
            $categoria =array();
            foreach ($_SESSION['sueldo'] as $r) {
                if($r['id_dedicacion']==$dedicacion){
                    $categoria[]=$_SESSION['categoria'][$r['id_categoria']-1];
                }    
            }
            $i=0;
            foreach ($_SESSION['anexo'] as $r) {
                if($planilla->__get('movimiento')==$r['id_movimiento']){
                    if($i==0){
                        $anexo=trim($r['nombre']);
                    }else{
                        $anexo.=";".trim($r['nombre']);
                    }
                    $i++;
                }
            }
            $ubicacion=explode(',',$empleado->__get('ubicacion'));
            $direccion=explode(',',$empleado->__get('direccion'));
            $tipo_viv=explode(',',$empleado->__get('tipo_viv'));
            $id_viv=explode(',',$empleado->__get('id_viv'));
        }
        require_once ("vista/include/header.php");
        require_once ("vista/include/menu.php");
        require_once ("vista/planilla/registro_movprt_esc.php");
        require_once ("vista/include/footer.php");
    }

    public function mov_guardar($id=''){
        $planilla = new planilla();
        if(isset($_REQUEST['id_planilla_mov'])){
            $planilla->__set('id',$_REQUEST['id_planilla_mov']);
        }else{
            $planilla->__set('fecha_reg',$_SESSION['fecha']);
            $planilla->__set('cod_oficio',$_REQUEST['cod_oficio']);
        }
        if(isset($_REQUEST['x']) && $_REQUEST['x']==3){
            $planilla->__set('programa',$_REQUEST['programa']);
            $planilla->__set('contable',$_REQUEST['contable']);
            $planilla->__set('fecha_apro',$_SESSION['fecha']);
            $planilla->__set('status',0);
            $plan=$this->model->actualizar_planilla($planilla);
            return $plan;
        }else{
            $planilla->__set('movimiento',$_REQUEST['movimiento']);
        $planilla->__set('fecha_ini',$_REQUEST['fechainic']);
        $planilla->__set('fecha_fin',$_REQUEST['fechafin']);
        $planilla->__set('status',1);
        $planilla->__set('escuela',$_SESSION['activa']['escuela']);
        $planilla->__set('tipo_planilla',2);
        $planilla->__set('id_usuario_registro',$_SESSION['activa']['id']);
        if($planilla->__get('movimiento')==1){
            $planilla->__set('dedicacion_pro',$_REQUEST['dedicacion']);
        }
        $planilla->__set('motivo',$_REQUEST['motivo']);
        $planilla->__set('id_empleado',$id);
        $reg=$this->model->agg_planilla($planilla);
        if($reg==true){
            $result=$this->model->consultar(false,$planilla->__get('fecha_reg'));
            return $result->__get('id');
        }else {
            return false;
        }
        }
    }

    /*public function guardar_anexo($id){
        print_r($_FILES);
        $nombre=$this->empleado->consultar($id,null);
        foreach ($_SESSION['anexo'] as $r) {
            if($r['id_movimiento']==$_REQUEST['movimiento']){
                $anexo=str_replace(' ','_',trim($r['nombre']));
                if($anexo==$_FILES[$anexo]){
                    $title=$nombre->__get('nombre_1')."_".$nombre->__get('apellido_1')."_".$r['id'];
                    $muf = move_uploaded_file($_FILES[$r['nombre']]['tmp_name'], "{RUTA_HTTP}uploads/" . $title);
                    $i++;
            }
        }
        die();
    }*/

    public function ver_oficio(){
        $ofico = new planilla();
        $empleado = new empleado();
        $proceso = new proceso();
        if(isset($_REQUEST['id'])){
            $cod=str_replace('_','-',$_REQUEST['id']);
            $proceso=$this->proceso->consultar_status(false,$cod);
            $oficio=$this->model->consultar($proceso->__get('id_planilla'),false);
            $empleado=$this->empleado->consultar(false,$oficio->__get('id_empleado'),false);
            $fecha=date('d-m-Y', strtotime($oficio->__get('fecha_reg')));
            $oficio->__set('fecha_reg', $fecha);
            if($oficio->__get('movimiento')==1){
                $dedicacion=$oficio->__get('dedicacion_pro');
            }else{
                $dedicacion=$empleado->__get('dedicacion');
            }
            require_once ("vista/include/header.php");
            require_once ("vista/include/menu.php");
            require_once ("vista/planilla/revisar_oficio.php");
            require_once ("vista/include/footer.php");
        }else{ ?> <script type="text/javascript">
            window.location.href="<?=RUTA_HTTP?>rrhh";
        </script> <?php 
        }
    }

    public function ver_mov_personal(){
        $planilla = new planilla();
        $empleado = new empleado();
        $proceso = new proceso();
        if(isset($_REQUEST['id'])){
            $cod=str_replace('_','-',$_REQUEST['id']);
            $proceso=$this->proceso->consultar_status(false,$cod);
            $planilla=$this->model->consultar($proceso->__get('id_planilla'),false);
            $empleado=$this->empleado->consultar(1,$planilla->__get('id_empleado'),false);
            $i=0;
            $fecha=date('d-m-Y', strtotime($planilla->__get('fecha_reg')));
            $planilla->__set('fecha_reg', $fecha);
            foreach ($_SESSION['anexo'] as $r) {
                if($planilla->__get('movimiento')==$r['id_movimiento']){
                    if($i==0){
                        $anexo=trim($r['nombre']);
                    }else{
                        $anexo.=", ".trim($r['nombre']);
                    }
                    $i++;
                }
            }
            $ubicacion=explode(',',$empleado->__get('ubicacion'));
            $direccion=explode(',',$empleado->__get('direccion'));
            $tipo_viv=explode(',',$empleado->__get('tipo_viv'));
            $id_viv=explode(',',$empleado->__get('id_viv'));
            require_once ("vista/include/header.php");
            require_once ("vista/include/menu.php");
            require_once ("vista/planilla/revisar_planilla_movprl.php");
            require_once ("vista/include/footer.php");
        }else{ ?> <script type="text/javascript">
            window.location.href="<?=RUTA_HTTP?>rrhh";
        </script> <?php 
        }
    }
}
?>