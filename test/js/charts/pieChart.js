const pieChart = document.getElementById('pieChart');

new Chart(pieChart, {
   type: 'doughnut',
   data: {
      labels: [
         'Red',
         'Blue',
         'Yellow'
       ],
       datasets: [{
         label: 'My First Dataset',
         data: [300, 50, 100],
         backgroundColor: [
            'rgba(255, 99, 132, .8)',
            'rgba(54, 162, 235, .8)',
            'rgba(255, 205, 86, .8)'
         ],
         borderColor: '#fff',
         // borderColor: [
         //    'rgb(255, 99, 132)',
         //    'rgb(54, 162, 235)',
         //    'rgb(255, 205, 86)'
         // ],
         hoverOffset: 1
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