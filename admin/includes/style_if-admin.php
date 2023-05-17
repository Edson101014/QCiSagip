
<style>
   <?php if($user_type == 'super admin') { ?>

      main{
         /* background-image: url("../assets/bg's/5.png");
         background-repeat: repeat;
         background-size: cover;
         background-position: center; */
         background-color: rgb(248, 237, 237);
      }

    
      .nav-link {
         display: flex;
      }

     
   <?php } else { ?>

      main{
         background-image: url("../assets/bg's/2.png");
         background-repeat: repeat;
         background-size: cover;
         background-position: center;
         background-color: rgb(248, 237, 237);
      }

      .nav-link.admins-icon {
         display: none;
      }

      .nav-link.activity-icon {
         display: none;
      }

      .nav-link.archive-icon{
         display: none;
      }

      
   <?php } ?>
</style>