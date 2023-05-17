<?php
//fetch.php;
if(isset($_POST["view"]))
{
    include("../includes/db_con.php");
    if($_POST["view"] != '')
    {
        $update_query = "UPDATE abuse_report SET notification_status = 0 WHERE notification_status = 1";
        mysqli_query($conn, $update_query);
    }
    $query = "SELECT * FROM abuse_report WHERE DATE(datetime) = CURDATE() ORDER BY id DESC";
    $result = mysqli_query($conn, $query);
    $output = '';
    
    if(mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_array($result))
        {
            $date_received = DateTime::createFromFormat('Y-m-d H:i:s', $row["datetime"]);
            $formatted_date = $date_received->format('m/d/Y h:i:s A');
            $formatted_12hr = date('m/d/Y h:i:s A', strtotime($formatted_date));
            
            $output .= '
                <a href="#">
                    <small>New report about <strong><em>' . $row["type_of_report"] . '</strong></em> with report id no. <strong><em>' . $row["report_id"] . '</strong></em></small>
                    <small class="text-muted">Received on: ' . $formatted_12hr . '</small>
                </a>
                <div class="dropdown-divider"></div>
            ';
        }
    }
    else
    {
        $output .= '<a href="#" class="text-bold text-italic">No New Report Found</a>';
    }
    
    $query_1 = "SELECT * FROM abuse_report WHERE notification_status = 1";
    $result_1 = mysqli_query($conn, $query_1);
    $count = mysqli_num_rows($result_1);
    $data = array(
        'notification'   => $output,
        'unseen_notification' => $count
    );
    echo json_encode($data);
}
?>