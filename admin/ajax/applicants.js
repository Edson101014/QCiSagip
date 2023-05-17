$(document).ready(function(){

      $("button[data-role=view-approved]").click(function(){
         
         $("#modal-appl-view").show();

         var ref_no = $(this).data("ref_no");

         $("#modal-appl-view").load('./php/view_approved_applicants.php',{
            ref_no:ref_no
         });
      });

      $("#view-appl_back").click(function(){

         $("#modal-appl-view").show();

         var ref_no = $(this).data("ref_no");
         // alert(ref_no);

         $("#modal-appl-view").load('./php/view_sched_today.php',{
            ref_no:ref_no
         });

      });

      $("button[data-role=declined]").click(function(){

         
         var ref_no = $(this).data("ref_no");
         // alert(ref_no);
         
         $("#modal-appl-view").show();

         $("#modal-appl-view").load('./php/view_declined_applicants.php',{
            ref_no:ref_no
         });
      });


      $("button[data-role=view-applicants_log]").click(function(){

         
         var ref_no = $(this).data("ref_no");
         // alert(ref_no);
         
         $("#modal-appl-view").show();

         $("#modal-appl-view").load('./php/view_application_logs.php',{
            ref_no:ref_no
         });
      });

      

});