const pet_img_input = document.querySelector('.pet-fe-img-class');

var uploaded_img = "";

pet_img_input.addEventListener("change", function(){

  const reader = new FileReader();

  reader.addEventListener("load", () => {
      const display_img = document.querySelector("#display_image")
      uploaded_img = reader.result;
      display_img.style.backgroundImage = 'url(' + uploaded_img + ')';
   });

   reader.readAsDataURL(this.files[0]);

})