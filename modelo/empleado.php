<?php

require_once("conexion.php");
class empleado{
	private $id;
	private $idac;
	private $nacionalidad;
	private $cedula;
	private $nombre_1;
	private $nombre_2;
	private $apellido_1;
	private $apellido_2;
	private $fecha_nac;
	private $genero;
	private $estado;
	private $municipio;
	private $parroquia;
	private $ubicacion;
	private $direccion;
	private $tipo_viv;
	private $id_viv;
    private $categoria;
    private $dedicacion;
    private $apartamento;
	private $telf_movil;
	private $telf_local;
	private $email;
    private $hist_sueldo;
	private $sueldo;
	private $escuela;
	private $departamento;
	private $catedra;
	private $ingreso;
	private $tipo_ingreso;
	private $fecha_ing;
	private $unidad_ejec;
	private $fecha_act;
	private $fecha_ret;
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

    public function registrar(empleado $data){
        $sql="INSERT INTO empleado (id_idac, nacionalidad, cedula, nombre_1, nombre_2, 
              apellido_1, apellido_2,fecha_nac, genero, tlf_movil, tlf_local, email,
              id_escuela, id_departamento, id_catedra, fecha_ing, id_unidad_ejec,status)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $query=$this->con->prepare($sql);
        $query->execute(array($data->__get('idac'),
            $data->__get('nacionalidad'),
            $data->__get('cedula'),
            $data->__get('nombre_1'),
            $data->__get('nombre_2'),
            $data->__get('apellido_1'),
            $data->__get('apellido_2'),
            $data->__get('fecha_nac'),
            $data->__get('genero'),
            $data->__get('telf_movil'),
            $data->__get('telf_local'),
            $data->__get('email'),
            $data->__get('escuela'),
            $data->__get('departamento'),
            $data->__get('catedra'),
            $data->__get('fecha_ing'),
            $data->__get('unidad_ejec'),
            $data->__get('status')));
        unset($data);
        if($query==true){
            return true;
        }else{
            return false;
        }
    }

    public function actualizar(empleado $data){
        if($_REQUEST['x']==2){
            $sql='UPDATE empleado SET id_estado=?, id_municipio=?, id_parroquia=?, direccion=?, ubicacion=?, tipo_viv=?, id_viv=?, apartamento=? , id_ingreso=?, id_tipo_ingreso=? WHERE id=?';
            $query=$this->con->prepare($sql);
            $query->execute(array($data->__get('estado'),
                $data->__get('municipio'),
                $data->__get('parroquia'),
                $data->__get('direccion'),
                $data->__get('ubicacion'),
                $data->__get('tipo_viv'),
                $data->__get('id_viv'),
                $data->__get('apartamento'),
                $data->__get('ingreso'),
                $data->__get('tipo_ingreso'),
                $data->__get('id')));
            $result=$this->consultar(1, $data->__get('id'), false);
            if($result!=false){
                foreach ($_SESSION['sueldo'] as $k) {
                        if($k['sueldo']==$result->__get('sueldo')){
                            $result->__set('sueldo',$k['id']);
                        }
                    }
                if(!empty($result->__get('sueldo')) && $result->__get('sueldo')!=$data->__get('sueldo')){
                   $result->__set('status',0);
                    $result->__set('fecha_act', null);
                    $this->sueldo($result, 1);
                    unset($result);
                }
            }else{
                if(empty($data->__get('fecha_act'))){
                    $data->__set('fecha_act',$_SESSION['fecha']);
                }
                $this->sueldo($data,false);
            }
            unset($data);
            if($query == true){
                return true;
            }else{
                return false;
            }
        } 
    }

    public function consultar($x='', $id='', $idac='',$nac='',$ced=''){
        if(isset($x) && $x==1){
            $sql="SELECT e.*, hs.id as historial, s.id_categoria as categoria, s.id_dedicacion as dedicacion, s.sueldo as sueldo FROM empleado e, sueldo s INNER JOIN historial_sueldo hs ON hs.id_sueldo=s.id WHERE e.id=hs.id_emp AND  ";
            if(isset($id) && !empty($id)){
                $dato=$id;
                $sql.=" e.id=? ";
            }else{
                $dato=$idac;
                $sql.=" e.id_idac=? ";
            }
            $sql.=" AND hs.id IN (SELECT id FROM Historial_sueldo WHERE status=true) LIMIT 1;";
        }else{
            $sql="SELECT * from empleado ";
            if(isset($id) && !empty($id)){
                $dato=$id;
                $sql.=" WHERE id=? ";
            }elseif(isset($idac) && !empty($idac)){
                $dato=$idac;
                $sql.=" WHERE id_idac=? ";
            }else{
                $dato=$ced;
                $sql.=" WHERE nacionalidad ='{$nac}' AND cedula=? ";
            }
            $sql.=" LIMIT 1;";
            }
        $query=$this->con->prepare($sql);
        $query->execute(array($dato));
        if($query->rowCount()==1){
            $r=$query->fetch(PDO::FETCH_ASSOC);
            $datos= new empleado();
            $datos->__set('id',$r['id']);
            $datos->__set('idac',$r['id_idac']);
            $datos->__set('nacionalidad',trim($r['nacionalidad']));
            $datos->__set('cedula',$r['cedula']);
            $datos->__set('nombre_1',trim($r['nombre_1']));
            $datos->__set('nombre_2',trim($r['nombre_2']));
            $datos->__set('apellido_1',trim($r['apellido_1']));
            $datos->__set('apellido_2',trim($r['apellido_2']));
            $datos->__set('fecha_nac',trim($r['fecha_nac']));
            $datos->__set('genero',trim($r['genero']));
            $datos->__set('telf_movil',trim($r['tlf_movil']));
            $datos->__set('telf_local',trim($r['tlf_local']));
            $datos->__set('email',trim($r['email']));
            $datos->__set('escuela',$r['id_escuela']);
            $datos->__set('departamento',$r['id_departamento']);
            $datos->__set('catedra',$r['id_catedra']);
            $datos->__set('fecha_ing',trim($r['fecha_ing']));
            $datos->__set('unidad_ejec',$r['id_unidad_ejec']);
            $datos->__set('direccion',trim($r['direccion']));
            $datos->__set('ubicacion',trim($r['ubicacion']));
            $datos->__set('tipo_viv',trim($r['tipo_viv']));
            $datos->__set('id_viv',trim($r['id_viv']));
            $datos->__set('apartamento',trim($r['apartamento']));
            $datos->__set('estado',$r['id_estado']);
            $datos->__set('municipio',$r['id_municipio']);
            $datos->__set('parroquia',$r['id_parroquia']);
            $datos->__set('ingreso',$r['id_ingreso']);
            $datos->__set('tipo_ingreso',$r['id_tipo_ingreso']);
            if($x==1){
                $datos->__set('sueldo',$r['sueldo']);
                $datos->__set('dedicacion',$r['dedicacion']);
                $datos->__set('categoria',$r['categoria']);
                $datos->__set('hist_sueldo',$r['historial']);
            }
            return $datos;
        }else{
            return false;
        }
    }

    public function sueldo(empleado $data,$x=''){
        if($x==1){
            $sql="UPDATE historial_sueldo SET fecha_act=?, status=? WHERE id=?";
            $query=$this->con->prepare($sql);
            $query->execute(array($data->__get('fecha_act'),
                $data->__get('status'),
                $data->__get('id')));
        }
        $sql="INSERT INTO historial_sueldo (id_emp, id_sueldo,fecha_act, status) VALUES (?,?,?,?);";
            $query=$this->con->prepare($sql);
            $query->execute(array($data->__get('id'),
                $data->__get('sueldo'),
                $data->__get('fecha_act'),
                1));

    }
}

?>