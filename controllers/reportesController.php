<?php
class reportesController extends Controller {
    private $_pdf;
    private $_cont;
    
    public function __construct() {
        parent::__construct();
        $this->loadLibrary('tcpdf' . DS . 'tcpdf');
        $this->_pdf = new TCPDF();
        $this->_cont = $this->loadModel('cont');
    }
    
    public function index() {}
    
    public function cont() {
        //set default header data 
        $this->_pdf->SetHeaderData('logo_p.gif', 50, 'Контейнера. Отчет', 'Дата ' . date("d" . "-" . "m" . "-" . "Y") );
        
        //set header and footer fonts
        $this->_pdf->setHeaderFont(Array('dejavusans', '', PDF_FONT_SIZE_MAIN));
        $this->_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
        
        //set default monospaced font
        $this->_pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);
        
        //set margins
        $this->_pdf->setHeaderMargin(10);
        $this->_pdf->SetMargins(10, 60, 10);
        
        //set auto page breaks
        $this->_pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
        
        //set image scale factor
        $this->_pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);
        
        //set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . 'lang/eng.php')) {
            require_once(dirname(__FILE__) . 'lang/eng.php');
            $this->_pdf->setLanguageArray($l);
        }
        
        //----------------------------------------------------------------------
        
        //set fotn
        $this->_pdf->SetFont('dejavusans', '', 12);
        
        //add a page
        $this->_pdf->AddPage('L', array(400, 200)); // L - LANDSCAPE orienration
        
        //column titles
        $header = array('Id', 'Код', 'Тип', 'Груз', 'Склад', 'Прибыл', 'Отправить', 'Прибытие', 'Отправление');
        
        //data loading
        $data = $this->_cont->getCont();
        
        //print colored table
        $this->ColoredTable($header, $data);
        
        //----------------------------------------------------------------------
        
        //close and ouput PDF document
        $this->_pdf->Output('containers.pdf', 'I'); // I: send the file inline to the browser (default).
        // The plug-in is used if available. 
        // The name given by name is used when one selects the "Save as" option on the link generating the PDF.
    }
    
    private function ColoredTable($header, $data) {
        //Colors, line width and bold font
        $this->_pdf->SetFillColor(233, 136, 64);
        $this->_pdf->SetTextColor(0);
        $this->_pdf->SetDrawColor(128, 0, 0);
        $this->_pdf->SetLineWidth(0.2);
        $this->_pdf->SetFont('', 'B');
        
        //Header
        $w = array(10, 25, 90, 50, 50, 40, 50, 30, 35); //ширина колонок
        $num_headers = count($header);
        for ($i = 0; $i < $num_headers; ++$i) {
            $this->_pdf->Cell($w[$i], 10, $header[$i], 1, 0, 'C', 1);
        }
        $this->_pdf->Ln();
        //Color and font restoration
        $this->_pdf->SetFillColor(224, 235, 255);
        $this->_pdf->SetFont('');
        //Data
        $fill = 0;
        foreach ($data as $row) {
            $this->_pdf->Cell($w[0], 12, $row[0], 'LR', 0, 'L', $fill);
            $this->_pdf->Cell($w[1], 12, $row[1], 'LR', 0, 'L', $fill);
            $this->_pdf->Cell($w[2], 12, $row[9], 'LR', 0, 'L', $fill);
            $this->_pdf->Cell($w[3], 12, $row[3], 'LR', 0, 'L', $fill);
            $this->_pdf->Cell($w[4], 12, $row[10], 'LR', 0, 'L', $fill);
            $this->_pdf->Cell($w[5], 12, $row[11], 'LR', 0, 'L', $fill);
            $this->_pdf->Cell($w[6], 12, $row[12], 'LR', 0, 'L', $fill);
            $this->_pdf->Cell($w[7], 12, $row[6], 'LR', 0, 'L', $fill);
            $this->_pdf->Cell($w[8], 12, $row[7], 'LR', 0, 'L', $fill);
            $this->_pdf->Ln();
            $fill =! $fill;
        }
        $this->_pdf->Cell(array_sum($w), 0, '', 'T');
    }
}
