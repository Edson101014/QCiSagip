$(document).ready(function(){

   $('.content').html('<h1 class="report-message"> Choose what type of report and date range.</h1>');

   $('#rep-type').change(function(){

      let repType = $(this).val();
      
      

      if(repType != "") {
         
         // $('#print-btn').attr('disabled', false);
         $('#rep-date_range').attr('disabled', false);

         $('#rep-date_range').change(function(){

            let dateRange = $(this).val();

            if(dateRange != ""){

               $('#print-btn').attr('disabled', false);

               $('.content').load('./ajax/process/adoption_report.php', {
                  repType: repType, 
                  dateRange: dateRange, 
         
               })

            } else {

               $('#print-btn').attr('disabled', true);
               $('.content').html('<h1 class="report-message"> Choose date range. </h1>');
               
            }

         });

      } else {

         $('#rep-date_range').attr('disabled', true);
         $('#print-btn').attr('disabled', true);

         $('.content').html('<h1 class="report-message"> Choose what type of report and date range. </h1>');

      }

      let dateRange = $('#rep-date_range').val();

      if(dateRange != ""){

         $('.content').load('./ajax/process/adoption_report.php', {
            repType: repType, 
            dateRange: dateRange, 
   
         })
         
      } else {

         $('.content').html('<h1 class="report-message"> Choose what type of report and date range. </h1>');
         
      }




     

   });


   $('#print-btn').click(function(){

      let repType = $('#rep-type').val();
      let repDateRange = $('#rep-date_range').val();

      $('#print-btn').attr('target', '_blank');
      window.location.href="./process/print_report.php?type=" + repType + "&dateRange=" + repDateRange;

   });


   // $('#rep-to-date').change(function(){
   //    let repType = $('#rep-type').val();
   //    let repDateRange = $('#rep-date_range').val();

   //    $('.content').load('./ajax/process/adoption_report.php', {
   //       repType: repType, 
   //       repDateRange: repDateRange, 

   //    })

   // });

   // $('#rep-from-date').change(function(){
   //    let repType = $('#rep-type').val();
   //    let fromDate = $('#rep-from-date').val();
   //    let toDate = $('#rep-to-date').val();

   //    if(fromDate <= toDate){

   //       // $('#generate-btn').attr('disabled', false);
   //       $('.content').html("<span> </span>");
   //       $('#rep-from-date').css('outline', 'none');

   //       if(fromDate != '' && toDate != ''){

   //          $('.content').load('./ajax/process/adoption_report.php', {
   //             repType: repType, 
   //             fromDate: fromDate, 
   //             toDate: toDate, 
      
   //          })
   
   //       } else {
   
   //          $('.content').html('<span> Select date range first. </span>');
   
   //       }

   //    } else {

   //       $('#rep-from-date').css('outline', '1px solid red');
   //       // $('#generate-btn').attr('disabled', true);

   //       $('.content').html("<span> Invalid date range selection </span>");
         
   //    }

   // });
   
});