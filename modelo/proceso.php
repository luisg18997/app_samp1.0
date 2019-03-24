<?php

require_once("conexion.php");
class proceso {
	private $id;
	private $ubicacion;
	private $fase;
    private $cod_pla;
    private $id_proceso;
    private $id_planilla;
    private $usuario;
	private $fecha;
	private $req_comp;
	private $observacion;
	private $status;
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

    public function cod_oficio(){
        date_default_timezone_set('America/Caracas');
        $code=date('dm').'-';
        $result=$this->listar_status(1);
        if($result!=false){
            $i=1;
            foreach ($result as $r){
                if(strncmp($r->__get('cod_pla'),$code,5)==0){
                    $codeu=explode('-',$r->__get('cod_pla'));
                    if($i==1){
                        $code1="01";
                    }
                    if($codeu[1]==$code1){
                        $i++;  
                        if($i>1 && $i<=9){
                            $code1="0{$i}";
                        }else{
                            $code1="{$i}";
                        }                 
                    }
                }else{
                    $i=1;
                    $code1="0{$i}";
                }   
            }
            $code.=$code1;
        }else{
            $code.='01';
        }
        return $code;
    }

    public function cod_mov($esc){ // por terminar
        date_default_timezone_set('America/Caracas');
        $code= '07'.$esc.'-';
        $result=$this->listar_status(2);
        if($result!=false){
            $i=1;
            foreach ($result as $r){
                if($i==1){
                    $code1="000{$i}";
                }
                $codeu=explode('-',$r->__get('cod_pla'));
                if($codeu[1]==$code1){
                    $i++;  
                    if($i>=1 && $i<=9){
                        $code1="000{$i}";
                    }elseif($i>=10 && $i<100){
                        $code1="00{$i}";
                    }elseif($i>=100 && $i<1000){
                        $code1="0{$i}";
                    }else{
                        $code1="{$i}";
                    }                 
                } 
            }
            $code.=$code1;
        }else{
            $code.='0001';
        }
        return $code;
    }

    public function agg_proceso(proceso $data){
        $sql="INSERT INTO proceso_planilla (id_ubicacion,id_fase, fecha,status)
              VALUES (?,?,?,?)";
        $query=$this->con->prepare($sql);
        $query->execute(array($data->__get('ubicacion'),
            $data->__get('fase'),
            $data->__get('fecha'),
            $data->__get('status')));
        $reg=$this->consultar_proceso(false, $data->__get('fecha'));
        $sql2='INSERT INTO status_planilla (cod_pla, id_planilla, id_proceso) VALUES (?,?,?)';
        $query2=$this->con->prepare($sql2);
        $query2->execute(array($data->__get('cod_pla'),
            $data->__get('id_planilla'),
            $reg->__get('id')));
        if($query== true && $query2==true){
            return true;
        }else{
            return false;
        }
    }

    public function consultar_proceso($id='',$fecha=''){
        $sql="SELECT p.* FROM proceso_planilla p INNER JOIN fase_planilla f 
              ON f.id=id_fase INNER JOIN ubicacion u ON id_ubicacion=u.id ";
        if(isset($id) && !empty($id)){
            $dato=$id;
            $sql.=" WHERE p.id=? AND p.status=true ";
        }else{
            $dato=$fecha;
            $sql.=" WHERE fecha=? AND p.status=true ";
        }
        $sql.=" LIMIT 1;";
        $query=$this->con->prepare($sql);
        $query->execute(array($dato));
        if($query->rowCount()==1) {
            $r = $query->fetch(PDO::FETCH_ASSOC);
            $dato= new proceso();
            $dato->__set('id',$r['id']);
            $dato->__set('ubicacion',$r['id_ubicacion']);
            $dato->__set('fase',$r['id_fase']);
            $dato->__set('fecha',$r['fecha']);
            $dato->__set('status',$r['status']);
            return $dato;
        }else{
            return false;
        }
    }


    public function actualizar(proceso $data){
        $sql="UPDATE proceso_planilla SET status=? WHERE id=?";
        $query=$this->con->prepare($sql);
        $query->execute(array($data->__get('status'),
            $data->__get('id_proceso')));
    }

    public function consultar_status($id='',$cod=''){
        foreach ($_SESSION['ubicacion'] as $r){
            if($r['nombre']==$_SESSION['activa']['ubicacion']){
                $ubicacion=$r['id'];
            }
        }
        if(empty($ubicacion)){
           $sql="SELECT pr.*, s.* FROM status_planilla s INNER JOIN proceso_planilla pr
        ON pr.id=s.id_proceso";
         if(isset($id) && !empty($id)){
            $dato=$id;
            $sql.=" WHERE s.id=? ";
        }else{
            $dato=$cod;
            $sql.=" WHERE s.cod_pla=? ";
        }
        }else{
            $sql="SELECT pr.*, s.* FROM status_planilla s INNER JOIN proceso_planilla pr
        ON pr.id=s.id_proceso  WHERE pr.status=true  AND pr.id_ubicacion={$ubicacion} AND";
        if(isset($id) && !empty($id)){
            $dato=$id;
            $sql.="  s.id=? ";
        }else{
            $dato=$cod;
            $sql.="  s.cod_pla=? ";
        }
        }
        $sql.=" LIMIT 1";
        $query=$this->con->prepare($sql);
        $query->execute(array($dato));
        if($query->rowCount()==1) {
            $r = $query->fetch(PDO::FETCH_ASSOC);
            $dato= new proceso();
            $dato->__set('id',$r['id']);
            $dato->__set('fase',$r['id_fase']);
            $dato->__set('id_proceso',$r['id_proceso']);
            $dato->__set('id_planilla',$r['id_planilla']);
            $dato->__set('cod_pla',$r['cod_pla']);
            $dato->__set('ubicacion', $r['id_ubicacion']);
            return $dato;
        }else{
            return false;
        }
    }

    public function listar_status($tipo=''){
        $sql="SELECT DISTINCT s.id, s.cod_pla, s.id_planilla, pr.*, pl.id_tipo_planilla FROM status_planilla s INNER JOIN planilla_empleado pl ON pl.id=s.id_planilla  INNER JOIN proceso_planilla pr ON pr.id=s.id_proceso WHERE pr.status=true  ";
        if(isset($tipo) && !empty($tipo)){
            $dato=$tipo;
            $sql.=" AND id_tipo_planilla=? ORDER BY s.id ASC";
            $query=$this->con->prepare($sql);
            $query->execute(array($dato));
        }else{
             $sql.="  ORDER BY s.id ASC";
            $query=$this->con->prepare($sql);
            $query->execute();
        }
        if($query->rowCount()!=0){
            $result= array();
            while ($r=$query->fetch(PDO::FETCH_ASSOC)) {
                $d= new proceso();
                $d->__set('id',$r['id']);
                $d->__set('id_planilla',$r['id_planilla']);
                $d->__set('id_proceso',$r['id']);
                $d->__set('fecha',$r['fecha']);
                $d->__set('ubicacion',$r['id_ubicacion']);
                $d->__set('fase',$r['id_fase']);
                $d->__set('status',$r['status']);
                $d->__set('cod_pla',trim($r['cod_pla']));
                $d->__set('tipo', $r['id_tipo_planilla']);
                $result[]=$d;
                $d->con=null;
                unset($d);
            }
            return $result;
        }else{
            return false;
        }
    }
}

?>