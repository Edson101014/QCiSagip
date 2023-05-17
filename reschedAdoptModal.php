<head>

    <link rel="stylesheet" href="css/signup.css" />

</head>


<div class="modal resched-modal">
    <div class="modal-content resched-content">
        <div class="modal-header">
            <h2><i class="fa fa-calendar-alt"></i> Request for Re-Schedule </h2>
            <span class="modal-close resched-btn-close">&times;</span>
        </div>
        <div class="modal-resched">
            <div class="resched-refno"><span>Reference Number: </span>
                <span id="ref-nomodal" style="font-weight:600;" value=""></span>
            </div>

            <form id="resched" action="./function/adopt_reschedule.php" method="POST">
                <input type="hidden" id="old-sched" value="">
                <input type="hidden" id="refsched-refno" value="">
                <div class="resched-setsched">
                    <div class="form-input-disable"><span>Old Schedule: </span>
                        <input type="text" id="old-sched-view" value="" readonly>

                    </div>
                    <div>
                        <span>New Schedule: </span>
                        <input type="date" class="new_date" id="new_date" name="new_date" value="" min="" max="" />
                        <div class="invalid-feedback" id="date-feedback"></div>
                    </div>
                </div>
                <div class="resched-buttons">
                    <button type="button" class="resched-btn-close">Cancel</button>
                    <button type="submit" class="resched-btn" id="resched-submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php

?>