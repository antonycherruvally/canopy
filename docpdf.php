
<?php
// require('fpdf/fpdf.php');
// require('fpdf/fpdf_merge.php');

// $merge = new FPDF_Merge();



// $pdf = new FPDF(); 

// $pdf->AddPage();
// $pdf->SetFont('helvetica','B',16);
// $pdf->Cell(80,10,'Hello World!');
// $image1 = "images/bg-title-01.jpg";
// $pdf->Cell( 40, 40, $pdf->Image($image1, $pdf->GetX(), $pdf->GetY(), 33.78), 0, 0, 'L', false );
// $pageCount = $pdf->setSourceFile('upload/visa/bgnew.pdf');
// $merge->add('upload/visa/bgnew.pdf');


// $pdf->addPage();
// $pdf->useImportedPage($pageId, 10, 10, 90);
// $merge->output();
// $pdf->Output('my_file.pdf','I'); 



use setasign\Fpdi\Fpdi;

require_once('fpdf/fpdf.php');
require_once('FPDI-2.2.0/src/autoload.php');
 require('controler/dbconn.php');

class ConcatPdf extends Fpdi
{
    public $files = array();

    public function setFiles($files)
    {
        $this->files = $files;
    }

    public function concat()
    {
        foreach($this->files AS $file) {
            $pageCount = $this->setSourceFile($file);
            //$pageCount1 =  $pageCount;
            //echo $pageCount1;
            for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
                $pageId = $this->ImportPage($pageNo);
                $s = $this->getTemplatesize($pageId);
                $this->AddPage( $s);
                $this->useImportedPage($pageId);
            }
        }
    }
}

$pdf = new ConcatPdf();

$subjectId  = $_GET['id'];
                                                   

 $sql = "SELECT * FROM user where id = $subjectId order by id desc limit 20";
  if($result = mysqli_query($connection, $sql)){
  if(mysqli_num_rows($result) > 0){
  	 while($row = mysqli_fetch_array($result)){ 
                                                        
//$pdf3 = 'upload/profile/new2.jpg';
$pdf1 = 'upload/visa/'.$row['visa'];
$pdf2 = 'upload/passport/'.$row['passport'];
$pdf3 = 'upload/zira/'.$row['zira'];
}
}
}
//$pdfurl = 'upload/visa/'

$pdf->setFiles(array($pdf1,$pdf2,$pdf3));

$pdf->concat();
//$pdf->Image('upload/profile/new2.jpg', 50, 50, 100, '', '', 'http://www.tcpdf.org', '', false, 300);

$pdf->Output('I', 'concat.pdf');
?>