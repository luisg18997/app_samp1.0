<?php
require_once('modelo/empleado.php');
require_once('modelo/proceso.php');
require_once('modelo/planilla.php');
require_once('planillacontroller.php');
require_once('procesocontroller.php');
class rrhhcontroller{
    private $empleado;
    private $planilla;
    private $planillacontroller;
    private $procesocontroller;
    private $proceso;

    public function __construct(){
        if(isset($_SESSION['activa']) && !empty($_SESSION['activa'])){
            if($_SESSION['activa']['rol']!=3 && $_SESSION['activa']['rol']!=4){ ?>
                <script>
                    alert("No tiene acceso al departamento de Recursos Humanos");
                    history.back();
                </script> <?php
            }
        }else{ ?>
            <script type="application/javascript">
                window.location.href="<?=RUTA_HTTP?>";
            </script> <?php
        }
        $this->planillacontroller = new planillacontroller();
        $this->procesocontroller= new procesocontroller();
        $this->empleado=new empleado();
        $this->planilla= new planilla();
        $this->proceso= new proceso();
    }

    public function index(){
        $pr=$this->proceso->listar_status();
        if($pr!=false){
            $revisar=array();
            foreach ($pr as $r) {
                if($r->__get('ubicacion')==2 && $r->__get('status')==true){
                    $data = new proceso();
                    $data->__set('cod_pla',$r->__get('cod_pla'));
                    $ruta=str_replace('-','_',$r->__get('cod_pla'));
                    if($r->__get('tipo')==1){
                        $data->__set('tipo','Planilla Oficio');
                        $data->__set('ruta',"ver_oficio/{$ruta}");
                    }else{
                        $data->__set('tipo','Planilla Movimiento de Personal');
                        $data->__set('ruta',"ver_mov_personal/{$ruta}");
                    }
                    $fecha=date('d-m-Y', strtotime($r->__get('fecha')));
                    $data->__set('fecha',$fecha);
                    $pl=$this->planilla->consultar($r->__get('id_planilla'));
                    $data->__set('movimiento',trim($_SESSION['movimiento'][$pl->__get('movimiento')-1]['descripcion']));
                    $data->__set('escuela',trim($_SESSION['escuela'][$pl->__get('escuela')-1]['nombre']));
                    if($r->__get('fase')==1){
                        $data->__set('fase','Recibido');
                    }else{
                        $data->__set('fase','Revision');
                    }
                    $revisar[]=$data;
                    unset($data);
                }
            }
        }else{
            $revisar=false;
        }
        require_once ("vista/include/header.php");
        require_once ("vista/include/menu.php");
        require_once ("vista/rrhh/principal.php");
        require_once ("vista/include/footer.php");
    }

    public function planilla(){
        switch ($_REQUEST['aux']) {
        case 'ver_oficio':{
          $accion="ver_oficio";
          break;
        }
        case 'ver_mov_personal':{
          $accion="ver_mov_personal";
          break;
        }
      }
      $cod=str_replace('_','-',$_REQUEST['id']);
      $data=$this->proceso->consultar_status(false,$cod);
      if($data->__get('fase')==1){
      $data->__set('status',0);
      $this->proceso->actualizar($data);
      $data->__set('fecha',trim($_SESSION['fecha']));
      $data->__set('status',1);
      $data->__set('ubicacion',2);
      $data->__set('fase',2);
      $this->proceso->agg_proceso($data);
      }
      $this->planillacontroller->$accion(); 
    }

    public function confi_mov_per(){
        $data=$this->proceso->consultar_status($_REQUEST['id'],false);
        $data->__set('status',0);
        print_r($this->proceso->actualizar($data));
        if(!isset($_REQUEST['observacion'])){
            $pro=$this->procesocontroller->guardar(3,1);
        }else{
            $pro=$this->procesocontroller->guardar(1,4);
        }
        if($pro!=false){
            if($pro==1){
                $msj='Planilla enviada al departamento de Presupuesto exitosamente';
            }else{
                $msj='Planilla devuelta a la escuela';
            }
        }else{
            $msj='Planilla no enviada';
        } ?> <script type="text/javascript">
            ruta('<?=$msj?>','<?=RUTA_HTTP?>rrhh');
        </script> <?php
    }

    public function confi_oficio(){
        $data=$this->proceso->consultar_status($_REQUEST['id'],false);
        $data->__set('status',0);
        $this->proceso->actualizar($data);
        if(!isset($_REQUEST['observacion'])){
            $pro=$this->procesocontroller->guardar(3,1);
        }else{
            $pro=$this->procesocontroller->guardar(1,4);
        }
        if($pro!=false){
            if($pro==1){
                $msj='Planilla enviada al departamento de Presupuesto exitosamente';
            }else{
                $msj='Planilla devuelta a la escuela';
            }
        }else{
            $msj='Planilla no enviada';
        } ?> <script type="text/javascript">
            ruta('<?=$msj?>','<?=RUTA_HTTP?>rrhh');
        </script> <?php
    }
}
?>