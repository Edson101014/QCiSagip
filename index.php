<?php 
   // Include the database connection code
   include "./db/db_con.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php

  include_once('head.php');
  ?>
  <link rel="stylesheet" href="css/index.css">

  <!-- Slick for Slider  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
  <?php
  include_once('navigation.php');
  ?>
  <!-- Hero Section -->
  <section class="hero">
    <div class="hero-image">
      <div>
        <img class="image" src="assets/indexhero_1.png" alt="" />
      </div>
      <div>
        <img class="image" src="assets/indexhero_2.png" alt="" />
      </div>
      <div>
        <img class="image" src="assets/indexhero_3.png" alt="" />
      </div>
      <div>
        <img class="image" src="assets/indexhero_4.png" alt="" />
      </div>
      <div>
        <img class="image" src="assets/indexhero_5.png" alt="" />
      </div>
      <div>
        <img class="image" src="assets/indexhero_6.png" alt="" />
      </div>
      <div>
        <img class="image" src="assets/indexhero_7.png" alt="" />
      </div>
    </div>
    <div class="content">
      <h1 class="hero-title">QUEZON CITY ANIMAL CARE & ADOPTION CENTER</h1>
  </section>

  <!-- Description Section  -->
  <section class="qcanimal-desc">
    <div class="qcanimal-desc-header">
    </div>
    <div>
      <p>The Quezon City Government through the city’s Animal Welfare and Rehabilitation Program has established an adoption center for impounded and neglected animals. The 450-square meter pet adoption center in Barangay Payatas can provide temporary homes to up to 60 animals until they find a new family. The facility also has a surgery room for dogs and cats that need to be neutered and spayed, and for other animals that need immediate medical attention. There are two cages to separate sick animals from the healthy ones. This to prevent them from infecting the other healthy animals. The animals will also be rehabilitated before being offered for adoption.This is the first comprehensive approach in rehabilitating animals to find them a new home.</p>
    </div>
  </section>

  <!-- ordinance section  -->
  <section class="ordinance">
    <div class="ordinance-content">
    <div class="video">
      <video controls playsinline autoplay muted loop>
          <?php
           

            // Construct the SQL query to fetch the latest video from the database
            $query = "SELECT * FROM cms_content ORDER BY id DESC LIMIT 1";

            // Execute the SQL query
            $result = mysqli_query($conn, $query);

            // Fetch the video path from the result set
            if ($row = mysqli_fetch_assoc($result)) {
                $video_path = $row['video_content'];
                // echo $video_path;

                // Display the video player with the fetched video path as the source
                echo '<source src="' . $video_path . '" type="video/mp4" />';
            }

            // Close the database connection
            // mysqli_close($conn);
          ?>
      </video>
    </div>
      <div class="ordinance-events">
        <div>
          <h2>Ordinances</h2>
          <div class="ordinance-link">
            <a href="https://drive.google.com/file/d/1OxwK2JT8If_PPgfA0-a2R0xpAn8FBG2u/view" target="_blank">SP-1638, S-2005</a>
            <a href="https://drive.google.com/file/d/1P0i9ZzU6Az7P7CFrkgsMIRQrCTop6dRX/view" target="_blank">SP-2386, S-2014</a>
            <a href="https://drive.google.com/file/d/1P1s0r2T33pf-rvK_KzMAsjrYFRGgYWTx/view" target="_blank">SP-3132, S-2022</a>
          </div>
        </div>
        <div class="events">
          <h2>Announcement & Event</h2>
          <div class="events-image">

            <?php
              $selImg = "SELECT * FROM `cms_announcement` 
              ORDER BY `id` DESC LIMIT 5;";

              $selImages = mysqli_query($conn, $selImg);

              if(mysqli_num_rows($selImages) > 0) {

                while($image = mysqli_fetch_assoc($selImages)){

                  ?>

                    <div>
                      <img src="./contents/<?=$image['img_name']?>" alt="<?=$image['img_name']?>">
                    </div>
                  <?php 

                }

                

              } else {
                ?>

                  <div>
                    <p> No Announcement </p>
                  </div>
                <?php 
              }
            ?>

          </div>




        </div>
      </div>
    </div>

  </section>


  <!-- Services Section -->
  <section class="services">
    <div class="services-header">
      <h2 class="services-header-title">Services</h2>
      <p class="services-header-desc">
        <!-- Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque,
        officia. -->
      </p>
    </div>
    <div class="services-content">
      <div class="services-cards" style="max-width: 370px">
        <h3 class="services-card-title">Deworming</h3>
        <a href="services.php?page=Deworming">
          <div class="services-card-picture" style="max-width: 350px; max-height: 312px">
            <img src="assets/Deworming.png" alt="services-picture" />
            <!-- <a href="services.php?page=Deworming" class="gradient-button button middle-button">
            Learn More
          </a> -->
          </div>
        </a>
        <p class="services-card-desc">
          <!-- Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia,
          nulla! -->
        </p>
      </div>
      <div class="services-cards" style="max-width: 370px">
        <h3 class="services-card-title">Vaccination</h3>
        <a href="services.php?page=Vaccination">

          <div class="services-card-picture" style="max-width: 350px; max-height: 312px">
            <img src="assets/Vaccination.png" alt="services-picture" />
            <!-- <a href="services.php?page=Vaccination" class="gradient-button button middle-button">
            Learn More
          </a> -->
          </div>
        </a>
        <p class="services-card-desc">
          <!-- Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia,
          nulla! -->
        </p>
      </div>
      <div class="services-cards" style="max-width: 370px">
        <h3 class="services-card-title">Spaying/Neutering</h3>
        <a href="services.php?page=Spay and Neuter">

          <div class="services-card-picture" style="max-width: 350px; max-height: 312px">
            <img src="assets/Spaying_Neutering.png" alt="services-picture" />
            <!-- <a href="services.php?page=Spay and Nueter" class="gradient-button button middle-button">
            Learn More
          </a> -->
          </div>
        </a>
        <p class="services-card-desc">
          <!-- Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia,
          nulla! -->
        </p>
      </div>
      <div class="services-cards" style="max-width: 370px">
        <h3 class="services-card-title">Consultation</h3>
        <a href="services.php?page=Consultation">

          <div class="services-card-picture" style="max-width: 350px; max-height: 312px">
            <img src="assets/Consultation.png" alt="services-picture" />
            <!-- <a href="services.php?page=Consultation" class="gradient-button button middle-button">
            Learn More
          </a> -->
          </div>
        </a>
        <p class="services-card-desc">
          <!-- Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quia,
          nulla! -->
        </p>
      </div>
    </div>
  </section>

  <!-- Mobile App Section  -->
  <section class="mobile-app-section">
    <h2>Download our mobile app to report abused and wild animals</h2>
    <a href="app-release.apk" class="button gradient-button">Download</a>
  </section>

  <?php
  include "index_status_section.php";
  ?>
  <!-- Status Section  -->
  <section class="status">
    <h2 class="status-header-title">Pets</h2>
    <div class="status-content">
      <div class="status-cards">
        <span class="status-cards-number"><?php echo $count_dogs ?></span>
        <h2 class="status-cards-name">Dogs</h2>
      </div>
      <div class="status-cards">
        <span class="status-cards-number"><?php echo $count_cats ?></span>
        <h2 class="status-cards-name">Cats</h2>
      </div>
      <div class="status-cards">
        <span class="status-cards-number"><?php echo $count_adopted ?></span>
        <h2 class="status-cards-name">Adopted</h2>
      </div>
    </div>
  </section>

  <!-- FAQs Section -->
  <section class="faqs">
    <div class="faqs-header">
      <h2>FAQs</h2>
    </div>
    <div class="faqs-content">
      <div class="faqs-cards">
        <div class="faqs-cards-question">
          <i class="fa-solid fa-clipboard-question"></i>
          <div class="faqs-cards-desc">
            How to Adopt pet Animals?
          </div>
          <i class="fa-solid fa-angle-down"></i>
        </div>
        <div class="faqs-cards-answer">
          <h3>Requirements:</h3>
          <div class="indent">
            <strong>For individual adopter</strong>
            <ol type="A">
              <li> A fully accomplished adoption form</li>
              <li> Government issued ID</li>
            </ol>
            <strong>For a Group Adopter</strong>
            <ol type="A">
              <li> A fully accomplished adoption form</li>
              <li> Registration from Sec, Mayors permit</li>
              <li> Registration of shelter from BAI</li>
              <li> Name and Location of Shelter (sketch)</li>
            </ol>
          </div>
          <h3>Procedures:</h3>
          <div class="indent">
            <ol type="1">
              <li> Client will choose an animal at our website / city pound
              </li>
              <li>Client will be interviewed</li>
              <li>City Veterinary department may possible conduct home visit</li>
              <li>Pay adoption fee of 500 pesos per head</li>
              <li>Releasing of pet animal city pound</li>
            </ol>

          </div>
        </div>
      </div>
      <div class="faqs-cards">
        <div class="faqs-cards-question">
          <i class="fa-solid fa-clipboard-question"></i>
          <div class="faqs-cards-desc">
            How to Avail Anti-Rabbies Vaccination?
          </div>
          <i class="fa-solid fa-angle-down"></i>
        </div>
        <div class="faqs-cards-answer">
          <h3>Requirements:</h3>
          <div class="indent">
            <ol type="A">
              <li> Dog / cat must be healthy and atleast 3 months old
              </li>
              <li>The pets must be free from any existing disease and not taking any medication</li>
              <li>Not pregnant; not lactating</li>
              <li>Must be leash or in a cage</li>
              <li>For 2 or more pets must be accompanied by two people</li>
            </ol>
          </div>
          <h3>Procedures:</h3>
          <div class="indent">
            <ol type="1">
              <li> Bring dogs / cats for anti rabbies vaccination at QCAC for proper recording and documentation
              </li>
              <li>Present your healthy dog/cat for physical consultation and vaccination
              </li>
              <li>Wait until the dog/cat is vaccinated</li>
              <li>Claim your vaccination card</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="faqs-cards">
        <div class="faqs-cards-question">
          <i class="fa-solid fa-clipboard-question"></i>
          <div class="faqs-cards-desc">
            How to avail spay and neuter services?
          </div>
          <i class="fa-solid fa-angle-down"></i>
        </div>
        <div class="faqs-cards-answer">
          <h3>Requirements:</h3>
          <div class="indent">
            <ol type="A">
              <li> Male dog, male and female cat must be 6 mos old,
                healthy, free for any disease, not lactating and not taking any
                medication
              </li>
              <li>No food or water intake for 8 hours</li>
            </ol>
          </div>
          <h3>Procedures:</h3>
          <div class="indent">
            <ol type="1">
              <li> Inquire at QCAC about the request for spay and neuter </li>
              <li>Bring your pet at QCAC </li>
              <li>Fill out consent form for the operation</li>
              <li>Wait until the surgery is being performed</li>
              <li>After the operation allow pet to rest and recover from anesthesia</li>
              <li>Get your pet prescription</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="faqs-cards">
        <div class="faqs-cards-question">
          <i class="fa-solid fa-clipboard-question"></i>
          <div class="faqs-cards-desc">
            How to Properly Take care of a Dog?
          </div>
          <i class="fa-solid fa-angle-down"></i>
        </div>
        <div class="faqs-cards-answer">
          <h3>Proper guideline for proper pet care for dog</h3>
          <p>Proper pet care for dogs involves a variety of factors including nutrition, exercise, medical care, grooming, and socialization. Here are some guidelines for each of these areas:</p>
          <div>
            <h4>Nutrition:</h4>
            <p> Feed your dog a well-balanced diet that meets their nutritional needs. This may vary based on their age, breed, and health status. Consult with your veterinarian to determine the appropriate type and amount of food to give your dog.</p>
          </div>
          <div>
            <h4>Exercise:</h4>
            <p> Provide your dog with regular exercise to keep them healthy and prevent behavior problems. This can include daily walks, playtime in a fenced yard, or trips to a dog park.</p>
          </div>
          <div>
            <h4>Medical Care:</h4>
            <p> Schedule regular visits to the veterinarian for vaccinations, check-ups, and preventative care. Make sure to keep up-to-date on flea and tick prevention and heartworm medication..</p>
          </div>
          <div>
            <h4>Grooming:</h4>
            <p> Regular grooming helps keep your dog healthy and comfortable. This includes brushing their fur, trimming their nails, cleaning their ears, and bathing them as needed.</p>
          </div>
          <div>
            <h4>Socialization:</h4>
            <p> Socialize your dog early on to help them feel comfortable around people and other animals. This can include training classes, visits to the dog park, or playdates with other dogs.</p>
          </div>
          <br>
          <p>In addition to these guidelines, it’s important to provide your dog with plenty of love and attention. Spend time playing with them, cuddling, and providing mental stimulation through games and puzzles. By following these guidelines, you can help ensure that your dog stays healthy and happy for years to come.</p>
        </div>
      </div>
      <div class="faqs-cards">
        <div class="faqs-cards-question">
          <i class="fa-solid fa-clipboard-question"></i>
          <div class="faqs-cards-desc">
            How to Properly Take care of a Cat?
          </div>
          <i class="fa-solid fa-angle-down"></i>
        </div>
        <div class="faqs-cards-answer">
          <h3>Proper guideline for proper pet care for Cat</h3>
          <p>Proper pet care for cats involves several important aspects, including nutrition, socialization, spay neuter, identification, and safe environment. Here are some guidelines for each of these areas:</p>
          <div>
            <h4>Nutrition:</h4>
            <p> Feed your cat a well-balanced diet that meets their nutritional needs. This may vary based on their age, breed, and health status. Consult with your veterinarian to determine the appropriate type and amount of food to give your cat.</p>
          </div>
          <div>
            <h4>Socialization:</h4>
            <p> Socialize your cat early on to help them feel comfortable around people and other animals. This can include introducing them to new people and animals in a calm, positive way.</p>
          </div>
          <div>
            <h4>Spay/Neuter:</h4>
            <p> Spaying or neutering your cat can help prevent health issues and unwanted litters of kittens.</p>
          </div>
          <div>
            <h4>Identification:</h4>
            <p> Make sure your cat has identification in case they become lost. This can include a collar with identification tags or a microchip.</p>
          </div>
          <div>
            <h4>Safe Environment:</h4>
            <p>Keep your cat safe by providing a secure living environment and keeping toxic substances and dangerous items out of their reach.</p>
          </div>
          <br>
          <p>In addition to these guidelines, it’s important to provide your cat with plenty of love and attention. Spend time playing with them, cuddling, and providing mental stimulation through games and puzzles. By following these guidelines, you can help ensure that your cat stays healthy and happy for years to come.</p>
        </div>
      </div>
    </div>
  </section>
  <?php
  include_once('footer.php')
  ?>

  <script src="js/slick.js"></script>
</body>

</html>