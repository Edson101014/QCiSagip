<?php

include "../includes/db_con.php";
include "../includes/date_today.php";


$ref_no =  $_POST['ref_no'];

// not_attended($conn, $ref_no);

$sel_approved_appl_query = "SELECT * FROM `adoption_transaction` a
   JOIN `adoption_status` b
   ON a.adoption_id = b.adoption_id 
   JOIN `pet_details` c
   ON a.pet_id = c.pet_id
   JOIN `adoption_schedule` d
   ON a.`adoption_id` = d.`adoption_id` JOIN `adoption_reschedule` e ON a.reference_no = e.reference_no
   WHERE  a.`reference_no` = '$ref_no' AND e.remark_resched IS null; ";

$res_approved_appl = mysqli_query($conn, $sel_approved_appl_query);

$applicant = mysqli_fetch_assoc($res_approved_appl);



$date_of_application = $applicant['date_of_schedule'];
$time_of_application = $applicant['time'];

$date_of_interview = "$date_of_application $time_of_application";


$date_of_interview = new DateTime("$date_of_interview");
$date_of_interview = $date_of_interview->format('M d, Y');

$date_schedule = $applicant['datetime'];

$date_schedule = new DateTime("$date_schedule");
$date_schedule = $date_schedule->format('M d, Y h:i A');

$date_process = $applicant['date_update'];
$date_process = new DateTime($date_process);
$date_process = $date_process->format("Y-m-d");



// HOUSES
$sel_appl_house_query = "SELECT a.`reference_no`, c.images FROM `adoption_transaction` a
   JOIN `adoption_status` b
   ON a.adoption_id = b.adoption_id
   JOIN `adoption_house` c
   ON a.adoption_id = c.adoption_id
   WHERE b.`status` = 'approved' AND a.`reference_no` = '$ref_no';";

$res_appl_house = mysqli_query($conn, $sel_appl_house_query);

?>

<!-- View approved application -->
<div class="view-appl-container">
    <input type="hidden" id="ref-no" value="<?= $applicant['reference_no'] ?> ">
    <div class="ref-no-date">

        <p> reference number: <b> <?= $applicant['reference_no'] ?> </b> </p>

        <p> date of Interview: <b> <?= $date_schedule ?> </b> </p>

    </div>

    <div class="adopter-details">
        <h3> adopter's details </h3>

        <div class="adopter-detail-section">

            <div class="details">

                <div class="form-input-disable">
                    <p> name: </p>
                    <input type="text" value="<?= $applicant['fullname'] ?>" readonly>
                </div>

                <div class="form-input-disable">
                    <p> email: </p>
                    <input type="text" style="text-transform:lowercase" value="<?= $applicant['email'] ?>" readonly>
                </div>

                <div class="form-input-disable">
                    <p> contact: </p>
                    <input type="text" value="<?= $applicant['contact'] ?>" readonly>
                </div>

                <div class="form-input-disable">
                    <p> address: </p>
                    <input type="text" value="<?= $applicant['address'] ?>" readonly>
                </div>

            </div>

            <div class="id-1x1">
                <div class="image">

                    <img src="../<?= $applicant['1by1_id'] ?>" alt="">
                </div>
            </div>

        </div>

    </div>

    <div class="pet-details">

        <h3> pet's details </h3>

        <div class="pet-detail-section">

            <div class="details">

                <div class="form-input-disable">
                    <p> name: </p>
                    <input type="text" value="<?= $applicant['pet_name'] ?>" readonly>
                </div>

                <div class="form-input-disable">
                    <p> species/type: </p>
                    <input type="text" value="<?= $applicant['pet_species'] ?>" readonly>
                </div>

                <div class="form-input-disable">
                    <p> breed: </p>
                    <input type="text" value="<?= $applicant['pet_breed'] ?>" readonly>
                </div>

                <div class="form-input-disable">
                    <p> sex: </p>
                    <input type="text" value="<?= $applicant['pet_gender'] ?>" readonly>
                </div>

            </div>

            <div class="pet-image">
                <div class="image">
                    <img src="../pets_image/<?= $applicant['pet_image'] ?>" alt="">
                </div>
            </div>

        </div>

    </div>

  
    <div class="home-visit">
        <h3> Re-Schedule Request </h3>
        <div class="adopter-detail-section">

            <div class="details">
                <div class="form-input-disable">
                    <p> Old Schedule </p>
                    <input type="text" value="<?php echo $applicant['old_schedule']; ?>" readonly>
                </div>

                <div class="form-input-disable">
                    <p> New Schedule </p>
                    <input type="text" id="new-sched"value="<?php echo $applicant['new_schedule']; ?>" readonly>
                </div>

                <div class="form-input-disable">
                    <p> Reason for Re-Schedule: </p>
                    <textarea name="" id="" rows="6" readonly><?php echo $applicant['reason']; ?></textarea>
                </div>
            </div>




        </div>

    </div>

    <div class="button-sched">
        

        <div class="form-button-back">
            <button id="view-appl_back">
                <!-- <i class="fa fa-arrow-left" aria-hidden="true"></i> -->
                close
            </button>

        </div>
        <div class="form-button-back">
            <button class="resched-decline" id="decline-resched">Decline</button>
            <button class="resched-approve" id="approve-resched">Approve</button>
        </div>
    </div>

</div>

<script>

    $("#view-appl_back").click(function() {

        $("#modal-appl-view").hide();

    });


    
   $(document).ready(function() {
      $('#approve-resched').click(function(event) {
         event.preventDefault();
         var newsched = $('#new-sched').val();
         var remarks = "approve";
         var refno = $('#ref-no').val();
         $.ajax({
            url: './php/insert_reschedule.php',
            type: 'POST',
            data: {
                newsched: newsched,
                remarks: remarks,
                refno: refno
           
            },
            success: function(response) {
                $("#modal-appl-view").hide();
            },
            error: function(xhr, status, error) {
               console.log(xhr.responseText);
            }
         });

         

      });

      $('#decline-resched').click(function(event) {
         event.preventDefault();
         var remarks = "decline";
         var refno = $('#ref-no').val();
         $.ajax({
            url: './php/insert_reschedule.php',
            type: 'POST',
            data: {
                remarks: remarks,
                refno: refno
            },
            success: function(response) {
                $("#modal-appl-view").hide();
            },
            error: function(xhr, status, error) {
               console.log(xhr.responseText);
            }
         });

         

      });
   });
</script>