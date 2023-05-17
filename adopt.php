<?php
include "./db/db_con.php";
include "./admin/includes/select_all.php";



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include_once('head.php');
  ?>
  <link rel="stylesheet" href="css/adopt.css" />
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="js/adopt.js"></script>
</head>

<body>
  <?php
  include_once('navigation.php');
  ?>



<div class="filter">

  <form id="char-form">

    <div class="search">
      <input type="text" name="search" id="search" placeholder="Dogs, Cat, Others, Gender..." onkeyup="searchPets()" />
    </div>
    
    <div class="sort">

      <div class="filters">
        <h4>FILTERS</h4>
        <select class="select-input" name="Type" id="Type">
          <option value="0">Type</option>
          <option value="Dog">Dog</option>
          <option value="Cat">Cat</option>
        </select>

        <select class="select-input" name="Breed" id="Breed">
          <option value="0">Breed</option>
          <option value="American Curl">American Curl</option>
          <option value="American Shorthair">American Shorthair</option>
          <option value="Aspin">Aspin</option>
          <option value="Bengal cat">Bengal cat</option>
          <option value="Beagle">Beagle</option>
          <option value="Belgian Malinois">Belgian Malinois</option>
          <option value="Bichon Frise">Bichon Frise</option>
          <option value="Chihuahua">Chihuahua</option>
          <option value="Chow Chow">Chow Chow</option>
          <option value="Dalmatian">Dalmatian</option>
          <option value="Doberman Pinscher">Doberman Pinscher</option>
          <option value="English Bulldog">English Bulldog</option>
          <option value="Exotic Shorthair">Exotic Shorthair</option>
          <option value="French Bulldog">French Bulldog</option>
          <option value="German Shepherd">German Shepherd</option>
          <option value="Golden Retriever">Golden Retriever</option>
          <option value="Great Dane">Great Dane</option>
          <option value="Jack Russell Terrier">Jack Russell Terrier</option>
          <option value="Japanese Spitz">Japanese Spitz</option>
          <option value="Labrador Retriever">Labrador Retriever</option>
          <option value="Miniature Pinscher">Miniature Pinscher</option>
          <option value="Persian cat">Persian cat</option>
          <option value="Pomeranian">Pomeranian</option>
          <option value="Poodle">Poodle</option>
          <option value="Pug">Pug</option>
          <option value="Puspins">Puspins</option>
          <option value="Rottweiler">Rottweiler</option>
          <option value="Russian Blue">Russian Blue</option>
          <option value="Saint Bernard">Saint Bernard</option>
          <option value="Shar Pei">Shar Pei</option>
          <option value="Shih Tzu">Shih Tzu</option>
          <option value="Siamese cat">Siamese cat</option>
          <option value="Siberian Husky">Siberian Husky</option>
          <option value="Welsh Corgi">Welsh Corgi</option>
         

        </select>

        <select class="select-input" name="color" id="color">
          <option value="0">Color</option>
          <option value="Brown">Brown</option>
          <option value="White">White</option>
          <option value="Black">Black</option>
        </select>

        <select class="select-input"  name="Sex" id="Sex">
          <option value="0">Sex</option>
          <option value="Male">Male</option>
          <option value="Female">Female</option>
        </select>
      </div>

      
      <div class="behavior">

        <h4>BEHAVIORAL CHARACTERISTICS</h4>

          <div>

            <?php
              $sel_char = "SELECT * FROM `characteristics`";
              $res_char = mysqli_query($conn, $sel_char);

              if(mysqli_num_rows($res_char) > 0){
                while($char = mysqli_fetch_assoc($res_char)) {?> 
                
                  <div class="form-input-check">
                    <input type="checkbox" name="char[]" id="<?=$char['id']?>" value="<?=$char['id']?>" class="pet-char" hidden>
                    <label for="<?=$char['id']?>"> <?=$char['characteristic']?></label>
                  </div>

                <?php }

              } else {

                echo "No characteristics";
              }
            ?>
         
          </div>
        
      </div>

     
    </div>
  
  </form>

  
  <div class="pet-gallery">

    <?php 
      if(mysqli_num_rows($res_pet_query) > 0 ) {
        while ($row = mysqli_fetch_assoc($res_pet_query)) {
            $image_url = $row['pet_image'];
            $pet_id = $row['pet_id'];
            $pet_name = $row['pet_name'];
            
            if($row['pet_age_yr'] != 0){

              $pet_age = $row['pet_age_yr'];
              $pet_age = "$pet_age year/s old";
              
            }
            else if($row['pet_age_mos'] != 0) {
              
               $pet_age = $row['pet_age_mos'];
               $pet_age = "$pet_age month/s old";
               
            }
            else {
               $pet_age = $row['pet_age_day'];
               $pet_age = "$pet_age day/s old";
            }

            ?>
              <div class="pet-card">
                <a href="./adoptDetail.php?id=<?=$pet_id?>">
                    <img src="./pets_image/<?=$row['pet_image']?>" alt="">
                </a>
                <img src="./pets_image/<?=$row['pet_image']?>" alt="Missing Pets" />
                <div class="pet-desc">
                  <!--<div>-->
                  <!--  <?php echo "<span class='pet-name'>" .$pet_name. "</span>";?>-->
                  <!--  <?php echo "<span class='pet-age'>" . $pet_age . "</span> <br>";?>-->
                  <!--  <?php echo "<span class='pet-gender'>"  . $row['pet_gender'] . "</span>";?>-->
                  <!--</div>-->
                  
                  <div>
                    <a href="./adoptDetail.php?id=<?=$pet_id?>">
                    <?php echo "<img src='assets/adopt-logo.png' alt='Logo' />";?>
                    </a>
                  </div>
                </div> 
              </div>

      <?php  }
      } else { ?>

        <div class="no-found">

          <p> No search results found. </p>

        </div>

      <?php }
    ?>

  </div>
</div>

    <?php
  include_once('footer.php')
?>
  </body>
</html>