<script>
   const pieChartReport = document.querySelectorAll('.reportPieChart');
   
   new Chart(pieChartReport, {
      type: 'pie',
      data: {
         labels: [
            'Users',
            'Admins',
            'Pets',
            'Adopted Pets'
          ],
          datasets: [{
            label: 'Information',
            data: [
               3, 4, 5, 6,
            ],
            backgroundColor: [
               'rgba(255, 99, 132, .8)',
               'rgba(54, 162, 235, .8)',
               'rgba(255, 205, 86, .8)',
               'rgba(162, 205, 86, .8)'
            ],
            borderColor: '#fff',
            hoverOffset: 1
          }]
      },
      options: {

         // maintainAspectRatio: false,
         plugins: {
            legend: {
               position: 'right',
            }
         }
      }
   });
</script>