<?php
    include "./includes/db_con.php";

    // Retrieve the data from the database
    $sql = 'SELECT COUNT(*) as count FROM pet_details 
            INNER JOIN pet_status ON pet_details.pet_id = pet_status.pet_id 
            WHERE pet_details.pet_species = "cat" AND pet_status.status = "available"';
    $result_cats = $conn->query($sql);
    $cat_total = $result_cats->fetch_assoc();
    
    $sql = 'SELECT COUNT(*) as count FROM pet_details 
            INNER JOIN pet_status ON pet_details.pet_id = pet_status.pet_id 
            WHERE pet_details.pet_species = "dog" AND pet_status.status = "available"';
    $result_dogs = $conn->query($sql);
    $dog_total = $result_dogs->fetch_assoc();
    
    
    $conn->close();
?>

<script>
   const doughnutChart = document.getElementById('doughnutChart');
   
   new Chart(doughnutChart, {
      type: 'polarArea',
      data: {
         labels: [
            'Cats',
            'Dogs',
          ],
          datasets: [{
            label: 'Pet Species',
            data: [
               <?=$cat_total['count']?>,
               <?=$dog_total['count']?>
            ],
            backgroundColor: [
              'rgb(255, 99, 132)',
              'rgb(54, 162, 235)',
            ],
            hoverOffset: 4
          }]
      },
      options: {
         plugins: {
            legend: {
               position: 'left',
            }
         }
      }
   });
</script>