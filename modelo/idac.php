<?php
require_once ("conexion.php");
class idac{
    private $id;
    private $idac;
    private $status;
    private $fecha_vacante;
    private $con;

    public function __construct(){
        $this->con=conexion::conectar();
    }

     //funcion para sobreescribir los datos
    public function __set($name, $value){
        return $this->$name =$value;
    }

    //funcion para capturar los datos
    public function __get($name){
        return $this->$name;
    }


    public function listar(){
        $result=array();
        $sql="select * FROM idac ORDER BY id ASC;";
        $query=$this->con->prepare($sql);
        $query->execute();
        while($r=$query->fetchAll(PDO::FETCH_ASSOC)){
            $date= new idac();
            $date->__set('id',$r['id']);
            $date->__set('idac',$r['idac']);
            $date->__set('status',$r['status']);
            $date->__set('fecha_vacante',$r['fecha_vacante']);
            $result[]=$date;
        }
        return $result;
    }

    public function actualizar(idac $data){
        $sql="UPDATE idac_status SET status=?, fecha_vacante=? WHERE id=?";
        $query=$this->con->prepare($sql);
        $query->execute(array($data->__get('status'),
            $data->__get('fecha_vacante'),
            $data->__get('id')));
        if($query==true){
            return true;
        }else{
            return false;
        }
    }

    public function agg(idac $data){
        $sql="INSERT INTO idac_status (idac,status,fecha_vacante)  VALUES (?,?,?,?)";
        $query=$this->con->prepare($sql);
        $query->execute(array($data->__get('idac'),
            $data->__get('status'),
            $data->__get('fecha_vacante'),
            $data->__get('id')));
        if($query==true){
            return true;
        }else{
            return false;
        }
    }
}
?>