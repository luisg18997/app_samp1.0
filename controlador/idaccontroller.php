<?php
require_once ("modelo/idac.php");
class idaccontroller{
    private $model;
    public function __construct(){
        $this->model= new idac();
    }

    public function listar(){
        $datos= $this->model->listar();
        if(empty($datos)){
            $datos="Datos Vacios";
        }
        return $datos;
    }

    public function actualizar($id,$status,$fecha){
    $idac = new idac();
    $idac->__set('id',$id);
    $idac->__set('status',$status);
    $idac->__set('fecha_vacante',$fecha);
    $idac->actualizar($idac);
    }


}

?>