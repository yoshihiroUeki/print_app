<?php

require('tfpdf/tfpdf.php');
$pdf = new tFPDF;
$pdf->AddPage();
$pdf->Output();
