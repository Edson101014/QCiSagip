<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include_once('head.php');
    ?>
    <link rel="stylesheet" href="css/adoptResched.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
    <script src="./js/adoptResched.js" defer></script>
        
  <!-- flatpickr -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.6.13/flatpickr.min.js" integrity="sha512-K/oyQtMXpxI4+K0W7H25UopjM8pzq0yrVdFdG21Fh5dBe91I40pDd9A4lzNlHPHBIP2cwZuoxaUSX0GJSObvGA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <?php
    include_once('navigation.php');

    $refno = $_GET['refno'];
    $sql_transaction = "SELECT * FROM adoption_status A 
    JOIN adoption_transaction B 
    ON A.adoption_id = B.adoption_id 
    JOIN adoption_schedule C 
    ON B.adoption_id = C.adoption_id  
    JOIN payment D
    ON B.reference_no = D.reference_no  
    WHERE B.reference_no = '$refno'";
    $result_transaction = mysqli_query($conn, $sql_transaction);

    $row_sched = mysqli_fetch_assoc($result_transaction);
    $date_old = date('F j Y', strtotime($row_sched['date_of_schedule']));
    $max_date = date('Y-m-d', strtotime($row_sched['date_of_schedule']));
    
    $date_sched = strtotime('+1 day');
    
    $date_min = date('Y-m-d', $date_sched);
    
    ?>
    <div class="resched">
        <div class="resched-content">
            <div class="resched-header">
                <h2><i class="fa fa-calendar-alt"></i> Request for Re-Schedule </h2>
            </div>
            <div class="resched-body">
                <div class="resched-refno"><span>Reference Number: </span>
                    <span id="ref-nomodal" style="font-weight:700;"><?php echo $refno; ?></span>
                </div>

                <form id="resched" action="./function/adopt_reschedule.php?refno=<?php echo $refno; ?>" method="POST">
                    <div class="resched-setsched">
                        <div class="form-input-disable">
                            <span>Old Schedule: </span>
                            <input type="text" id="old-sched-view" class="old-sched-view" name="old-sched-view" value="<?php echo $date_old; ?>" readonly>

                        </div>
                        <div>
                            <span>New Schedule: </span>

                             <input type="text" class="new_date" id="new_date" name="new_date" placeholder="Select new schedule"/>
                            
                        </div>
                        <div class="invalid-feedback" id="date-feedback"></div>
                        <div class="form-input">
                            <span>Reason for Re-Schedule:</span>
                            <textarea class="reason_resched" name="reason_resched" id="reason_resched" rows="3" required></textarea>

                        </div>
                        <div class="invalid-feedback" id="reason-feedback"></div>
                    </div>
                    <div class="resched-buttons">
                        <a href="myAccount.php?page=transaction&page_number=1" type="button" class="resched-btn-close">Cancel</a>
                        <button type="submit" class="resched-btn submit-btn" id="resched-submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    include_once('footer.php');
    ?>
</body>

<script> 
    
    function rmydays(date) {

      return (date.getDay() === 0 || date.getDay() === 6);
      
    }
   
   
    const config = {
      altInput: true,
      altFormat: "F d, Y",
      dateFormat: "Y-m-d",
      minDate: "today",
      maxDate: "2023-05-31",
      display: false,
      disable: [
          rmydays,
          "<?=$row_sched['date_of_schedule']?>"
          
          ],
     
    }

   flatpickr("#new_date", config);
   
   
</script>


</html>