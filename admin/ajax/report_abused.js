$(document).ready(function (){
   load_data()
   function load_data(page){
      $.ajax({
         url: "./php/pagination_report.php",
         method: "POST",
         data: {page:page},
         success: function(data){
            $("#report-item-display").html(data);
         }
      })
   }

   $(document).on('click', '.pagination_link', function(){
      var page = $(this).attr("id");
      load_data(page);
   });
});



$(document).ready(function(){
   $('#sort-by-report').change(function(){

      var sort_by_report = $('#sort-by-report').val();

      $('#report-item-display').load('./php/sort_report.php',{

         sort_by_report: sort_by_report,

      });
   
   });

});