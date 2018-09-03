<?php
require_once ("datoscontroller.php");
require_once ("busquedacontroller.php");
require_once('procesocontroller.php');
require_once('planillacontroller.php');
require_once 'empleadocontroller.php';
require_once ("pdfcontroller.php");
require_once ("datoscontroller.php");

class escuelacontroller{
    private $planilla;
    private $dato;
    private $empleado;
    private $buscador;
    private $proceso;
    private $pdf;
  
    public function __construct(){
      $this->planilla = new planillacontroller();
      $this->dato = new datoscontroller();
      $this->pdf= new pdfcontroller();
      $this->empleado= new empleadocontroller();
      $this->buscador= new busquedacontroller();
      $this->proceso= new procesocontroller();
      $_SESSION["fecha"]=date("Y-m-d H:i:s"); //almacena la fecha de hoy y hora
      if(isset($_SESSION['activa']) && !empty($_SESSION['activa'])){
          if($_SESSION['activa']['rol']!=2){ ?>
                <script>
                alert("No tiene acceso a la escuela");
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
        $data = new planilla();
        $planilla= array();
        require_once ("vista/include/header.php");
        require_once ("vista/include/menu.php");
        require_once ("vista/escuela/principal.php");
        require_once ("vista/include/footer.php");
    }

    public function planilla(){
      $valor= count($_SESSION['escuela'])-1;
      $_SESSION['unid_ejec']=array();
      foreach ($_SESSION['unidad_ejecutora'] as $r){
        if($r['codigo']>=$_SESSION['escuela'][$_SESSION['activa']['escuela']-1]['codigo'] && $r['codigo']<$_SESSION['escuela'][$_SESSION['activa']['escuela']]['codigo']){
        $unid_ejc[]=$r;
        }elseif($valor==$_SESSION['activa']['escuela']-1 && $r['codigo']>=$_SESSION['escuela'][$_SESSION['activa']['escuela']-1]['codigo']){
          $unid_ejc[]=$r;
          }
        }
      $_SESSION['unid_ejec']=$unid_ejc;
      switch ($_REQUEST['aux']) {
        case 'oficio':{
          $accion="oficio";
          break;
        }
        case 'mov_personal':{
          $accion="mov_personal";
          break;
        }
      }
      $this->planilla->$accion(); 
    }

  public function guardar_oficio(){
     $emple=$this->empleado->guardar();
     $oficio=$this->planilla->oficio_guardar($emple);
     $proc =$this->proceso->guardar($oficio,1);
     if(empty($_REQUEST['id_empleado']) && empty($_REQUEST['id_planilla']) && empty($_REQUEST['id_proceso'])){
         if($proc!=false) {
             $msj="Registro de planilla exitoso! Codigo de planilla Oficio {$proc}";
             $proc=str_replace('-','_',$proc);?>
             <script>
                 alert('<?=$msj?>');
                 if(confirm('¿Desea registrar Planilla de Movimiento de personal?')) {
                     window.location.href = "<?=RUTA_HTTP?>escuela/planilla/mov_personal/<?=$proc?>";
                 }else {
                     window.location.href = "<?=RUTA_HTTP?>escuela";
                 }
             </script><?php
         }else{
             $msj="Registro de planilla NO exitoso!";?>
             <script>
                 ruta('<?=$msj?>','<?=RUTA_HTTP?>escuela');
             </script> <?php
         }
     }else{
         if($proc!=false){
             if($proc!=false) {
                 $msj="Actualizacion de planilla exitoso! Codigo de planilla Oficio {$proc}";
                 $proc=str_replace('-','_',$proc);?>
                 <script>
                     alert('<?=$msj?>');
                     if(confirm('¿Desea actualizar Planilla de Movimiento de personal?')) {
                         window.location.href = "<?=RUTA_HTTP?>escuela/planilla/mov_personal/<?=$proc?>";
                     }else {
                         window.location.href = "<?=RUTA_HTTP?>escuela";
                     }
                 </script><?php
             }else{
                 $msj="Actualizacion de planilla NO exitoso!";?>
                 <script>
                     ruta('<?=$msj?>','<?=RUTA_HTTP?>escuela');
                 </script> <?php
             }
         }
     }
  }

  public function guardar_planilla_mov(){
    $emple=$this->empleado->guardar();
    $planilla=$this->planilla->mov_guardar($emple);
    $proc=$this->proceso->guardar($planilla,2);
    //if(isset(($_FILES))){$anexo=$this->planilla->guardar_anexo($emple);}
    if(!isset($_REQUEST['id_planilla_mov'])){
      if($proc!=false){
        $msj="Registro de planilla de Movimiento personal exitoso!! codigo de planilla {$proc} ";
        if(isset($anexo) && $anexo==true){
          $msj.=" Anexos incluidos de manera digital!!";
        }else{
          $msj.=" Anexos incluidos de manera fisica!!";
        }
      }else{
        $msj="Registro de planilla NO exitoso!";
      }
      ?>
      <script>
        ruta('<?=$msj?>','<?=RUTA_HTTP?>escuela');
      </script> <?php
    }else{
      print_r("esta aqui");
    }
  }

  public function busqueda(){
    switch ($_REQUEST['aux']) {
      case 'buscar_oficio':{
        $url='buscar_oficio.php';
        break;
      }
        
      case 'buscar_mov_per':{
        $url='buscar_mov_per.php';
        break;
      }
    }
    require_once ("vista/include/header.php");
        require_once ("vista/include/menu.php");
        require_once ("vista/busqueda/{$url}");
        require_once ("vista/include/footer.php");
  }

  public function buscar(){
    switch ($_REQUEST['aux']) {
      case 'oficio_buscar':{
        print_r('entro en oficio');
        $ac='oficio_buscar';
        break;
      }
        
      case 'mov_per_buscar':{
        print_r('entro en pla');
        $ac='mov_per_buscar';
        break;
      }
      default:
      print_r('no consiguio ninguna llora');
      break;
      
    }
      $this->buscador->$ac();
  }

}

?>