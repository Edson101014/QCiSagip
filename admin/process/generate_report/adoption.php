<?php 
   session_start();
   
   $admin_id = $_SESSION['admin-id'];
   
   include "../includes/db_con.php";
   include "../includes/select_all.php";
   include "../includes/date_today.php";

   
   $date_today = new DateTime($date_today);
   $date_today = $date_today->format("F d, Y h:i A");

   // image
   $header_svg = file_get_contents("../../assets/header-report.png");
   $header_base64 = base64_encode($header_svg);

   $type = $_GET['type'];
   $dateRange = $_GET['dateRange'];

   $sql = "SELECT * FROM `adoption_transaction` a
   JOIN `adoption_status` b
   ON a.adoption_id = b.adoption_id
   JOIN `pet_details` c
   ON a.pet_id = c.pet_id
   JOIN `payment` d
   ON a.reference_no = d.reference_no
   WHERE b.status = 'success'";

   // total cat (M/F)
   $cntCat = "SELECT * FROM `adoption_transaction` a 
   JOIN `adoption_status` b 
   ON a.adoption_id = b.adoption_id 
   JOIN `pet_details` c 
   ON a.pet_id = c.pet_id
   JOIN `payment` d
   ON a.reference_no = d.reference_no
   WHERE b.status = 'success' AND c.pet_species = 'cat'";

   $cntCatF = "SELECT * FROM `adoption_transaction` a 
   JOIN `adoption_status` b 
   ON a.adoption_id = b.adoption_id
   JOIN `pet_details` c 
   ON a.pet_id = c.pet_id 
   JOIN `payment` d
   ON a.reference_no = d.reference_no
   WHERE b.status = 'success' AND c.pet_species = 'cat' AND c.pet_gender = 'female'";

   $cntCatM = "SELECT * FROM `adoption_transaction` a 
   JOIN `adoption_status` b 
   ON a.adoption_id = b.adoption_id
   JOIN `pet_details` c 
   ON a.pet_id = c.pet_id 
   JOIN `payment` d
   ON a.reference_no = d.reference_no
   WHERE b.status = 'success' AND c.pet_species = 'cat' AND c.pet_gender = 'male'";


   // total dog (M/F)
   $cntDog = "SELECT * FROM `adoption_transaction` a 
   JOIN `adoption_status` b 
   ON a.adoption_id = b.adoption_id 
   JOIN `pet_details` c 
   ON a.pet_id = c.pet_id
   JOIN `payment` d
   ON a.reference_no = d.reference_no
   WHERE b.status = 'success' AND c.pet_species = 'dog'";

   $cntDogF = "SELECT * FROM `adoption_transaction` a 
   JOIN `adoption_status` b 
   ON a.adoption_id = b.adoption_id
   JOIN `pet_details` c 
   ON a.pet_id = c.pet_id
   JOIN `payment` d
   ON a.reference_no = d.reference_no
   WHERE b.status = 'success' AND c.pet_species = 'dog' AND c.pet_gender = 'female'";

   $cntDogM = "SELECT * FROM `adoption_transaction` a 
   JOIN `adoption_status` b 
   ON a.adoption_id = b.adoption_id
   JOIN `pet_details` c 
   ON a.pet_id = c.pet_id 
   JOIN `payment` d
   ON a.reference_no = d.reference_no
   WHERE b.status = 'success' AND c.pet_species = 'dog' AND c.pet_gender = 'male'";


   // TOTAL PROFIT

   switch ($dateRange){
      case "week": 

         $prevWeek = strtotime('-1 week +1 day');
         
         $fromDate = strtotime("last sunday midnight",$prevWeek);
         $toDate = strtotime("saturday", $prevWeek);

         $fromDate = date("Y-m-d", $fromDate);
         $toDate = date("Y-m-d", $toDate);

         $sql .= " AND (DATE(b.date_update) BETWEEN '$fromDate' AND '$curr_date')";

         $cntCat .= " AND (DATE(b.date_update) BETWEEN '$fromDate' AND '$curr_date')";
         $cntCatF .= " AND (DATE(b.date_update) BETWEEN '$fromDate' AND '$curr_date')";
         $cntCatM .= " AND (DATE(b.date_update) BETWEEN '$fromDate' AND '$curr_date')";


         $cntDog .= " AND (DATE(b.date_update) BETWEEN '$fromDate' AND '$curr_date')";
         $cntDogF .= " AND (DATE(b.date_update) BETWEEN '$fromDate' AND '$curr_date')";
         $cntDogM .= " AND (DATE(b.date_update) BETWEEN '$fromDate' AND '$curr_date')";

         break;

      case "month":
         $fromDate = date('Y-m-d', strtotime('first day of last month'));
         $toDate = date('Y-m-d', strtotime('last day of last month'));

         $sql .= " AND (DATE(b.date_update) BETWEEN '$fromDate' AND '$curr_date')";
      
         $cntCat .= " AND (DATE(b.date_update) BETWEEN '$fromDate' AND '$curr_date')";
         $cntCatF .= " AND (DATE(b.date_update) BETWEEN '$fromDate' AND '$curr_date')";
         $cntCatM .= " AND (DATE(b.date_update) BETWEEN '$fromDate' AND '$curr_date')";


         $cntDog .= " AND (DATE(b.date_update) BETWEEN '$fromDate' AND '$curr_date')";
         $cntDogF .= " AND (DATE(b.date_update) BETWEEN '$fromDate' AND '$curr_date')";
         $cntDogM .= " AND (DATE(b.date_update) BETWEEN '$fromDate' AND '$curr_date')";


         break;
      

      case "year":

         $lastyear = date("Y") - 1;
         
         $sql .= " AND b.date_update LIKE '%$lastyear%'";

         $cntCat .= " AND b.date_update LIKE '%$lastyear%'";
         $cntCatF .= " AND b.date_update LIKE '%$lastyear%'";
         $cntCatM .= " AND b.date_update LIKE '%$lastyear%'";

         $cntDog .= " AND b.date_update LIKE '%$lastyear%'";
         $cntDogF .= " AND b.date_update LIKE '%$lastyear%'";
         $cntDogM .= " AND b.date_update LIKE '%$lastyear%'";
         break;

   }

   $sql .= " ORDER BY b.date_update DESC";
   // $cntCat .= "ORDER BY id";
   $result = mysqli_query($conn, $sql);
   
   $cat = mysqli_query($conn, $cntCat);
   $catF = mysqli_query($conn, $cntCatF);
   $catM = mysqli_query($conn, $cntCatM);

   $dog = mysqli_query($conn, $cntDog);
   $dogF = mysqli_query($conn, $cntDogF);
   $dogM = mysqli_query($conn, $cntDogM);
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Adoption Summary Report </title>
   <!-- <link rel="stylesheet" href="../css/main.css"> -->

   <!-- Chart Js CDN -->
   <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>
