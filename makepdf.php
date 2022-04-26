<?php

require('tfpdf/tfpdf.php');
$pdf = new tFPDF;
// $pdf->AddPage();
$pdf->AddFont('ShipporiMincho','','ShipporiMincho-Regular.ttf',true);
// $pdf->SetFont('ShipporiMincho','',20);
// $names = array('相田 孝雄','池浦 隆','石田 房枝');
// $names = explode(",",$_GET['names']);
$names = htmlentities($_GET['names'], ENT_QUOTES, "utf-8");
$names = explode("\r\n", $names);

foreach ($names as $name) {
 	// ループする処理
$pdf->SetFont('ShipporiMincho','',20);
$pdf->AddPage();
$pdf->Cell(0,10,'');
$pdf->Ln(5);
$pdf->Cell(100);
// $pdf->Cell(90,10,"名前：山田太郎","B");
$pdf->Cell(90,10,"名前 : $name","B");
$pdf->Ln(40);
make_contents();
}

$pdf->Output();


function make_contents(){
global $pdf;
// $contents = explode(",", $_GET['contents']);
$contents = htmlentities($_GET['contents'], ENT_QUOTES, "utf-8");
$contents = explode("\r\n", $contents);
$count = 0;

$Y = $pdf->getY();
foreach ($contents as $content) {
  $count++;
  // if($count == 10){
  //   $pdf->setY($Y);
  // }
  // if($count >= 10){
  //   $pdf->setX(110);
  // }
  $pdf->SetFont('ShipporiMincho','',15);
  $pdf->Cell(10,10,"({$count})");
  $pdf->SetFont('ShipporiMincho','',15);
  $pdf->Cell(10,10,$content);
  $pdf->Ln(23);
  }
}
?>