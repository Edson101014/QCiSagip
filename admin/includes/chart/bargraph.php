<?php
    include "./includes/db_con.php";

    // Retrieve the data from the database
    $sql_services = "SELECT DATE_FORMAT(schedule, '%b') AS month, COUNT(*) AS count FROM services_transaction GROUP BY MONTH(schedule)";
    $result_services = $conn->query($sql_services);
    $services_data = array_fill(0, 12, 0);
    
    $year = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    
    while ($row = $result_services->fetch_assoc()) {
       $month = array_search($row['month'], $year);
       $services_data[$month] = $row['count']; 
    }
    
    
    $conn->close();
?>

<script>
   const year = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']

   const barGraph = document.getElementById('barGraph');
   
   new Chart(barGraph, {
      type: 'bar',
      data: {
         labels: year,
         datasets: [{
            label: "Applicant's Request for Services (Deworming, Anti-Rabies, Spaying/Neutering)",
            data: <?=json_encode($services_data)?>,
            borderWidth: 1,
            borderColor: 'rgb(235, 147, 147)',
            backgroundColor: 'rgb(235, 147, 147)',
            hoverBackgroundColor: 'rgb(204, 126, 126)'
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