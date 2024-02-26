<?php
session_start();

include'dbconect.php';
date_default_timezone_set("Africa/Nairobi");
$tarehe=date("Y-m-d");
$siku=date('l');

 require("libs/fpdf.php");
 ob_start();
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Times','B','7');
$pdf->Cell('194',7,'LOGBOOK REPORT.',0,1,'C');
$pdf->Cell('194',7,'ORGANIZATION NAME: SkyLink Solutions .',0,1,'C');
$pdf->Image('files/logoo.png',90,24,20,20,);
$pdf->Cell('194',7,'LIST OF ACTIVITIES.',0,1,'C');
$pdf->Cell('194',7,'Registration number:'.$_SESSION['student_reg'],0,1,'L');
$pdf->SetFont('Times','B','6');
$pdf->Cell('8',7,'SN',1,0,'C');
$pdf->Cell('40',7,'Log task',1,0,'C');
$pdf->Cell('135',7,'Skills aquired',1,0,'C');
$pdf->Cell('12',7,'Date',1,1,'C');

//query
$sql = "SELECT * FROM logbook WHERE student_id='$_SESSION[student_id]' ORDER BY log_date desc";
$sql2 = "SELECT * FROM approve as a JOIN staff as s ON student_id=student_id WHERE a.student_id='$_SESSION[student_id]' AND a.staff_id=s.staff_id";
$result2 = mysqli_query($conn, $sql2) or die ( mysqli_error());
    $row2 = mysqli_fetch_assoc($result2);
if($result = mysqli_query($conn, $sql)){
    if(mysqli_num_rows($result) > 0){
            $count=mysqli_num_rows($result);
              $i=1;
             while ($i<=$count) {
        while($row = mysqli_fetch_array($result)){

  $pdf->SetFont('Times','','6');
	$pdf->Cell("8","7",$i,"1","0","L");
	$pdf->Cell("40","7",$row['log_task'],"1","0","L");
	$pdf->Cell("135","7",$row['log_skills'],"1","0","L");
	$pdf->Cell("12","7",$row['log_date'],"1","1","L");
  $i++; 

     }
   }
  }
}
date_default_timezone_set("Africa/Nairobi");
$pdf->Cell(0,5,'',0,1,'L');
$pdf->SetFont('Times','I','8');
$pdf->Cell(176,5,'Printed on   '.date('l,d/m/Y').' at '.date('H:ia'),0,1,'R');
$pdf->Cell(0,5,'',0,1,'L');
$pdf->Cell('175',7,$_SESSION['student_reg'],0,1,'R');
$pdf->Cell(0,2,'',0,1,'L');
// $pdf->Image('uploaded-sign/tangwa.png',160,92,20,10,);
$pdf->Cell(181,5," Signature..........................................",0,1,'R');

// Create a table cell for combining text and image
$cellWidth = 0;
$cellHeight = 0;
$pdf->SetFillColor(200, 220, 255);
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell($cellWidth, $cellHeight, '', 1, 1, 'C', true);

// Position text and image within the cell
$text = "";
$imagePath = "uploaded-sign/" . $row2['staff_signature'];
$imageWidth = 20;
$imageHeight = 10;
$pdf->SetXY($pdf->GetX() + 10, $pdf->GetY() + -30); // Adjust position for text
$pdf->MultiCell($cellWidth - 20, 10, $text);
$pdf->Image($imagePath, $pdf->GetX() + 160, $pdf->GetY() + 10, $imageWidth, $imageHeight);

$pdf->SetFont('Times','B','8');
$pdf->Cell(168,5,"(Stamp)",0,1,'R');
$pdf->Output();
ob_end_flush();
     
 ?>

