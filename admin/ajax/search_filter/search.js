$(document).ready(function(){
    
    $('#approve-appl-search').keyup(function(){
        
        let appl_approve = $(this).val();
        
        $('#appl-item-container').load('./php/pagination_approved_appl.php',{
            appl_approve: appl_approve,
        })
        
        
    });
    
    
    //  $('#trans-appl-search').keyup(function(){
        
    //     let search = $(this).val();
        
    //     $('#f-int-item-container').load('./php/pagination_approved_appl.php',{
    //         search: search,
    //     })
        
        
    // });
    
         $('#user-search').keyup(function(){
        
        let search = $(this).val();
        
        $('#user-item-container').load('./php/pagination_users.php',{
            search: search,
        })
        
        
    });
    
     $('#admin-search').keyup(function(){
        
        let search = $(this).val();
        
        $('#admin-item-display').load('./php/pagination_admin.php',{
            search: search,
        })
        
        
    });
    
        $('#ser-search').keyup(function(){
        
        let search = $(this).val();
        
        // console.log(search);
        
        $('#applicant-item-container').load('./php/pagination_services.php',{
            search: search,
        })
        
        
    });
    
     $('#trans-appl-search').keyup(function(){
        
        let search = $(this).val();
        
        $('#f-int-item-container').load('./php/pagination_transaction.php',{
            search: search,
        })
        
        
    });
    
     $('#report-search').keyup(function(){
        
        let search = $(this).val();
        
        $('#report-item-display').load('./php/pagination_report.php',{
            search: search,
        })
        
        
    });
    
     $('#pet-search').keyup(function(){
        
        let search = $(this).val();
        
        $('#pets-item-display').load('./php/pagination_pets.php',{
            search: search,
        })
        
        
    });
    
     $('#adopted-search').keyup(function(){
        
        let search = $(this).val();
        
        $('#adopted-pet-item-container').load('./php/pagination_adopted.php',{
            search: search,
        })
        
        
    });
    
});