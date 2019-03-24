<?php

require_once("conexion.php");
class datos{
	private $sueldo;
	private $escuela;
	private $catedra;
	private $departamento;
	private $rol;
	private $ingreso;
    private $ced;
	private $tipo_ingreso;
	private $movimiento;
	private $dedicacion;
	private $pregunta;
	private $ubicacion;
	private $unidad_ejecutora;
	private $anexo;
	private $contable;
	private $programa;
	private $categoria;
	private $idac;
	private $estado;
	private $municipio;
	private $parroquia;
	private $usuario;
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

    public function obtener(datos $data){ // extraer datos de las tablas de ubicacion, rol, pregunta_seguridad
        $sql="SELECT * FROM ubicacion ORDER BY id ASC"; // extrae toda la informacion de la tabla de ubicacion
        $query=$this->con->prepare($sql);
        $query->execute();
        while ($fila=$query->fetch(PDO::FETCH_ASSOC)){
            $result[]=$fila;
        }
        $data->__set('ubicacion',$result);
        $sql2="SELECT id, nombre, status FROM rol ORDER BY id ASC"; // extrae toda la informacion de la tabla de rol
        $query2=$this->con->prepare($sql2);
        $query2->execute();
        while ($fila2=$query2->fetch(PDO::FETCH_ASSOC)){
            $result2[]=$fila2;
        }
        $data->__set('rol',$result2);
        $sql3="SELECT id, pregunta, status FROM pregunta_seguridad
              ORDER BY id ASC"; // extrae toda la informacion de la tabla de pregunta_seguridad
        $query3=$this->con->prepare($sql3);
        $query3->execute();
        while ($fila3=$query3->fetch(PDO::FETCH_ASSOC)){
            $result3[]=$fila3;
        }
        $data->__set('pregunta',$result3);
        $sql4="SELECT * FROM escuela ORDER BY id ASC"; // extrae toda la informacion de la tabla de escuela
        $query4=$this->con->prepare($sql4);
        $query4->execute();
        while ($fila4=$query4->fetch(PDO::FETCH_ASSOC)){
            $result4[]=$fila4;
        }
        $data->__set('escuela',$result4);
        $sql5="SELECT * FROM departamento ORDER BY id ASC"; // extrae toda la informacion de la tabla de departamento
        $query5=$this->con->prepare($sql5);
        $query5->execute();
        while ($fila5=$query5->fetch(PDO::FETCH_ASSOC)){
            $result5[]=$fila5;
        }
        $data->__set('departamento',$result5);
        $sql6="SELECT * FROM catedra ORDER BY id ASC"; // extrae toda la informacion de la tabla de catedra
        $query6=$this->con->prepare($sql6);
        $query6->execute();
        while ($fila6=$query6->fetch(PDO::FETCH_ASSOC)){
            $result6[]=$fila6;
        }
        $data->__set('catedra',$result6);
        $sql7="SELECT * FROM estado ORDER BY id ASC"; // extrae toda la informacion de la tabla de estado
        $query7=$this->con->prepare($sql7);
        $query7->execute();
        while ($fila7=$query7->fetch(PDO::FETCH_ASSOC)){
            $result7[]=$fila7;
        }
        $data->__set('estado',$result7);
        $sql8="SELECT * FROM municipio"; // extrae toda la informacion de la tabla de municipio
        $query8=$this->con->prepare($sql8);
        $query8->execute();
        while ($fila8=$query8->fetch(PDO::FETCH_ASSOC)){
            $result8[]=$fila8;
        }
        $data->__set('municipio',$result8);
        $sql9="SELECT * FROM parroquia ORDER BY id ASC"; // extrae toda la informacion de la tabla de parroquia
        $query9=$this->con->prepare($sql9);
        $query9->execute();
        while ($fila9=$query9->fetch(PDO::FETCH_ASSOC)){
            $result9[]=$fila9;
        }
        $data->__set('parroquia',$result9);
        $sql10="SELECT * FROM tipo_dedicacion ORDER BY id ASC"; // extrae toda la informacion de la tabla de dedicacion
        $query10=$this->con->prepare($sql10);
        $query10->execute();
        while ($fila10=$query10->fetch(PDO::FETCH_ASSOC)){
            $result10[]=$fila10;
        }
        $data->__set('dedicacion',$result10);
        $sql11="SELECT * FROM tipo_categoria ORDER BY id ASC"; // extrae toda la informacion de la tabla de categoria
        $query11=$this->con->prepare($sql11);
        $query11->execute();
        while ($fila11=$query11->fetch(PDO::FETCH_ASSOC)){
            $result11[]=$fila11;
        }
        $data->__set('categoria',$result11);
        $sql12="SELECT * FROM tipo_movimiento ORDER BY id ASC"; // extrae toda la informacion de la tabla de movimiento
        $query12=$this->con->prepare($sql12);
        $query12->execute();
        while ($fila12=$query12->fetch(PDO::FETCH_ASSOC)){
            $result12[]=$fila12;
        }
        $data->__set('movimiento',$result12);
        $sql13="SELECT * FROM tipo_ingreso ORDER BY id ASC"; // extrae toda la informacion de la tabla de tipo de ingreso
        $query13=$this->con->prepare($sql13);
        $query13->execute();
        while ($fila13=$query13->fetch(PDO::FETCH_ASSOC)){
            $result13[]=$fila13;
        }
        $data->__set('tipo_ingreso',$result13);
        $sql14="SELECT * FROM unidad_ejecutora ORDER BY id ASC"; // extrae toda la informacion de la tabla de unidad ejecutora
        $query14=$this->con->prepare($sql14);
        $query14->execute();
        while ($fila14=$query14->fetch(PDO::FETCH_ASSOC)){
            $result14[]=$fila14;
        }
        $data->__set('unidad_ejecutora',$result14);
        $sql15="SELECT * FROM ingreso ORDER BY id ASC"; // extrae toda la informacion de la tabla de ingreso
        $query15=$this->con->prepare($sql15);
        $query15->execute();
        while ($fila15=$query15->fetch(PDO::FETCH_ASSOC)){
            $result15[]=$fila15;
        }
        $data->__set('ingreso',$result15);
        $sql16="SELECT * FROM sueldo ORDER BY id ASC"; // extrae toda la informacion de la tabla de sueldo
        $query16=$this->con->prepare($sql16);
        $query16->execute();
        while ($fila16=$query16->fetch(PDO::FETCH_ASSOC)){
            $result16[]=$fila16;
        }
        $data->__set('sueldo',$result16);
        $sql17="SELECT * FROM idac_status ORDER BY id ASC"; // extrae toda la informacion de la tabla de idac
        $query17=$this->con->prepare($sql17);
        $query17->execute();
        while ($fila17=$query17->fetch(PDO::FETCH_ASSOC)){
            $result17[]=$fila17;
        }
        $data->__set('idac',$result17);
        $sql18="SELECT email,fecha_elim FROM usuario ORDER BY id ASC"; // extrae toda la informacion de la tabla de usuario
        $query18=$this->con->prepare($sql18);
        $query18->execute();
        while ($fila18=$query18->fetch(PDO::FETCH_ASSOC)){
            $result18[]=$fila18;
        }
        $data->__set('usuario',$result18);
        $sql19="SELECT * FROM tipo_anexo ORDER BY id ASC"; // extrae toda la informacion de la tabla de anexo
        $query19=$this->con->prepare($sql19);
        $query19->execute();
        while ($fila19=$query19->fetch(PDO::FETCH_ASSOC)){
            $result19[]=$fila19;
        }
        $data->__set('anexo',$result19);
        $sql20="SELECT * FROM tipo_contable ORDER BY id ASC";
        $query20=$this->con->prepare($sql20);
        $query20->execute();
        while ($fila20=$query20->fetch(PDO::FETCH_ASSOC)){
            $result20[]=$fila20;
        }
        $data->__set('contable',$result20);
        $sql21="SELECT * FROM tipo_programa ORDER BY id ASC";
        $query21=$this->con->prepare($sql21);
        $query21->execute();
        while ($fila21=$query21->fetch(PDO::FETCH_ASSOC)){
            $result21[]=$fila21;
        }
        $data->__set('programa',$result21);
        $sql22="SELECT nacionalidad, cedula FROM empleado ORDER BY id ASC";
        $query22=$this->con->prepare($sql22);
        $query22->execute();
        while ($fila22=$query22->fetch(PDO::FETCH_ASSOC)){
            $ced[]=$fila22;
        }
        if(isset($ced)){
            $data->__set('ced',$ced);
        }

        $this->con=null;
        return $data; //guardar todos los datos extraido de la base de datos
    }
}
?>