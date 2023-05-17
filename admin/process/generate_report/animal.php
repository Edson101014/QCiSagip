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

   $overall = "SELECT * FROM `pet_details` a
   JOIN `pet_status` b
   ON a.pet_id = b.pet_id";

   $addedPets = "SELECT * FROM `pet_details` a
   JOIN `pet_status` b
   ON a.pet_id = b.pet_id";

   $adoptedPets = "SELECT *, TIMESTAMPDIFF(year, a.pet_bdate, CURDATE()) as `pet_age_yr`, TIMESTAMPDIFF(month, a.pet_bdate, CURDATE()) as `pet_age_mos`, TIMESTAMPDIFF(day, a.pet_bdate, CURDATE()) as `pet_age_day` 
   FROM `pet_details` a 
   JOIN `pet_status` b 
   ON a.pet_id = b.pet_id
   JOIN `adoption_transaction` c
   ON a.pet_id = c.pet_id
   JOIN `adoption_status` d
   ON c.adoption_id = d.adoption_id
   WHERE b.status = 'adopted'";


   $adoptedTotals = "SELECT 
   COUNT((SELECT `pet_species` FROM `pet_details` WHERE `pet_species` = 'dog' AND `pet_id` = a.pet_id)) as `totalDog`,
   COUNT((SELECT `pet_species` FROM `pet_details` WHERE `pet_species` = 'dog' AND `pet_gender` = 'female' AND `pet_id` = a.pet_id)) as `totalDogF`,
   COUNT((SELECT `pet_species` FROM `pet_details` WHERE `pet_species` = 'dog' AND `pet_gender` = 'male' AND `pet_id` = a.pet_id)) as `totalDogM`,
   
   COUNT((SELECT `pet_species` FROM `pet_details` WHERE `pet_species` = 'cat' AND `pet_id` = a.pet_id)) as `totalCat`,
   COUNT((SELECT `pet_species` FROM `pet_details` WHERE `pet_species` = 'cat' AND `pet_gender` = 'female' AND `pet_id` = a.pet_id)) as `totalCatF`,
   COUNT((SELECT `pet_species` FROM `pet_details` WHERE `pet_species` = 'cat' AND `pet_gender` = 'male' AND `pet_id` = a.pet_id)) as `totalCatM`
   
   FROM `adoption_transaction` a 
   JOIN `pet_details` b 
   ON a.pet_id = b.pet_id 
   JOIN `pet_status` c 
   ON b.pet_id = c.pet_id 
   JOIN `adoption_status` d
   ON a.adoption_id = d.adoption_id
   WHERE c.status = 'adopted'";


   $remainingTotals = "SELECT 
   COUNT((SELECT `pet_species` FROM `pet_details` WHERE `pet_species` = 'dog' AND `pet_id` = a.pet_id)) as `totalDog`,
   COUNT((SELECT `pet_species` FROM `pet_details` WHERE `pet_species` = 'dog' AND `pet_gender` = 'female' AND `pet_id` = a.pet_id)) as `totalDogF`,
   COUNT((SELECT `pet_species` FROM `pet_details` WHERE `pet_species` = 'dog' AND `pet_gender` = 'male' AND `pet_id` = a.pet_id)) as `totalDogM`,
   
   COUNT((SELECT `pet_species` FROM `pet_details` WHERE `pet_species` = 'cat' AND `pet_id` = a.pet_id)) as `totalCat`,
   COUNT((SELECT `pet_species` FROM `pet_details` WHERE `pet_species` = 'cat' AND `pet_gender` = 'female' AND `pet_id` = a.pet_id)) as `totalCatF`,
   COUNT((SELECT `pet_species` FROM `pet_details` WHERE `pet_species` = 'cat' AND `pet_gender` = 'male' AND `pet_id` = a.pet_id)) as `totalCatM`
   
   FROM `pet_details` a
   JOIN `pet_status` b
   ON a.pet_id = b.pet_id
   WHERE b.status != 'adopted'";


   $remainingPets = "SELECT *, TIMESTAMPDIFF(year, a.pet_bdate, CURDATE()) as `pet_age_yr`, TIMESTAMPDIFF(month, a.pet_bdate, CURDATE()) as `pet_age_mos`, TIMESTAMPDIFF(day, a.pet_bdate, CURDATE()) as `pet_age_day`, TIMESTAMPDIFF(day, a.date_added, CURDATE()) as `length`
   FROM `pet_details` a
   JOIN `pet_status` b
   ON a.pet_id = b.pet_id
   WHERE b.status != 'adopted'";



   switch ($dateRange){

      case "week":

         $prevWeek = strtotime('-1 week +1 day');

         $fromDate = strtotime("last sunday midnight",$prevWeek);
         $toDate = strtotime("saturday",$prevWeek);

         $fromDate = date("Y-m-d", $fromDate);
         $toDate = date("Y-m-d", $toDate);

         $addedPets .= " WHERE DATE(a.date_added) BETWEEN '$fromDate' AND '$curr_date'";

         $adoptedPets .= " AND DATE(d.date_update) BETWEEN '$fromDate' AND '$curr_date'";
         $adoptedTotals .= " AND DATE(d.date_update) BETWEEN '$fromDate' AND '$curr_date'";

         $remainingTotals .= " AND DATE(a.date_added) BETWEEN '$fromDate' AND '$curr_date'";
         $remainingPets .= " AND DATE(a.date_added) BETWEEN '$fromDate' AND '$curr_date'";


      break;

      case "month":
         $fromDate = date('Y-m-d', strtotime('first day of last month'));
         $toDate = date('Y-m-d', strtotime('last day of last month'));

         $addedPets .= " WHERE DATE(a.date_added) BETWEEN '$fromDate' AND '$curr_date'";

         $adoptedPets .= " AND DATE(d.date_update) BETWEEN '$fromDate' AND '$curr_date'";
         $adoptedTotals .= " AND DATE(d.date_update) BETWEEN '$fromDate' AND '$curr_date'";

         $remainingTotals .= " AND DATE(a.date_added) BETWEEN '$fromDate' AND '$curr_date'";
         $remainingPets .= " AND DATE(a.date_added) BETWEEN '$fromDate' AND '$curr_date'";

      break;
      
      case "year":

         $lastyear = date("Y") - 1;
         $addedPets .= " AND a.date_added LIKE '%$lastyear%'";
         $adoptedPets .= " AND d.date_update LIKE '%$lastyear%'";
         $adoptedTotals .= " AND d.date_update LIKE '%$lastyear%'"   ;

         $remainingTotals .= " AND a.date_added LIKE '%$lastyear%'";
         $remainingPets .= " AND a.date_added LIKE '%$lastyear%'";

      break;

   }

   $allPet = mysqli_query($conn, $overall);
   $addedPet = mysqli_query($conn, $addedPets);

   // adopted animals
   $adoptedPet = mysqli_query($conn, $adoptedPets);
   $adoptedTotal = mysqli_query($conn, $adoptedTotals);
   $adopted = mysqli_fetch_assoc($adoptedTotal);

   // remaining animals
   $remainingPet = mysqli_query($conn, $remainingPets);
   $remainingTotal = mysqli_query($conn, $remainingTotals);
   $remaining = mysqli_fetch_assoc($remainingTotal);


   $formatFromDate = new DateTime($fromDate);
   $formatFromDate = $formatFromDate->format("F d, Y");

   $formatToDate = new DateTime($curr_date);
   $formatToDate = $formatToDate->format("F d, Y");

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title> Animals Summary Report </title>
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
      margin-bottom: 20px;
   }

   main .main-content .item-list table{
      width: 100%;
      border-collapse: collapse;
      text-align: center;
      margin-bottom: 20px;
      
   }

   main .main-content .item-list table thead{
      background-color: #ddd;
      font-weight: 400;
   }

   main .main-content .item-list table thead th{
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      font-size: .9em;
      padding: 5px;
   }

   main .main-content .item-list table tbody td{
      font-size: .85em;
      padding: 5px;
   }


   main .main-content .summary-container table{
      width: 100%;
      border-collapse: collapse;
      margin-bottom: 20px;
   }

   main .main-content .summary-container table tr td{
     padding: 5px;
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
       
      <div class="header-title">
           
           <div>
                <p style="display:flex; float: left; text-transform: capitalize;"> Generated by: <b> <?=$admin_logged['firstname']?> <?=$admin_logged['lastname']?> </b></p>

                <p  style="display:flex; float: right;"> Date & time: <b> <?=$date_today;?> </b> </p>
          </div>
          
         <h3 style="text-transform: capitalize;"> <u> <?=$type?> Last <?=$dateRange?> summary report </u> </h3>
         <!-- <p> <?=$remainingTotals?> </p> -->
      </div>

      <div class="main-content">
         

         <div class="summary-container">
            
            <table border="0">
               <thead>
                  <tr>
                     <td > Total number of animals/pets: </td>
                     <td style="text-align: right;"> <b> <?=mysqli_num_rows($allPet)?> </b> </td>
                  </tr>

                  <tr>
                     <td > Total number of added animals/pets from <?=$formatFromDate?> to <?=$formatToDate?>: </td>
                     <td style="text-align: right;"> <b> <?=mysqli_num_rows($addedPet)?> </b> </td>
                  </tr>
               </thead>
              
            </table>
            
            <table border="1">
               
               <tr>
                  <th style="text-align: left;" colspan="3"> Remaining animals: <?=mysqli_num_rows($remainingPet)?> </th>

                  <tr>
                     <td width="70%"> Dogs: <b> <?=$remaining['totalDog']?> </b></td>
                     <td> Female: <?=$remaining['totalDogF']?>   </td>
                     <td> Male: <?=$remaining['totalDogM']?>  </td>
                  </tr>

                  <tr>
                     <td> Cats: <b> <?=$remaining['totalCat']?>  </b> </td>
                     <td> Female: <?=$remaining['totalCatF']?>   </td>
                     <td> Male: <?=$remaining['totalCatM']?>  </td>
                  </tr>

               </tr>

            </table>

            <table border="1">
               
               <tr>
                  <th style="text-align: left;" colspan="3"> Adopted animals: <?=mysqli_num_rows($adoptedPet)?> </th>

                  <tr>
                     <td width="70%"> Dogs: <b> <?=$adopted['totalDog']?> </b></td>
                     <td> Female: <?=$adopted['totalDogF']?>   </td>
                     <td> Male: <?=$adopted['totalDogM']?>  </td>
                  </tr>

                  <tr>
                     <td> Cats: <b> <?=$adopted['totalCat']?>  </b> </td>
                     <td> Female: <?=$adopted['totalCatF']?>   </td>
                     <td> Male: <?=$adopted['totalCatM']?>  </td>
                  </tr>

               </tr>

            </table>

         </div>


         <div class="item-list">

            <table border="1">
               <thead>
                  <tr>
                     <th colspan="10" style="text-align: center;"> List of remaining animals/pets: <?=mysqli_num_rows($remainingPet)?> </th>
                  </tr>
                  <tr>
                     <th> Id </th>
                     <th> Pet ID </th>
                     <th> Name </th>
                     <th> Species </th>
                     <th> Gender </th>
                     <th> Breed </th>
                     <th> Color </th>
                     <th> Estimated Age </th>
                     <th> Date Added </th>
                     <th> Duration of Availability for Adoption </th>
                  </tr>
               </thead>

               <tbody>
               <?php 
                     if(mysqli_num_rows($remainingPet) > 0){

                        $id = 1;

                        while($row = mysqli_fetch_assoc($remainingPet)){

                           $dateAdopt = $row['date_update'];
                           $dateAdopt = new DateTime($dateAdopt);
                           $dateAdopt = $dateAdopt->format("F d, Y");

                           $dateAdded = $row['date_added'];
                           $dateAdded = new DateTime($dateAdded);
                           $dateAdded = $dateAdded->format("M d, Y");

                           if($row['pet_age_yr'] != 0){

                              $pet_age = $row['pet_age_yr'];
                              $pet_age = "$pet_age year/s old";
                           }
                           
                           else if($row['pet_age_mos'] != 0) {
                             
                              $pet_age = $row['pet_age_mos'];
                              $pet_age = "$pet_age month/s old";
                              
                           }
                           else {
                              $pet_age = $row['pet_age_day'];
                              $pet_age = "$pet_age day/s old";
                              
                           }

                           ?>
                              <tr>
                                 <td> <?=$id?> </td>
                                 <td> <?=$row['pet_id']?> </td>
                                 <td> <?=$row['pet_name']?> </td>
                                 <td> <?=$row['pet_species']?> </td>
                                 <td> <?=$row['pet_gender']?> </td>
                                 <td> <?=$row['pet_breed']?> </td>
                                 <td> <?=$row['pet_color']?> </td>
                                 <td> <?=$pet_age?> </td>
                                 <td> <?=$dateAdded?> </td>
                                 <td> <?=$row['length']?> Day/s</td>
                           
                              </tr>
                           <?php 

                           $id++;

                        }
                        
                     } else {
                        ?> <tr> <td colspan="11"> No data </td> </tr> <?php 
                     }
                  ?>
                  
               </tbody>
            </table>

            <table border="1">
               <thead>
                  <tr>
                     <th colspan="11" style="text-align: center;"> List of adopted animals/pets: <?=mysqli_num_rows($adoptedPet)?> </th>
                  </tr>
                  <tr>
                     <th> Id </th>
                     <th> Pet ID </th>
                     <th> Name </th>
                     <th> Species </th>
                     <th> Gender </th>
                     <th> Breed </th>
                     <th> Color </th>
                     <th> Estimated Age </th>
                     <th> Date Added </th>
                     <th> Date Adopted </th>
                     <th> Adopter name </th>
                  </tr>
               </thead>

               <tbody>
               <?php 
                     if(mysqli_num_rows($adoptedPet) > 0){

                        $id = 1;

                        while($row = mysqli_fetch_assoc($adoptedPet)){

                           $dateAdopt = $row['date_update'];
                           $dateAdopt = new DateTime($dateAdopt);
                           $dateAdopt = $dateAdopt->format("F d, Y");

                           $dateAdded = $row['date_added'];
                           $dateAdded = new DateTime($dateAdded);
                           $dateAdded = $dateAdded->format("M d, Y");

                           if($row['pet_age_yr'] != 0){

                              $pet_age = $row['pet_age_yr'];
                              $pet_age = "$pet_age year/s old";
                           }
                           
                           else if($row['pet_age_mos'] != 0) {
                             
                              $pet_age = $row['pet_age_mos'];
                              $pet_age = "$pet_age month/s old";
                              
                           }
                           else {
                              $pet_age = $row['pet_age_day'];
                              $pet_age = "$pet_age day/s old";
                              
                           }

                           ?>
                              <tr>
                                 <td> <?=$id?> </td>
                                 <td> <?=$row['pet_id']?> </td>
                                 <td> <?=$row['pet_name']?> </td>
                                 <td> <?=$row['pet_species']?> </td>
                                 <td> <?=$row['pet_gender']?> </td>
                                 <td> <?=$row['pet_breed']?> </td>
                                 <td> <?=$row['pet_color']?> </td>
                                 <td> <?=$pet_age?> </td>
                                 <td> <?=$dateAdded?> </td>
                                 <td> <?=$dateAdopt?> </td>
                                 
                                 <td> <?=$row['fullname']?> </td>
                              </tr>
                           <?php 

                           $id++;

                        }
                        
                     } else {
                        ?> <tr> <td colspan="11"> No data </td> </tr> <?php 
                     }
                  ?>
                  
               </tbody>
            </table>
            
         </div>

         
      </div>
   </main>

   <!--<footer>-->
   <!--   <p style="display:flex; float: left; text-transform: capitalize;"></b></p>-->

   <!--   <p  style="display:flex; float: right;"> Control number: <b> <?=generateID(6);?> </b> </p>-->
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