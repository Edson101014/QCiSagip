$(document).ready(function(){

   load_data();
   
   function load_data(page) {

      $.ajax({
         url: "./php/approved_application.php",
         method: "POST",
         data: {

            page:page

         },
         success: function(data){

            $('.appl-item-container').html(data);

         }
      })
   }

   $(document).on('click', '.pagination_link', function(){

      var page = $(this).attr("id");

      load_data(page);

   });

});
