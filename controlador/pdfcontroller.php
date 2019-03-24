<?php
require_once ("plugin/dompdf/autoload.inc.php");
class pdfcontroller{
    private $pdf;
    public function __construct(){
        $this->pdf= new Dompdf\Dompdf();
        ini_set("memory_limit","32M");
    }

    public function visualizar($html,$title){
        $this->pdf->setPaper('A4', 'landscape');
        $this->pdf->loadHtml($html);
        $this->pdf->render();
        $title.=".pdf";
        header('Content-type: application/pdf');
        echo $this->pdf->output();
        //$this->pdf->stream($title); 
        die();
    }

    public function status_usuario($usuario){
        require_once ("vista/pdf/status_usuario_adm.php");
        $html=ob_get_clean();
        $this->visualizar($html,'status_usuario'); 
    }


}