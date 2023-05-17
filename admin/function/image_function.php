<?php


function add_image($path, $img_name, $img_tmp_name, $img_tmp_error, $ext_file_name){

   if($img_tmp_error === 0) {
         
      $img_ext = pathinfo($img_name, PATHINFO_EXTENSION);

      $img_ext_lc = strtolower($img_ext);

      $allowed_ext = array("jpg","jpeg","png");

      if(in_array($img_ext_lc, $allowed_ext)) {

         $new_img_name = uniqid("$ext_file_name").'.'.$img_ext_lc;

         $img_path = "$path/".$new_img_name;

         move_uploaded_file($img_tmp_name, $img_path);

      }

      return $new_img_name;
   }

 
}

?>