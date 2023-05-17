var applSubLinks = document.querySelectorAll('.sub-link');
var subApplications = document.querySelectorAll('.sub-application');


for(let i = 0; i < applSubLinks.length; i++){
   applSubLinks[i].addEventListener('click', (e) =>{
      for(let j = 0; j < applSubLinks.length; j++) {
         if (j !== i){
            subApplications[j].classList.remove('sub-display');
            applSubLinks[j].classList.remove('appl-selected');
            
         }
         else{
            subApplications[j].classList.add('sub-display');
            applSubLinks[j].classList.add('appl-selected');
            // console.log(subApplications[j]);
         }
      }
   });
}