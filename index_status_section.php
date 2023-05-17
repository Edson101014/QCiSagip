<?php 
  include "./db/db_con.php";

    // fetch available dogs
    $sql_dogs = "SELECT p.pet_id 
                 FROM pet_details p 
                 JOIN pet_status s 
                 ON p.pet_id = s.pet_id 
                 WHERE p.pet_species = 'dog' 
                 AND s.status = 'available'";
    $result_dogs = mysqli_query($conn, $sql_dogs);
    $count_dogs = mysqli_num_rows($result_dogs);
    
    // fetch available cats
    $sql_cats = "SELECT p.pet_id 
                 FROM pet_details p 
                 JOIN pet_status s 
                 ON p.pet_id = s.pet_id 
                 WHERE p.pet_species = 'cat' 
                 AND s.status = 'available'";
    $result_cats = mysqli_query($conn, $sql_cats);
    $count_cats = mysqli_num_rows($result_cats);

  // fetch count of adopted pets
  $sql_adopted = "SELECT COUNT(*) FROM pet_status WHERE status = 'adopted'";
  $result_adopted = mysqli_query($conn, $sql_adopted);
  $count_adopted = mysqli_fetch_row($result_adopted)[0];

?>
