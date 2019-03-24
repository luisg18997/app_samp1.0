<?php
require_once ("modelo/datos.php");
class datoscontroller{
    private $model;

    public function __construct(){
        $this->model=new datos();
            $this->datos();
            if(!isset($_SESSION['pdf'])){
                $this->script();
            }else{
                unset($_SESSION['pdf']);
            }
            
    }
    public function script(){ // guardar los email en javascript
        $i=0; ?>
        <script type='application/javascript'>
            var email=new Array(); var fecha_elim= new Array();
            var municipios= new Array(); var idmunicipio = new Array(); var idestmunicipios = new Array();
            var parroquias = new Array(); var idparroquias = new Array(); var idmunparroquias = new Array();
            var idcategoria = new Array(); var categorias = new Array();
            var iddedicacion = new Array(); var dedicacion = new Array();
            var idsueldo = new Array(); var idcatsueldo = new Array(); var iddedsueldo = new Array(); var sueldo = new Array();
            var idescuela = new Array(); var escuelas= new Array(); var codesc= new Array();
            var iddepartamento= new Array(); var departamentos = new Array(); var codigodep = new Array();var idescdepartamento = new Array();
            var idcatedra= new Array(); var catedras = new Array(); var codigocat = new Array(); var iddepcatedra = new Array();
            var idejec = new Array(); var ejecutora = new Array(); var codigoejec = new Array();
            var idmovimiento = new Array(); var movimiento = new Array();
            var idanexo = new Array(); var idmovanexo = new Array(); var anexo= new Array();
            var cedula = new Array(); var nac= new Array();
            <?php 
            foreach ($_SESSION['parroquia'] as $r){ ?>
            parroquias[<?=$i?>]= '<?=trim($r['descripcion'])?>';
            idparroquias[<?=$i?>]= '<?=trim($r['id'])?>';
            idmunparroquias[<?=$i?>]= '<?=trim($r['id_municipio'])?>';
            <?php $i++; } $i=0;
            foreach ($_SESSION['categoria'] as $r){ ?>
            idcategoria[<?=$i?>]= '<?=trim($r['id'])?>';
            categorias[<?=$i?>]= '<?=trim($r['descripcion'])?>';
            <?php $i++; } $i=0;
            foreach ($_SESSION['dedicacion'] as $r){ ?>
            iddedicacion[<?=$i?>]= '<?=trim($r['id'])?>';
            dedicacion[<?=$i?>]= '<?=trim($r['descripcion'])?>';
            <?php $i++; } $i=0;
            foreach ($_SESSION['sueldo'] as $r){ ?>
            idsueldo[<?=$i?>]= '<?=trim($r['id'])?>';
            idcatsueldo[<?=$i?>] = '<?=trim($r['id_categoria'])?>';
            iddedsueldo[<?=$i?>] = '<?=trim($r['id_dedicacion'])?>';
            sueldo[<?=$i?>] = '<?=trim($r['sueldo'])?>';
            <?php $i++; } $i=0;
            foreach ($_SESSION['escuela'] as $r){ ?>
            idescuela[<?=$i?>]='<?=trim($r['id'])?>';
            escuelas[<?=$i?>]= '<?=trim($r['nombre'])?>';
            codesc[<?=$i?>]= '<?=trim($r['codigo'])?>';
            <?php $i++; } $i=0;
            foreach ($_SESSION['departamento'] as $r){ ?>
            iddepartamento[<?=$i?>]= '<?=trim($r['id'])?>';
            departamentos[<?=$i?>]= '<?=trim($r['nombre'])?>';
            codigodep[<?=$i?>]= '<?=trim($r['codigo'])?>';
            idescdepartamento[<?=$i?>]= '<?=trim($r['id_escuela'])?>';
            <?php $i++; } $i=0;
            foreach ($_SESSION['catedra'] as $r){ ?>
            idcatedra[<?=$i?>]= '<?=trim($r['id'])?>';
            catedras[<?=$i?>]= '<?=trim($r['nombre'])?>';
            codigocat[<?=$i?>]= '<?=trim($r['codigo'])?>';
            iddepcatedra[<?=$i?>]= '<?=trim($r['id_departamento'])?>';
            <?php $i++; } $i=0;
            foreach ($_SESSION['unidad_ejecutora'] as $r){ ?>
            idejec[<?=$i?>]= '<?=trim($r['id'])?>';
            ejecutora[<?=$i?>]= '<?=trim($r['descripcion'])?>';
            codigoejec[<?=$i?>]= '<?=trim($r['codigo'])?>';
            <?php $i++; } $i=0;
            foreach ($_SESSION['movimiento'] as $r){ ?>
            idmovimiento[<?=$i?>]= '<?=trim($r['id'])?>';
            movimiento[<?=$i?>]= '<?=trim($r['descripcion'])?>';
            <?php $i++; } $i=0;
            foreach ($_SESSION['usuario'] as $r){ ?>
            email[<?=$i?>]= '<?=trim($r['email'])?>';
            fecha_elim[<?=$i?>]= '<?=trim($r['fecha_elim'])?>';
            <?php $i++;} $i=0;
            foreach ($_SESSION['municipio'] as $r){ ?>
            municipios[<?=$i?>]= '<?=trim($r['descripcion'])?>';
            idmunicipio[<?=$i?>]= '<?=trim($r['id'])?>';
            idestmunicipios[<?=$i?>]= '<?=trim($r['id_estado'])?>';
            <?php $i++; } $i=0;
            if(isset($_SESSION['ced'])){
            foreach ($_SESSION['ced'] as $r){ ?>
            nac[<?=$i?>]= '<?=trim($r['nacionalidad'])?>';
            cedula[<?=$i?>]= '<?=trim($r['cedula'])?>';
            <?php $i++; } $i=0; }?>
        </script> <?php
    }

    public function datos(){
        $datos=$this->model->obtener($this->model);
        $_SESSION["ubicacion"]=$datos->__get("ubicacion");
        $_SESSION["rol"]=$datos->__get('rol');
        $_SESSION["pregunta"]=$datos->__get('pregunta');
        $_SESSION['escuela']=$datos->__get('escuela');
        $_SESSION["departamento"]=$datos->__get('departamento');
        $_SESSION["catedra"]=$datos->__get('catedra');
        $_SESSION['estado']=$datos->__get('estado');
        $_SESSION['municipio']=$datos->__get('municipio');
        $_SESSION['parroquia']=$datos->__get('parroquia');
        $_SESSION['dedicacion']=$datos->__get('dedicacion');
        $_SESSION['categoria']=$datos->__get('categoria');
        $_SESSION['movimiento']=$datos->__get('movimiento');
        $_SESSION['tipo_ingreso']=$datos->__get('tipo_ingreso');
        $_SESSION['ingreso']=$datos->__get('ingreso');
        $_SESSION['unidad_ejecutora']=$datos->__get('unidad_ejecutora');
        $_SESSION['sueldo']=$datos->__get('sueldo');
        $_SESSION['idac']=$datos->__get('idac');
        $_SESSION['usuario']=$datos->__get('usuario');
        $_SESSION['anexo']=$datos->__get('anexo');
        $_SESSION['programa']=$datos->__get('programa');
        $_SESSION['contable']=$datos->__get('contable');
        if(!empty($datos->__get('ced'))){
        $_SESSION['ced']=$datos->__get('ced');
        }
    }
}

?>