const addModalAdmin = document.getElementById('add-admin-modal');
const viewModalAdmin = document.getElementById('view-admin-modal');

const btnAddAdmin = document.querySelector('.btn-add-admin')
const btnCancelModal = document.querySelector('.admin-cancel-btn');
const btnViewAdmin = document.querySelectorAll('.view-admin-btn');
const btnCloseModal = document.querySelector('.close-admin-modal');


// ADD NEW ADMIN MODAL EVENT LISTENER
btnAddAdmin.addEventListener('click', (e)=>{
   addModalAdmin.classList.add('displayAddAdminModal');
});

btnCancelModal.addEventListener('click', (e)=>{

   addModalAdmin.classList.remove('displayAddAdminModal');

});


// VIEW ADMIN INFO MODAL EVENT LISTERNER
for(let i = 0; i < btnViewAdmin.length; i++){
   
   btnViewAdmin[i].addEventListener('click', (e)=>{
      viewModalAdmin.classList.add('displayViewAdminModal');
   });
}


// btnCloseModal.addEventListener('click', (e) =>{
//    viewModalAdmin.classList.remove('displayViewAdminModal');
// })

