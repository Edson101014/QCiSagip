$(document).ready(function(){

   
      $('#admin-old-pass').keyup(function(){

         let oldPass = $('#admin-old-pass').val();

         $('#old-pass-mess').load('./ajax/process/old_pass.php', {

            oldPass: oldPass,
         
         })

      });

      $('#admin-new-pass').keyup(function(){

         let oldPass = $('#admin-old-pass').val();
         let newPass = $('#admin-new-pass').val();

         $('#new-pass-mess').load('./ajax/process/new_pass.php', {

            oldPass: oldPass,
            newPass: newPass
         
         })

      });


      $('#admin-con-pass').keyup(function(){

         let conPass = $('#admin-con-pass').val();
         let newPass = $('#admin-new-pass').val();

         $('#con-pass-mess').load('./ajax/process/con_pass.php', {

            conPass: conPass,
            newPass: newPass
         
         });


      });



});