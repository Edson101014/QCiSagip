$(document).ready(function(){

   $("#btn_add_admin").click(function(){

      var btn_admin = $("#btn_add_admin").val();
      var email = $("#e-mail").val();
      var admin_type = $("#admin-type").val();

      

      if(email != '' && admin_type != ''){

         $("#admin-item-display").load('./php/insert_admin.php',{
            
            btn_admin:btn_admin,
            email:email,
            admin_type:admin_type,
   
         });

      } else {

         alert('fill up first');

      }


      // if (email === '' && admin_type === ''){

      //    alert('fill up first');

      // } else {
         
      //    $("#admin-item-display").load('./php/insert_admin.php',{
   
      //       btn_admin:btn_admin,
      //       email:email,
      //       admin_type:admin_type,
   
      //    });
         
      // }

      

   });


   load_data()
   function load_data(page){
      $.ajax({
         url: "./php/pagination_admin.php",
         method: "POST",
         data: {page:page},
         success: function(data){
            $("#admin-item-display").html(data);
         }
      })
   }

   $(document).on('click', '.pagination_link', function(){
      var page = $(this).attr("id");
      load_data(page);
   });

});