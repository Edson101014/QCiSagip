const lineChart = document.getElementById('lineChart');

new Chart(lineChart, {
   type: 'line',
   data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      datasets: [{
         label: '# of Votes',
         data: [ 50, 24, 80, 100, 32, 43, 9, 20, 10, 60, 1, 40],
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