</head>

<style>

   body{
      font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
   }

   header{
      background-color: red;
   }

   header img{
      width: 100%;
   }

   main .header-title{
      text-align: center;
   }

   main .main-content{
      /* background-color: red; */
      margin-bottom: 5px;
   }

   main .main-content .item-list{
      margin-bottom: 10px;
   }

   main .main-content .item-list table{
      width: 100%;
      border-collapse: collapse;
      text-align: center;
      
   }

   main .main-content .item-list table thead{
      background-color: #ddd;
      font-weight: 400;
   }

   main .main-content .item-list table thead th{
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-size: .8em;
      padding: 5px;
   }

   main .main-content .item-list table tbody td{
      font-size: .85em;
      padding: 5px;
   }

   main .main-content .summary-container{
      margin-bottom: 20px;
   }

   main .main-content .summary-container table{
      width: 100%;
      border-collapse: collapse;
      text-align: left;
   }

   main .main-content .summary-container table tr td{
     padding: 10px 0;
   }

   footer{
      position: absolute;
      bottom: 1%;
      width: 100%;
   }

   footer p{
      font-size: .8em;
   }

</style>

<body>

   <header>

      <img src='data:image;base64, <?=$header_base64?>'>

   </header>

   <main>
        <p> Control number: <b> <?=generateID(6);?> </b> </p>
          <div>
                <p style="display:flex; float: left; text-transform: capitalize;"> Generated by: <b> <?=$admin_logged['firstname']?> <?=$admin_logged['lastname']?> </b></p>

                <p  style="display:flex; float: right;"> Date & time: <b> <?=$date_today;?> </b> </p>
          </div>
       
      <div class="header-title" style="margin-top: 40px;">
         
         <h3 style="text-transform: capitalize;"> <u> <?=$type?> Transaction Last <?=$dateRange?> summary report </u> </h3>
      </div>

      <div class="main-content">
         <div class="summary-container">

            <table border="0">
               <tr>
                  <td> Total number of adopted animal: </td>
                  <td style="text-align: right;"><b><?=mysqli_num_rows($result)?></b></td>
               </tr>

               <tr>
                  <td> Total number of adopted animal (Dog): </td>
                  <td style="text-align: right;"> <?=mysqli_num_rows($dog)?>  </td>
                  
                  <tr>
                     <td colspan="2" style="text-indent: 10px;">  Female (Dog): <b> <?=mysqli_num_rows($dogF)?>  </td>
                  </tr>
                  <tr>
                     <td colspan="2" style="text-indent: 10px;">  Male (Dog): <b> <?=mysqli_num_rows($dogM)?> </td>
                  </tr>

               </tr>

               <tr>
                  <td> Total number of adopted animal (Cat): </td>
                  <td style="text-align: right;"> <?=mysqli_num_rows($cat)?> </td>

                  <tr>
                     <td colspan="2" style="text-indent: 10px;"> Female (Cat): <b> <?=mysqli_num_rows($catF)?> </b></td>
                  </tr>
                  <tr>
                     <td colspan="2" style="text-indent: 10px;"> Male (Cat):  <b> <?=mysqli_num_rows($catM)?> </b> </td>
                  </tr>
               </tr>

               <tr style="font-size: 1em; border-top: 1px solid black; ">
                  <td style="text-align: right; padding: 5px 0;"> Total profit: </td>
                  <td style="text-align: right; padding: 5px 0;"> <b> <?=mysqli_num_rows($result) * 500?>.00 </b> </td>
               </tr>
            </table>
         </div>

         <div class="item-list">

            <table border="1">
               <thead>
                  <tr> 
                     <th colspan="6" > Adoption Transaction List </th>
                  </tr>
                  <tr>
                     <th> Application No. </th>
                     <th> User ID </th>
                     <th> Invoice(Reference No.)</th>
                     <th> Pet Type </th>
                     <th> Pet Name </th>
                     <th> Date Adopted </th>
                  </tr>
               </thead>

               <tbody>
                  <?php 
                     if(mysqli_num_rows($result) > 0){

                        while($row = mysqli_fetch_assoc($result)){

                           $dateAdopt = $row['date_update'];
                           $dateAdopt = new DateTime($dateAdopt);
                           $dateAdopt = $dateAdopt->format("F d, Y");

                           ?>
                              <tr>
                                 <td> <?=$row['adoption_id']?> </td>
                                 <td> <?=$row['user_id']?> </td>
                                 <td> <?=$row['payment_reference_no']?> </td>
                                 <td style="text-transform:capitalize"> <?=$row['pet_species']?> </td>
                                 <td style="text-transform:capitalize"> <?=$row['pet_name']?></td>
                                 <td> <?=$dateAdopt?> </td>
                              </tr>
                           <?php 

                        }
                        
                     } else {
                        ?> <tr> <td colspan="6"> No data </td> </tr> <?php 
                     }
                  ?>
                
               </tbody>
            </table>

         </div>

         

      </div>
   </main>

   <!--<footer>-->
   <!--   <p style="display:flex; float: left; text-transform: capitalize;"> Generated by: <b> <?=$admin_logged['firstname']?> <?=$admin_logged['lastname']?> </b></p>-->

   <!--   <p  style="display:flex; float: right;"> Date & time: <b> <?=$date_today;?> </b> </p>-->
   <!--</footer>-->
   
</body>
<?php 

function generateID($len){

   $characters = '0123456789';

   $code = '';

   for ($i = 0; $i < $len; $i++) {

       $code .= $characters[rand(0, strlen($characters) - 1)];
   }

   return $code;

}

?>

</html>