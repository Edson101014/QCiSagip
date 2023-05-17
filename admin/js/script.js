// SIDE NAVIGATION LINKS
const navLinks = document.querySelectorAll('.nav-link');
const navLinkName = document.querySelectorAll('.link-name');
const iconsLink = document.querySelectorAll('.icon');


const account = document.querySelector('.my-name');
const accBox = document.querySelector('.account-menu');

const wmy = document.querySelectorAll('.wmy');




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


account.addEventListener('click', (e)=>{
   // accBox.classList.add('accIsDisplay');
   

   if(accBox.style.display === 'block'){
      accBox.style.display = 'none';
   }
   else{
      accBox.style.display = 'block';
   }
});



for(let i = 0; i < wmy.length; i++){
   wmy[i].addEventListener('click', (e)=>{
      for(let j = 0; j < wmy.length; j++) {
         if (j !== i){
            wmy[j].classList.remove('wmySelected');
         }
         else{
            
            wmy[j].classList.add('wmySelected');
            // console.log(containers[j])
         }
      }
   });
}
