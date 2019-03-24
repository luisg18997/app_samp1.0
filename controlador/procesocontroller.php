<?php
require_once ("modelo/proceso.php");
class procesocontroller{

    private $model;

    public function __construct(){
        $this->model= new proceso();
    }

    public function guardar($id='',$tipo=''){
        $pro = new proceso();
        if(!empty($_REQUEST['id_proceso'])){
           $pro->__set('id',$_REQUEST['id_proceso']);
        }else{
            $pro->__set('fecha',trim($_SESSION['fecha']));
            $pro->__set('status',1);
            if ($_REQUEST['c']=='escuela') {
                if($tipo==1){
                    $codigo=$this->model->cod_oficio();
                }else{
                    $codigo=$this->model->cod_mov($_SESSION['activa']['escuela']);
                }
                $pro->__set('cod_pla',trim($codigo));
                $pro->__set('fase',1);
                $pro->__set('ubicacion',2);
                $pro->__set('id_planilla',$id);
            }else{
                $pro->__set('cod_pla',trim($_REQUEST['cod_pla']));
                $pro->__set('fase',$tipo);
                $pro->__set('ubicacion',$id);
                $pro->__set('id_planilla', $_REQUEST['id_planilla']);
                if(isset($_REQUEST['observacion'])){
                    $pro->__set('observacion',$_REQUEST['observacion']);
                    $x=2;
                }else{
                    $x=1;
                }
            }
        }
        $reg=$this->model->agg_proceso($pro);
        if($reg==true){
            if($_REQUEST['c']=='escuela'){
                return $pro->__get('cod_pla');
            }else{
                return $x;
            }
        }else{

        }
    }

    


}
?>