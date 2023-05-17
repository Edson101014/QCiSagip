<?php 

require_once './dompdf/autoload.inc.php';
include "../includes/date_today.php";




// reference the Dompdf namespace
use Dompdf\Dompdf;

$dompdf = new Dompdf();

ob_start();

$type = $_GET['type'];
$dateRange = $_GET['dateRange'];

$filename = "";

switch ($dateRange){
   case "week":{
      $filename = "Weekly $type report";
      break;
   }

   case "month":{
      $filename = "Monthly $type report";
      break;
   }
}

switch($type){
   case "adoption":
      require('./generate_report/adoption.php');
      break;

   case "services":
      require('./generate_report/service.php');
      break;
   
   case "animal":
      require('./generate_report/animal.php');
      break;
   
   case "reportedAnimal":
      require('./generate_report/reported_animals.php');
      break;
}


$html = ob_get_contents();

ob_end_clean();

$dompdf->loadHtml($html);


switch($type){
   case "adoption":
      $dompdf->setPaper('A4', 'portrait');
      break;

   case "services":
      $dompdf->setPaper('A4', 'portrait');
      break;
   
   case "animal":
      $dompdf->setPaper('A4', 'landscape');
      break;
   
   case "reportedAnimal":
      $dompdf->setPaper('A4', 'landscape');
      break;
}

// (Optional) Setup the paper size and orientation
// $dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream($filename.'_'.$curr_date.'.pdf', ['Attachment'=>false]);


?>