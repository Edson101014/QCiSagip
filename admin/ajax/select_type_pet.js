$(document).ready(function(){

   $('#pet-type').change(function(){

      var pet_type = $('#pet-type').val();

      $('#pet-breed').load('./php/select-ajax/type_breed.php', {
         pet_type: pet_type,

      });


      $('#pet-blood-type').load('./php/select-ajax/type_blood.php',{
         pet_type: pet_type,
      });
      
   });

});