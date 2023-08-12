const year = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']

const barGraph = document.getElementById('barGraph');

new Chart(barGraph, {
   type: 'bar',
   data: {
      labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
      datasets: [{
         label: '# of Votes',
         data: [ 50, 24, 80, 100, 32, 43, 9, 20, 10, 60, 1, 40],
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