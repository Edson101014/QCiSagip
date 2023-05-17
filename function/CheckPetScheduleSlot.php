<?php


function get_adoption_slot($new_date)
{

    include "./db/db_con.php";

    $sql_adoption_slot = "SELECT * FROM adoption_slot WHERE date_of_schedule = '$new_date'";

    $res_adoption_slot = mysqli_query($conn, $sql_adoption_slot);

    try {
        if (mysqli_num_rows($res_adoption_slot) == 1) {
            $row_adoption_slot = mysqli_fetch_assoc($res_adoption_slot);
            $slot = $row_adoption_slot["date_slot"];
            if ($slot == 0) {
                $slotnew = 10;
                $stmt = $conn->prepare("INSERT INTO `adoption_slot` (`date_of_schedule`, `date_slot`) VALUES (?, ?) ");
                $stmt->bind_param("ss", $new_date, $slotnew);
                $stmt->execute();
                $stmt->close();
                return $slot;
            } else {
                $slot = $slot - 1;
                $stmt10 = $conn->prepare("UPDATE adoption_slot SET date_slot = ?
                        WHERE date_of_schedule = ?");
                $stmt10->bind_param("ss", $slot, $new_date);
                $stmt10->execute();
                $stmt10->close();
                return $slot;
            }

        } else {
            $slot = 10;
            $stmt = $conn->prepare("INSERT INTO `adoption_slot` (`date_of_schedule`, `date_slot`) VALUES (?, ?) ");
            $stmt->bind_param("ss", $new_date, $slot);
            $stmt->execute();
            $stmt->close();
            return $slot;
        }
    } catch (Exception $e) {
        throw new Exception("Error occurred: " . $e->getMessage());
    }

}

function getNextAvailableDate($new_date)
{
    include "./db/db_con.php";

    $sql_adoption_slot = "SELECT * FROM adoption_slot WHERE date_of_schedule = '$new_date'";
    $res_adoption_slot = mysqli_query($conn, $sql_adoption_slot);
    $row_adoption_slot = mysqli_fetch_assoc($res_adoption_slot);

    if (!$row_adoption_slot) {
        return $new_date; // No record found for the specified date
    }

    $slot = $row_adoption_slot["date_slot"];
    $continue = true;
    $count = 0;

    while ($slot == 0 && $continue) {
        $curr_date = strtotime('+' . $count . ' weekday', strtotime($new_date));
      
        $curr_day = date('N', $curr_date);

        if ($curr_day == 6) {
            $curr_date += 2 * 86400;
        } 
       
        
        $curr_date = date('Y-m-d', $curr_date);

        $sql_adoption_slot = "SELECT * FROM adoption_slot WHERE date_of_schedule = '$curr_date'";
        $res_adoption_slot = mysqli_query($conn, $sql_adoption_slot);
        $row_adoption_slot = mysqli_fetch_assoc($res_adoption_slot);
        if (!$row_adoption_slot) {
            return $curr_date; // No record found for the specified date
        }
    
        $slot = $row_adoption_slot["date_slot"];

        if ($slot > 0 || $slot == null) {
            $continue = false;
            return $curr_date;
        } else {
            $count++;
        }
    }

    return $new_date;
}



function getSched($refno){
    include "./db/db_con.php";
    $resched_query = "SELECT * FROM adoption_reschedule WHERE reference_no='$refno' AND remark_resched IS NULL";
    $res_resched = mysqli_query($conn, $resched_query);
    
    $num_results = mysqli_num_rows($res_resched);
    
    return $num_results;
  }

  function SchedWithRemark($refno){
    include "./db/db_con.php";
    $resched_query = "SELECT * FROM adoption_reschedule WHERE reference_no='$refno' AND remark_resched IS NOT NULL";
    $res_resched = mysqli_query($conn, $resched_query);

    $row = mysqli_fetch_assoc($res_resched);
    if(isset($row['remark_resched'])){
        $remark = $row['remark_resched'];
    return $remark;
       
    }
    return "none";
  }
?>