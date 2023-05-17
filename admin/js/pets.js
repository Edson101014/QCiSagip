var petsSubLinks = document.querySelectorAll('.pets-sub-link');
var subPets = document.querySelectorAll('.sub-pets');


for(let i = 0; i < petsSubLinks.length; i++){
   petsSubLinks[i].addEventListener('click', (e) =>{
      for(let j = 0; j < petsSubLinks.length; j++) {
         if (j !== i){
            subPets[j].classList.remove('sub-pets-display');
            petsSubLinks[j].classList.remove('pets-selected');
            
         }
         else{
            subPets[j].classList.add('sub-pets-display');
            petsSubLinks[j].classList.add('pets-selected');
            // console.log(subServices[j]);
         }
      }
   });
}