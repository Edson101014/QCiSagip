<script>

   const month= ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']

   const lineChartReport = document.querySelectorAll('.reportLineGraph');
   
   new Chart(lineChartReport, {
      type: 'line',
      data: {
         labels: month,
         datasets: [{
            label: "Sample data",
            data: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 1],
            // tension: 0,
            borderColor: 'rgba(235, 147, 147, 1)',
            backgroundColor: 'rgba(235, 147, 147, 1)'
         }]
      },
      options: {
         maintainAspectRatio: false,
         scales: {
            y: {
               beginAtZero: true
            },
         
         },
        
      }
   });
</script>