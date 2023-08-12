<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>

   <!-- AJAX -->
   <script src="http://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
   
</head>
<body>

   <form id="form-submit" enctype="multipart/form-data" >

      <div class="checkboxes">
         
         <div class="form-checkbox">
            <label for="cuddle"> Cuddle </label>
            <input type="checkbox" name="characteristics[]" id="cuddle" value="Cuddle">
         </div>
      
         <div class="form-checkbox">
            <label for="kid-compatible"> Kid Compatible </label>
            <input type="checkbox" name="characteristics[]" id="kid-compatible" value="Kid Compatible">
         </div>

         <div class="form-checkbox">
            <label for="cat-compatible"> Cat Compatible </label>
            <input type="checkbox" name="characteristics[]" id="cat-compatible" value="Cat Compatible">
         </div>
      </div>

      <div class="file">
         <input type="file" name="image" id="image" accept="image/*">
      </div>

      <div class="button">
         <input type="submit" value="save" id="save-btn" name="save-btn">
      </div>

   </form>

   <div id="message">

   </div>
   
</body>
</html>


<script>

</script>

<script>
$(document).ready(function(){

   $('#form-submit').submit(function(e){

      e.preventDefault(); // Prevent browser default submit.


      const form = $('#form-submit')[0];
      const formData = new FormData(form);

      $.ajax({

         url: "./process.php",
         type: "POST",
         data: formData,
         success: function(data) {

            $('#message').html(data);

         },
         cache: false,
         contentType: false,
         processData: false

      });

   });

});

</script>