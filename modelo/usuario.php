<?php
require_once ("conexion.php");
//clase usuario tiene conexion con tabla usuario, rol_usuario, respuesta_seguridad, acciones_usuario
class usuario{
    private $id;
    private $email;
    private $nombre;
    private $apellido;
    private $clave;
    private $ubicacion;
    private $pregunta;
    private $respuesta;
    private $rol;
    private $permiso;
    private $fecha_crea;
    private $fecha_act;
    private $fecha_elim;
    private $status;
    private $escuela;
    private $con;

    public function __construct(){
        $this->con= conexion::conectar();
    }

    public function __set($name, $value){//funcion para sobreescribir los datos
        return $this->$name =$value;
    }

    public function __get($name){  //funcion para capturar los datos
        return $this->$name;
    }

    public function autenticar($email, $clave){ //funcion para validar usuario al acceder al sistema
        $result=$this->consultar($email=$email); // extrae la informacion del usuario logueado
        if($result!= false){ //comprobar que el usuario existe
            $emailcon=trim($result->__get('email'));
            if($emailcon== $email){
                if(empty($result->rol) && $result->status==false){
                    $rs=3;
                }elseif ($result->status==false && !empty($result->rol) && empty($result->fecha_elim)){
                    $rs=4;
                }elseif (!empty($result->fecha_elim)){
                    $rs=5;
                }elseif ($result->conpassword($result->clave,$clave)){
                    return $result;
                }else{
                    $rs=2;
                }
            }
        }else{
            $rs=1;
        }
        return $rs;
    }

    public function listar(){ //funcion para listar usuarios registrado en el sistema
        $result= array();
        $sql="SELECT DISTINCT u.*, r.id_rol FROM usuario u INNER JOIN rol_usuario r 
              ON r.id_usuario= u.id ORDER BY u.id ASC; ";
        $query=$this->con->prepare($sql);
        $query->execute();
        while ($r=$query->fetch(PDO::FETCH_ASSOC)){
            $data = new usuario();
            $data->__set('id',$r['id']);
            $data->__set('email',trim($r['email']));
            $data->__set('nombre',trim($r['nombre']));
            $data->__set('apellido',trim($r['apellido']));
            $data->__set('rol',$r['id_rol']);
            if(isset($r['id_escuela'])){
                $data->__set('escuela',$r['id_escuela']);
            }else{
                $data->__set('ubicacion',$r['id_ubicacion']);
            }
            $data->__set('status',$r['status']);
            $data->__set('fecha_elim',$r['fecha_elim']);
            $result[]=$data;
            unset($data);
        }
        return $result;
    }
    
    //funcion para registrar usuario en el sistema
    public function agg(usuario $data){
        $sql="INSERT INTO usuario (email, nombre, apellido, id_ubicacion, clave, status, fecha_crea, id_escuela)
            VALUES  (?,?,?,?,?,?,?,?)"; // guardado de usuario
        $query=$this->con->prepare($sql);
        $query->execute(array($data->__get('email'),
            $data->__get('nombre'),
            $data->__get('apellido'),
            $data->__get('ubicacion'),
            $data->__get('clave'),
            $data->__get('status'),
            $data->__get('fecha_crea'),
            $data->__get('escuela')));
        $dato=$data->consultar($email=$data->__get('email')); //consulta el usuario guardado actualmente por el correo
        $data->__set('id',$dato->__get('id')); // extrae el id de usuario actualmente guardado
        if($_REQUEST['x']==1){ //si el usuario se creo el mismo
            $sql2 ="INSERT INTO rol_usuario (id_usuario,status) VALUES (?,?)"; // guardado de rol de usuario ccreado por el mismo
            $query2 = $this->con->prepare($sql2);
            $query2->execute(array($data->__get('id'),
                $data->__get('status')));
        }elseif($_REQUEST['x']==2){ // si el usuario es creado por el administrador
            $sql2 ="INSERT INTO rol_usuario (id_usuario,id_rol,status) VALUES (?,?,?)"; // guardado de rol de usuario ccreado por el administrador
            $query2 = $this->con->prepare($sql2);
            $query2->execute(array($data->__get('id'),
                $data->__get('rol'),
                $data->__get('status')));
        }
        $sql3 ="INSERT INTO respuesta_seguridad (id_usuario) VALUES (?)"; // guardado de respuesta de seguridad
        $query3 = $this->con->prepare($sql3);
        $query3->execute(array($data->__get('id')));
        if ($query==true && $query2==true && $query3==true){ // si se guardaron correctamente en las tres tabla
            $resultado=true;
        }else{
            $resultado=false;
        }
        return  $resultado;
    }

