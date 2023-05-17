<?php
    include "./includes/db_con.php";

    // Retrieve the data from the database
    $sql = 'SELECT COUNT(*) as count, MONTH(datetime) as month FROM adoption_transaction GROUP BY MONTH(datetime)';
    $result = $conn->query($sql);
    
    $labels = [];
    $data = [];

    while ($row = $result->fetch_assoc()) {
        $month = date('M', mktime(0, 0, 0, $row['month'], 1));
        $labels[] = $month;
        $data[] = $row['count'];
    }

    $conn->close();
?>

<script>
   const lineChart = document.getElementById('lineChart');
   
   new Chart(lineChart, {
      type: 'line',
      data: {
         labels: <?php echo json_encode($labels); ?>,
         datasets: [{
            label: "Applicant's Request for Adoption",
            data: <?php echo json_encode($data); ?>,
            // tension: 0,
            borderColor: 'rgba(235, 147, 147, 1)',
            backgroundColor: 'rgba(235, 147, 147, 1)'
         }]
      },
      options: {
         scales: {
            y: {
               beginAtZero: true
            },
            x: {
               beginAtZero: true
            }
         }
      }
   });
</script>