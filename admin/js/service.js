var serviceSubLinks = document.querySelectorAll('.services-sub-link');
var subServices = document.querySelectorAll('.sub-services');


for(let i = 0; i < serviceSubLinks.length; i++){
   serviceSubLinks[i].addEventListener('click', (e) =>{
      for(let j = 0; j < serviceSubLinks.length; j++) {
         if (j !== i){
            subServices[j].classList.remove('sub-services-display');
            serviceSubLinks[j].classList.remove('services-selected');
            
         }
         else{
            subServices[j].classList.add('sub-services-display');
            serviceSubLinks[j].classList.add('services-selected');
            // console.log(subServices[j]);
         }
      }
   });
}

$('#se-title').on('input', function() {
   var sanitized = $(this).val().replace(/[^a-zA-Z0-9\s]/g, '');
   $(this).val(sanitized);
 });