<?php

require_once('modelo/empleado.php');
require_once('modelo/planilla.php');
require_once('modelo/proceso.php');
class busquedacontroller{
	private $emp;
	private $pla;
	private $proc;

	public function __construct(){
		$this->emp= new empleado();
		$this->pla= new planilla();
		$this->proc = new proceso();

	}

	public function oficio_buscar(){
		$result=$this->emp->consultar(false,false,false,$_REQUEST['nacionalidad'], $_REQUEST['busqueda']);
		if($result!=false){
			$ruta=RUTA_HTTP.'escuela/planilla/oficio/'.$result->__get('id'); ?> 
			<script type="text/javascript">
				window.location.href='<?=$ruta?>';
		</script> <?php
		}else{ ?> <script type="text/javascript">
			alert('Personal no registrado en el sistema');
			if(confirm('¿Desea realizar registro?')){
				window.location.href='<?=RUTA_HTTP?>escuela/planilla/oficio';
			}else{
				window.location.href='<?=RUTA_HTTP?>escuela';	
			}
		</script> <?php
		} 

	}

	public function mov_per_buscar(){
		$res=$this->proc->consultar_status(false,$_REQUEST['busqueda']);
		if($res!=false){
			$com=$this->pla->listar();
			foreach ($com as $r) {
				if ($r->__get('cod_oficio')==$res->__get('cod_pla')) {
					$result=1;
					break;
				}
			}
			if($result==1){ ?> <script type="text/javascript">
				ruta('Ya la planilla oficio tiene su planilla de movimiento de personal','<?=RUTA_HTTP?>escuela');
			</script> <?php
			} else{ ?> <script type="text/javascript">
				window.location.href="<?=RUTA_HTTP?>escuela/planilla/mov_personal/<?=$_REQUEST['busqueda']?>";
			</script> <?php
			}
		}else{ ?> <script type="text/javascript">
			ruta('planilla oficio no registrada, debe realizar primero el registro','<?=RUTA_HTTP?>escuela');
		</script> <?php
		}
	}
}

?>