<?php
require_once ('modelo/empleado.php');
require_once('idaccontroller.php');
class empleadocontroller{
    private $model;
    private $idac;

    public function __construc(){
        $this->model = new empleado();
        $this->idac= new idaccontroller();
    }

    public function guardar(){
        $registro = new empleado();
        if(empty($_REQUEST['id_empleado'])){
            $registro->__set('fecha_ing',$_SESSION['fecha']);
            $registro->__set('status', 0);
            $registro->__set('genero', trim($_REQUEST['genero']));
            $registro->__set('fecha_nac', trim($_REQUEST['fechanac']));
            $registro->__set('telf_movil', trim($_REQUEST['telf_movil']));
            $registro->__set('telf_local', trim($_REQUEST['telf_local']));
            $registro->__set('email', trim($_REQUEST['email']));
        }else{
            $registro->__set('id',$_REQUEST['id_empleado']);
        }
        if(isset($_REQUEST['x']) && $_REQUEST['x']==3){
            if($_REQUEST['movimiento']==1 || $_REQUEST['movimiento']==18){
                $registro->__set('status',1);
            }elseif($_REQUEST['movimiento']<13 && $_REQUEST['movimiento']>=19){
                $registro->__set('fecha_act',$_SESSION['fecha']);
            }else{
                $registro->__set('fecha_ret',$_SESSION['fecha']);
                $registro->__set('status',0);
                $idac= new idaccontroller();
                $idac->actualizar($_REQUEST['idac'],1,$_SESSION['fecha']);
            }
            $emple= $registro->actualizar($registro);
            return $emple;
        }else{
        $registro->__set('nombre_1', trim($_REQUEST['nombre1']));
        $registro->__set('nombre_2', trim($_REQUEST['nombre2']));
        $registro->__set('apellido_1', trim($_REQUEST['apellido1']));
        $registro->__set('apellido_2', trim($_REQUEST['apellido2']));
        $registro->__set('cedula', trim($_REQUEST['cedula']));
        if(isset($_REQUEST['x']) && $_REQUEST['x']==2){
            $registro->__set('estado',$_REQUEST['estado']);
            $registro->__set('municipio',$_REQUEST['municipio']);
            $registro->__set('parroquia',$_REQUEST['parroquia']);
            $registro->__set('ingreso',$_REQUEST['ingreso']);
            $registro->__set('tipo_ingreso',$_REQUEST['tipoingreso']);
            $registro->__set('dedicacion', $_REQUEST['dedicacion']);
            $registro->__set('categoria',$_REQUEST['categoria']);
            $registro->__set('sueldo',$_REQUEST['sueldo']);
            $ubicacion=$_REQUEST['direccion1'].','.$_REQUEST['1direccion'];
            $registro->__set('ubicacion',$ubicacion);
            $direccion=$_REQUEST['direccion2'].','.$_REQUEST['2direccion'];
            $registro->__set('direccion',$direccion);
            $tipo_viv=$_REQUEST['direccion3']. ','.$_REQUEST['3direccion'];
            $registro->__set('tipo_viv',$tipo_viv);
            $id_viv=$_REQUEST['direccion4']. ','.$_REQUEST['4direccion'];
            $registro->__set('id_viv',$id_viv);
            if(isset($_REQUEST['apartamento'])){
                $registro->__set('apartamento',$_REQUEST['apartamento']);
            }
            $registro->__set('sueldo',$_REQUEST['sueldo']);
        }else{
            $registro->__set('nacionalidad', trim($_REQUEST['nacionalidad']));
        }
        $registro->__set('departamento', trim($_REQUEST['departamento']));
        $registro->__set('catedra', trim($_REQUEST['catedra']));
        $registro->__set('idac', trim($_REQUEST['idac']));
        $registro->__set('unidad_ejec', $_REQUEST['uni_ejec']);
        $idac= new idaccontroller();
        $idac->actualizar($registro->__get('idac'),0,null);
        $registro->__set('escuela', $_SESSION['activa']['escuela']);
    }
        if(empty($registro->__get('id'))){
            $emple = $registro->registrar($registro);
            if ($emple == true) {
                $result = $registro->consultar(false,false, $registro->__get('idac'));
                return $result->__get('id');
            } else {
                return false;
            }
        }else{
            $emple= $registro->actualizar($registro);
            if($emple==true){
               return $registro->__get('id'); 
            }
            
        }
        
    }
}
?>