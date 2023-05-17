<?php
   
   include "../includes/db_con.php";
   include "../includes/date_today.php";
   include '../function/image_function.php';

   $title = $_POST['announcement-title'];
   // $content_id = strtoupper(substr(uniqid(), 0, 13) . bin2hex(random_bytes(1)));
   $imgAdded = $_FILES['ann_img'];
   $img_name = $_FILES['ann_img']['name'];
   $img_tmp_name = $_FILES['ann_img']['tmp_name'];
   $img_tmp_error = $_FILES['ann_img']['error'];

   $path = "../../contents";



   foreach ($img_name as $key => $value) {

      $content_id = strtoupper(substr(uniqid(), 0, 13) . bin2hex(random_bytes(1)));

      $imgName = add_image($path, $img_name[$key], $img_tmp_name[$key], $img_tmp_error[$key], $content_id);

      $ins = "INSERT INTO `cms_announcement`(`content_id`, `img_name`, `date_added`) VALUES ('$content_id','$imgName','$date_today')";

      $res = mysqli_query($conn, $ins);
   } 

  ?>
  <script>
   window.location.href = "./index.php";
  </script>
  <?php 
   
   
   

?>