    //funcion para realizar consulta de la tabla de usuario
    public function consultar($email='', $id=''){
        if($_REQUEST['a']=='guardar'){ // si la consulta se realizo en 
            $sql= "SELECT * FROM usuario ";
        }else{
            $sql = "SELECT u.*, ro.id_rol, pr.id_pregunta, pr.fecha_act, respuesta FROM usuario u
                    INNER JOIN rol_usuario ro ON u.id= ro.id_usuario
            INNER JOIN respuesta_seguridad pr ON u.id= pr.id_usuario";
        }
        if (isset($email) && !empty($email)){
            $sql.=" WHERE email=? ";
            $dato=$email;
        }else{
            $sql.=" WHERE u.id=? ";
            $dato=$id;
        }
        $sql.=" LIMIT 1;";
        $query=$this->con->prepare($sql);
        $query->execute(array($dato));
        $data= new usuario();
        if ($query->rowCount()==1){
            $datos=$query->fetch(PDO::FETCH_ASSOC);
            $data->__set('id',$datos['id']);
            $data->__set('email',trim($datos['email']));
            $data->__set('nombre',trim($datos['nombre']));
            $data->__set('apellido',trim($datos['apellido']));
            $data->__set('clave',trim($datos['clave']));
            $data->__set('ubicacion',$datos['id_ubicacion']);
            $data->__set('fecha_crea',$datos['fecha_crea']);
            $data->__set('fecha_elim',$datos['fecha_elim']);
            $data->__set('status',$datos['status']);
            $data->__set('escuela',$datos['id_escuela']);
            if ($_REQUEST['a']!='guardar'){
                $data->__set('rol',$datos['id_rol']);
                $data->__set('pregunta',$datos['id_pregunta']);
                $data->__set('respuesta',trim($datos['respuesta']));
                $data->__set('fecha_act',$datos['fecha_act']);
            }
            return $data;
        }else{
            return false;
        }
    }

    public function actualizar(usuario $data){
        if (isset($_REQUEST['x']) && $_REQUEST['x']==1){
            $sql="UPDATE respuesta_seguridad SET id_pregunta=?, fecha_act=?,
              respuesta=? WHERE id_usuario=?";
            $query=$this->con->prepare($sql);
            $query->execute(array($data->__get('pregunta'),
                $data->__get('fecha_act'),
                $data->__get('respuesta'),
                $data->__get('id')));
        }else{
            $sql="UPDATE usuario SET email=?, nombre=?, apellido=?, id_ubicacion=?,
                  status=?, id_escuela=? WHERE id=?";
            $query=$this->con->prepare($sql);
            $query->execute(array($data->__get('email'),
                $data->__get('nombre'),
                $data->__get('apellido'),
                $data->__get('ubicacion'),
                $data->__get('status'),
                $data->__get('escuela'),
                $data->__get('id')));
            $sql2="UPDATE rol_usuario SET  id_rol=?, status=?
                   WHERE id_usuario=?";
            $query2=$this->con->prepare($sql2);
            $query2->execute(array($data->__get('rol'),
                $data->__get('status'),
                $data->__get('id')));
        }
        if(!empty($data->__get('clave'))){
            $sql3="UPDATE usuario SET clave=?
              WHERE id=?";
            $query3=$this->con->prepare($sql3);
            $query3->execute(array($data->__get('clave'),
                $data->__get('id')));
        }
        if($query==true || (isset($query2) && $query2== true) || (isset($query3) && $query3== true)){
            $resultado= true;
        }else{
            $resultado= false;
        }

        return $resultado;
    }

    public function eliminar(usuario $data){
        $sql="UPDATE usuario SET fecha_elim=?, status=?
               WHERE id=?";
        $query=$this->con->prepare($sql);
        $query->execute(array(
            $data->__get('fecha_elim'),
            $data->__get('status'),
            $data->__get('id')));
        $sql2="UPDATE rol_usuario SET status=? WHERE id_usuario=?";
        $query2=$this->con->prepare($sql2);
        $query2->execute(array($data->__get('status'),
            $data->__get('id')));
        if($query== true || $query2== true){
            $resultado= true;
        }else{
            $resultado= false;
        }
        return $resultado;
    }

    public function registrar_accion(usuario $data){

    }

    public function password($clave){ //convierte clave encriptada
        return password_hash(trim($clave), PASSWORD_BCRYPT);
    }

    public function conpassword($conclave, $clave){ //confirmar clave encriptada
        return password_verify(trim($clave),trim($conclave));
    }

    public function ubicacion($rol){ //define la ubicacion del usuario
        switch ($rol){
            case 2:{ // si el rol es escuela
                $ubicacion= 1;
                break;
            }
            case ($rol>=3 && $rol<=4):{ //rol de departamento de RRHH o Cordinador del area
                $ubicacion= 2;
                break;
            }
            case ($rol>=5 && $rol<=6):{ //rol de departamento de Presupuesto o Cordinador del area
                $ubicacion= 3;
                break;
            }
            default:{
                $ubicacion= 4; //rol de administrador
                break;
            }
        }
        return $ubicacion;
    }
}

?>