<?php
require_once ("plugin/dompdf/autoload.inc.php");
class pdfcontroller{
    private $pdf;
    public function __construct(){
        $this->pdf= new Dompdf\Dompdf();
        ini_set("memory_limit","32M");
    }

    public function visualizar($html,$title){
        $this->pdf->loadHtml($html);
        $this->pdf->render();
        $title.=".pdf";
        //header('Content-type: application/pdf');
        //echo $this->pdf->output();
        $this->pdf->stream($title);
        $salida=$this->pdf->output();
        file_put_contents($title, $salida);
        //$this->pdf->stream($title,array("Attachment" => 0)); 
    }
}