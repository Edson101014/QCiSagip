<?php
    include "../db/db_con.php";
    // include "../admin/includes/select_all.php";
    error_reporting(0);



    $search = $_POST['search'];
    $sex = $_POST['Sex'];
    $type = $_POST['Type'];
    $breed = $_POST['Breed'];
    $color = $_POST['color'];
    $pet_char = $_POST['char'];

    $dogBreeds = array("Aspin", "Beagle", "Belgian Malinois", "Bichon Frise", "Chihuahua", "Chow Chow", "Dalmatian", "Doberman Pinscher", "English Bulldog", "French Bulldog", "German Shepherd", "Golden Retriever", "Great Dane", "Jack Russell Terrier", "Japanese Spitz", "Labrador Retriever", "Miniature Pinscher", "Pomeranian", "Poodle", "Pug", "Rottweiler", "Saint Bernard", "Shar Pei", "Shih Tzu", "Siberian Husky", "Welsh Corgi");

    $catBreeds = array("American Curl", "American Shorthair", "British Shorthair", "Bengal Cat", "Exotic Shorthair", "Persian Cat", "Puspins", "Siamese Cat", "Russian Blue");


    // query
    $sql = "SELECT DISTINCT a.pet_id, a.*, b.*, c.*, TIMESTAMPDIFF(year, a.pet_bdate, CURDATE()) as `pet_age_yr`, TIMESTAMPDIFF(month, a.pet_bdate, CURDATE()) as `pet_age_mos`, TIMESTAMPDIFF(day, a.pet_bdate, CURDATE()) as `pet_age_day` FROM `pet_details` a JOIN `pet_status` b ON b.pet_id = a.pet_id JOIN `pet_story` c ON c.pet_id = a.pet_id JOIN `pet_characteristics` d ON d.pet_id = a.pet_id WHERE b.status = 'available'";






    // if(!empty($_POST['search'])){

    //     $search = mysqli_real_escape_string($conn, $_POST['search']);

    //     $sql .= " AND (a.pet_name LIKE '%{$search}%' OR a.pet_species LIKE '%{$search}%' OR a.pet_gender = '{$search}')";

    // }



    // Check if a species filter was provided and add it to the query
    if (!empty($_POST['Type'])) {

        $type = mysqli_real_escape_string($conn, $_POST['Type']);
        $sql .= " AND a.pet_species = '{$type}'";
        
        // Check if a breed filter was provided and add it to the query
        if (!empty($_POST['Breed'])) {
            $breed = mysqli_real_escape_string($conn, $_POST['Breed']);
            $sql .= " AND a.pet_breed = '{$breed}'";
        }
        
        // Check if a gender filter was provided and add it to the query
        if (!empty($_POST['Sex'])) {
            $sex = mysqli_real_escape_string($conn, $_POST['Sex']);
            $sql .= " AND a.pet_gender = '{$sex}'";
        }
        
        // Check if a color filter was provided and add it to the query
        if (!empty($_POST['color'])) {
            $color = mysqli_real_escape_string($conn, $_POST['color']);
            $sql .= " AND a.pet_color = '{$color}'";
        }

        if(!empty($_POST['search'])){

            $search = mysqli_real_escape_string($conn, $_POST['search']);
    
            $sql .= " AND (a.pet_name LIKE '%{$search}%' OR a.pet_species LIKE '%{$search}%' OR a.pet_gender = '{$search}')";
    
        }

        if(!empty($_POST['char'])) {
      
            $sql .= " AND (";
      
            $first = true;
      
            foreach ($pet_char as $key => $value) {

                $value = mysqli_real_escape_string($conn, $value);

                if (!$first) $sql .= " OR ";
        
                $first = false;
        
                $sql .= "d.pet_char = {$value}";
            }

            $sql .= ") ";
    
        }

    }

    else {

        // If no species filter was provided, add the other filters to the query
        if (!empty($_POST['search'])) {
            $search = mysqli_real_escape_string($conn, $_POST['search']);

            $sql .= " AND (a.pet_name LIKE '%{$search}%' OR a.pet_species LIKE '%{$search}%' OR a.pet_gender = '{$search}')";
        }
        
        if (!empty($_POST['breed'])) {

            $breed = mysqli_real_escape_string($conn, $_POST['breed']);

            if (in_array($breed, $dogBreeds)) {
                $sql .= " AND a.pet_species = 'Dog'";
                $sql .= " AND a.pet_breed = '{$breed}'";
            }
            else if (in_array($breed, $catBreeds)) {
                $sql .= " AND a.pet_species = 'Cat'";
                $sql .= " AND a.pet_breed = '{$breed}'";
            }
            else {
                $sql .= " AND a.pet_breed = '{$breed}'";
            }
            
            // if the breed is in catBreeds and the pet species is currently dog, update the query to change the pet species to cat
            if (in_array($breed, $catBreeds) && $type == 'Dog') {
                $sql = str_replace("a.pet_species = 'Dog'", "a.pet_species = 'Cat'", $sql);
            }
        }
        
        if (!empty($_POST['Sex'])) {
            $sex = mysqli_real_escape_string($conn, $_POST['Sex']);
            $sql .= " AND a.pet_gender = '{$sex}'";
        }
        
        if (!empty($_POST['color'])) {
            $color = mysqli_real_escape_string($conn, $_POST['color']);
            $sql .= " AND a.pet_color = '{$color}'";
        }

        if(!empty($_POST['char'])) {
      
            $sql .= " AND (";
      
            $first = true;
      
            foreach ($pet_char as $key => $value) {

                $value = mysqli_real_escape_string($conn, $value);

                if (!$first) $sql .= " OR ";
        
                $first = false;
        
                $sql .= "d.pet_char = {$value}";
            }

            $sql .= ") ";
    
        }

    }

    $sql .= " ORDER BY b.id DESC";
    
    // echo $sql;

    $res_pet_query = mysqli_query($conn, $sql);
    
    
    if (mysqli_num_rows($res_pet_query) > 0) {
    
        while ($row = mysqli_fetch_assoc($res_pet_query)) {
    
            $image_url = $row['pet_image'];
            $pet_id = $row['pet_id'];
            $pet_name = $row['pet_name'];
    
            if ($row['pet_age_yr'] != 0) {
                $pet_age = $row['pet_age_yr'];
                $pet_age = "$pet_age year/s old";
            } else if ($row['pet_age_mos'] != 0) {
                $pet_age = $row['pet_age_mos'];
                $pet_age = "$pet_age month/s old";
            } else {
                $pet_age = $row['pet_age_day'];
                $pet_age = "$pet_age day/s old";
            }
    
            ?>
            <div class="pet-card">
                <a href="./adoptDetail.php?id=<?=$pet_id?>">
                    <img src="./pets_image/<?=$image_url?>" alt="">
                </a>
                <div class="pet-desc">
                        <div>
                            <?php echo "<span class='pet-name'>" .$pet_name. "</span>";?>
                            <?php echo "<span class='pet-age'>" . $pet_age . "</span> <br>";?>
                            <?php echo "<span class='pet-gender'>"  . $row['pet_gender'] . "</span>";?>
                        </div>
                    <div>
                        <a href="./adoptDetail.php?id=<?=$pet_id?>">
                            <?php echo "<img src='assets/adopt-logo.png' alt='Logo' />";?>
                        </a>
                    </div>
                </div> 
            </div>
            <?php
        }
    } else { ?>
        <div class="no-found">

          <p> No search results found. </p>

        </div>
    <?php }
    





?>