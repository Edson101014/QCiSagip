// SIDE NAVIGATION LINKS
const navLinks = document.querySelectorAll('.nav-link');
const navLinkName = document.querySelectorAll('.link-name');
const iconsLink = document.querySelectorAll('.icon');

// CONTENT CONTAINER
const containers = document.querySelectorAll('.container');

for(let i = 0; i < navLinks.length; i++){
   navLinks[i].addEventListener('mouseenter', (e) =>{
      navLinkName[i].style.display = 'flex'

      navLinks[i].addEventListener('mouseleave', (e) =>{
         navLinkName[i].style.display = 'none'
      })
   })

   navLinks[i].addEventListener('click', (e) =>{
      for(let j = 0; j < navLinks.length; j++) {
         if (j !== i){
           
            iconsLink[j].classList.remove('isSelected');
            containers[j].classList.remove('isDisplay');
         }
         else{
            
            iconsLink[j].classList.add('isSelected');
            containers[j].classList.add('isDisplay');
            // console.log(containers[j])
         }
      }
   })

  
}