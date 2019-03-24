<?php

require_once("conexion.php");
class planilla{
	private $id;
	private $id_empleado;
	private $id_usuario_registro;
	private $tipo_planilla;
	private $dedicacion_pro;
	private $movimiento;
	private $anexos;
    private $ruta;
	private $fecha_reg;
    private $escuela;
    private $cod_oficio;
	private $contable;
	private $programa;
	private $fecha_ini;
	private $fecha_fin;
	private $fecha_apro;
	private $status;
    private $motivo;
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
        $sql="SELECT * FROM planilla_empleado  ORDER  BY id ASC ";
        $query=$this->con->prepare($sql);
        $query->execute();
        $result= array();
        if($query->rowCount()!=0){
            while ($r=$query->fetch(PDO::FETCH_ASSOC)){
                $data= new planilla();
                $data->__set('id',$r['id']);
                $data->__set('id_empleado',$r['id_empleado']);
                $data->__set('id_usuario_registro',$r['id_usuario_registro']);
                $data->__set('tipo_planilla',$r['id_tipo_planilla']);
                $data->__set('movimiento',$r['id_movimiento']);
                $data->__set('fecha_reg',$r['fecha_reg']);
                $data->__set('status',$r['status']);
                $data->__set('cod_oficio',$r['cod_oficio']);
                $result[]=$data;
                unset($data);
            }
            return $result;
        }else{
            return false;
        }
    }

    public function agg_oficio(planilla $data){
        $sql="INSERT INTO planilla_empleado (id_empleado, id_tipo_planilla,id_movimiento,fecha_reg,
              fecha_ini, fecha_fin, id_usuario_registro, status,id_escuela) VALUES (?,?,?,?,?,?,?,?,?);";
        $query=$this->con->prepare($sql);
        $query->execute(array($data->__get('id_empleado'),
            $data->__get('tipo_planilla'),
            $data->__get('movimiento'),
            $data->__get('fecha_reg'),
            $data->__get('fecha_ini'),
            $data->__get('fecha_fin'),
            $data->__get('id_usuario_registro'),
            $data->__get('status'),
            $data->__get('escuela')));
        if($data->__get('movimiento')==1){
            $reg=$this->listar();
            foreach ($reg as $r){
                if($data->__get('fecha_reg')==$r->__get('fecha_reg') && $data->__get('id_usuario_registro')==$r->__get('id_usuario_registro')){
                    $sql2="UPDATE planilla_empleado SET id_dedicacion_propuesta=? WHERE id=?;";
                    $query2=$this->con->prepare($sql2);
                    $query2->execute(array($data->__get('dedicacion_pro'),
                        $r->__get('id')));
                    break;
                }
            }
        }
        unset($data);
        if($query==true){
            return true;
        }else{
            return false;
        }
    }

    public function consultar($id='',$fecha_reg=''){
        $sql = "SELECT * FROM planilla_empleado  ";
        if (isset($id) && !empty($id)) {
            $dato = $id;
            $sql .= " WHERE id=? ";
        } else {
            $dato = $fecha_reg;
            $sql .= " WHERE fecha_reg=? ";
        }
        $sql .= " LIMIT 1;";
        $query = $this->con->prepare($sql);
        $query->execute(array($dato));

        if ($query->rowCount() == 1) {
            $r = $query->fetch(PDO::FETCH_ASSOC);
            $dato = new planilla();
            $dato->__set('id', $r['id']);
            $dato->__set('id_empleado', $r['id_empleado']);
            $dato->__set('id_usuario_registro', $r['id_usuario_registro']);
            $dato->__set('tipo_planilla', $r['id_tipo_planilla']);
            $dato->__set('movimiento', $r['id_movimiento']);
            $dato->__set('fecha_reg', $r['fecha_reg']);
            $dato->__set('escuela', $r['id_escuela']);
            if(!empty($r['id_dedicacion_propuesta'])){
                $dato->__set('dedicacion_pro',$r['id_dedicacion_propuesta']);
            }
            $dato->__set('fecha_ini', $r['fecha_ini']);
            $dato->__set('fecha_fin', $r['fecha_fin']);
            $dato->__set('status', $r['status']);
            unset($r);
            return $dato;
        } else {
            return false;
        }
    }

    public function agg_planilla(planilla $data){
        $sql="INSERT INTO planilla_empleado (id_empleado, id_tipo_planilla,id_movimiento,fecha_reg,
              fecha_ini, fecha_fin, id_usuario_registro, status,id_escuela, motivo, cod_oficio) VALUES (?,?,?,?,?,?,?,?,?,?,?);";
        $query=$this->con->prepare($sql);
        $query->execute(array($data->__get('id_empleado'),
            $data->__get('tipo_planilla'),
            $data->__get('movimiento'),
            $data->__get('fecha_reg'),
            $data->__get('fecha_ini'),
            $data->__get('fecha_fin'),
            $data->__get('id_usuario_registro'),
            $data->__get('status'),
            $data->__get('escuela'),
            $data->__get('motivo'),
            $data->__get('cod_oficio')));
        if($data->__get('movimiento')==1){
            $reg=$this->listar();
            foreach ($reg as $r){
                if($data->__get('fecha_reg')==$r->__get('fecha_reg') && $data->__get('id_usuario_registro')==$r->__get('id_usuario_registro')){
                    $sql2="UPDATE planilla_empleado SET id_dedicacion_propuesta=? WHERE id=?;";
                    $query2=$this->con->prepare($sql2);
                    $query2->execute(array($data->__get('dedicacion_pro'),
                        $r->__get('id')));
                    break;
                }
            }
        }
        unset($data);
        if($query==true){
            return true;
        }else{
            return false;
        }
    }

    public function actualizar_planilla(planilla $data){
        if(isset($_REQUEST['x']) && $_REQUEST['x']==3){
            $sql="UPDATE planilla_empleado SET id_contable=?, id_programa=?, fecha_apro=?, status=? WHERE id=?";
            $query=$this->con->prepare($sql);
            $query->execute(array($data->__get('contable'),
                $data->__get('programa'),
                $data->__get('fecha_apro'),
                $data->__get('status'),
                $data->__get('id')));
            return $query;
        }else{

        }
    }
    
}
?>