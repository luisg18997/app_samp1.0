<?php
require_once ("datoscontroller.php");
require_once ("busquedacontroller.php");
require_once('procesocontroller.php');
require_once('planillacontroller.php');
require_once 'empleadocontroller.php';
require_once ("pdfcontroller.php");
require_once ("datoscontroller.php");
require_once('modelo/planilla.php');
require_once('modelo/empleado.php');
require_once('modelo/proceso.php');

class escuelacontroller{
    private $planilla;
    private $pla;
    private $dato;
    private $empleado;
    private $emp;
    private $buscador;
    private $proceso;
    private $pro;
    private $pdf;
  
    public function __construct(){
      $this->planilla = new planillacontroller();
      $this->dato = new datoscontroller();
      $this->pro = new proceso();
      $this->pla = new planilla();
      $this->emp = new empleado();
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
        $pr=$this->pro->listar_status();
        $planilla= array();
         if($pr!=false){
          foreach ($pr as $r) {
            if($r->__get('ubicacion')==1 && $r->__get('status')==true){
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
                    $pl=$this->pla->consultar($r->__get('id_planilla'));
                    $data->__set('movimiento',trim($_SESSION['movimiento'][$pl->__get('movimiento')-1]['descripcion']));
                    $data->__set('escuela',trim($_SESSION['escuela'][$pl->__get('escuela')-1]['nombre']));
                        $data->__set('fase','Aprobado');
                    $em=$this->emp->consultar(false,$pl->__get('id_empleado'));
                    $data->__set('nombre',$em->__get('nombre_1'));
                    $data->__set('apellido',$em->__get('apellido_1'));
                    $data->__set('ubicacion',$em->__get('catedra'));
                    $planilla[]=$data;
                    unset($data);
                  }
                }
         }
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
     if( empty($_REQUEST['id_planilla']) && empty($_REQUEST['id_proceso'])){
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
        $ac='oficio_buscar';
        break;
      }
        
      case 'mov_per_buscar':{
        $ac='mov_per_buscar';
        break;
      }
    
    }
      $this->buscador->$ac();
  }

  public function pdf(){
    $proceso = new proceso();
    $empleado = new empleado();
    $planilla= new planilla();
    switch ($_REQUEST['aux']) {
      case 'ver_mov_personal':{
        $ac='planilla_mov_per';
        $x=1;
        break;
      }
      case 'ver_oficio':{
         $ac='planilla_oficio';
         $x=2;
        break;
      }  
    }
   if(isset($_REQUEST['id'])){
      $cod=str_replace('_','-',$_REQUEST['id']);
      $proceso=$this->pro->consultar_status(false,$cod);
      $planilla=$this->pla->consultar($proceso->__get('id_planilla'),false);
      $empleado=$this->emp->consultar(1, $planilla->__get('id_empleado'),false);
      if($x==1){
        $i=0;
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
      }else{
        $fecha=$planilla->__get('fecha_fin')-$planilla->__get('fecha_ini');
        if($fecha>1){
          $fi=explode('-',$planilla->__get('fecha_ini'));
          $ff=explode('-',$planilla->__get('fecha_fin'));
          $fec=date('d-m-Y', strtotime($planilla->__get('fecha_ini'))).' hasta el '.date('d-m-Y',strtotime("31-12-{$fi[0]}"));
          for ($i=0; $i <=$fecha ; $i++) { 
            $f=$fi[0]+$i;
            if($i>0){
              if($i<($fecha)){
                $fec.=', ';
              }else{
                $fec.=' y ';
              }
              $fec.=" del ".date('d-m-Y',strtotime("01-01-{$f}")).' hasta el  ';
              if($i!=($fecha)){
                $fec.=date('d-m-Y',strtotime("31-12-{$f}"));
              }
            }
            
          }
          $fec.=date('d-m-Y', strtotime($planilla->__get('fecha_fin')));
        }else{
          $fec=date('d-m-Y', strtotime($planilla->__get('fecha_ini'))).' hasta el '.date('d-m-Y', strtotime($planilla->__get('fecha_fin')));
        }
      }
    }
    ob_start();
    require_once ("vista/pdf/{$ac}.php");
    $html=ob_get_clean();
    //echo $html;
    $this->pdf->visualizar($html,$proceso->__get('cod_pla'));
  }

}

?>