<?php
  include "./db/db_con.php";
  
  function BanDecline($userid, $status){
      
      include "./db/db_con.php";
      
      if($status == "declined"){
      
      $sql_ban = "UPDATE user_details SET ban_days='15' WHERE user_id= '$userid'";
      mysqli_query($conn, $sql_ban);
      return "success";
      }else{
          
          return "failed";
      }
  
      
  }
  
  function CheckBan($userid){
      
       include "./db/db_con.php";
       
       $sql_ban = "SELECT ban_days FROM user_details WHERE user_id='$userid'";
       $res_ban = mysqli_query($conn, $sql_ban);
     
       
       try{
            if (mysqli_num_rows($res_ban) == 1) {
             $row_ban = mysqli_fetch_assoc($res_ban);
             $ban = $row_ban["ban_days"];
             if($ban > 0){
                 return "ban";
             }else{
                 
                 return "not ban";
             }
       }
    } catch (Exception $e) {
        throw new Exception("Error occurred: " . $e->getMessage());
      
      
  }
  
  }
  


?>