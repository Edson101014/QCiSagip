<?php
include "../includes/db_con.php";
include "../includes/select_all.php";
include "../function/application_function.php";

set_not_attended($conn, $curr_date);

?>

<table border="0" width="100%">
    <thead>
        <tr>
            <th style="text-align:center"> id </th>
            <th style="text-align:center"> application no. </th>
            <th> name </th>
            <th> pet name </th>
            <th> pet type </th>
            <th> date of Interview </th>
            <!--<th style="text-align:center"> status </th>-->
            <th style="text-align:center"> Reschedule Request </th>
            <th> action </th>
        </tr>
    </thead>

    <tbody>
        <?php
        if (mysqli_num_rows($res_resched) > 0) {
            while ($transaction_appl = mysqli_fetch_assoc($res_resched)) {

                $date_appl = $transaction_appl['date_update'];
                $date_appl = new DateTime($date_appl);
                $date_appl = $date_appl->format("Y-m-d");
                $date_string = $transaction_appl['datetime'];
                list($date, $time) = explode(' ', $date_string);
                $new_schedule = date("F j, Y", strtotime($transaction_appl['new_schedule']));
                $date_formatted = date("F j, Y", strtotime($date));

        ?>
                <tr>
                    <td style="text-align:center"> <?= $transaction_appl['id'] ?> </td>

                    <td style="text-align:center"> <?= $transaction_appl['reference_no'] ?> </td>

                    <td> <?= $transaction_appl['fullname'] ?> </td>

                    <td> <?= $transaction_appl['pet_name'] ?> </td>

                    <td> <?= $transaction_appl['pet_species'] ?> </td>

                    <td style="font-size: .9em;"> <?= $date_formatted ?> </td>

                    <!-- <td style="text-align:center"> <?= $transaction_appl['status'] ?> </td> -->

                    <td style="text-align:center"> <?= $new_schedule ?> </td>
                    <td class="resched-action">

                        <button type="button" id="adoption-send_sched" data-role="declined" data-ref_no="<?= $transaction_appl['reference_no'] ?>">
                            <i class="fas fa-eye"></i> View
                        </button>
                    </td>
                </tr>
            <?php }
        } else { ?>

            <tr>
                <td colspan="9"> No data fetch </td>
            </tr>

        <?php   } ?>
    </tbody>
</table>

<script>
    $(document).ready(function() {

        $('#adoption-send_sched[data-role=declined]').click(function() {

            let ref_no = $(this).data('ref_no');

            $("#modal-appl-view").show();

            $("#modal-appl-view").load('./php/view_reschedule.php', {
                ref_no: ref_no
            });

        });


    });
</script>