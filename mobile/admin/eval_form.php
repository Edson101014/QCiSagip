<?php
include "./db/db_con.php";

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Check if reference_no is set
if (isset($_GET['appl'])) {

    $reference_no = $_GET['appl'];
    
    // Fetch adoption transactions for the user with the specified reference number
    // $sel_adoption_query = "SELECT t.*, s.status, p.*, ci.*
    // FROM `adoption_transaction` t 
    // JOIN `adoption_status` s ON t.adoption_id = s.adoption_id 
    // JOIN `pet_details` p ON t.pet_id = p.pet_id 
    // LEFT JOIN `ci` ci ON t.reference_no = ci.reference_no
    // WHERE s.status = 'success' AND ci.ci_status ='not done' AND t.reference_no = '$reference_no'";
    
    $sel_adoption_query = "SELECT t.*, s.status, p.*, ci.*, rev.*
    FROM `adoption_transaction` t 
    JOIN `adoption_status` s ON t.adoption_id = s.adoption_id 
    JOIN `pet_details` p ON t.pet_id = p.pet_id 
    JOIN `ci` ci ON t.reference_no = ci.reference_no
    JOIN `ci_revisit` rev ON t.reference_no = rev.reference_no
    WHERE s.status = 'success' AND ci.ci_status ='not done' AND t.reference_no = '$reference_no' OR rev.ci_rev_status ='for revisit' AND rev.remarks = 'warning';";

    $res_adoption_query = mysqli_query($conn, $sel_adoption_query);

    // Store adoption transactions in an array
    $user_transactions = [];
    while ($adoption_data = mysqli_fetch_assoc($res_adoption_query)) {
        $user_transactions[] = $adoption_data;
    }

    if (mysqli_num_rows($res_adoption_query) === 0) {
        // Adoption not found, redirect to error page
        header("Location: 404.php");
        exit();
    }
} else {
    // Reference number not set, redirect to error page
    header("Location: 404.php");
    exit();
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iSagip-PAS CI</title>
    <link rel="icon" href="../assets/adopt-logo.png">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/report.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

</head>

<body onload="getLocation()">
    <div class="report">
        <h2>Home Visit</h2>

        <!-- Add a design in this form, this is the UI of the mobile app. -->
        <form class="submitreport" id="submitreport" action="save_evaluation.php" enctype="multipart/form-data" method="POST" autocomplete="off">
            <!-- Note: please fetch the email after login. (Don't show the Email in the user side) -->
            <div class="report-form form-0 ">
                <div>
                    <!-- <div>
                        <label for="">Email</label>
                        <input type="text" id="email_display" name="email_display" value="<?php echo $user_info['email']; ?>" disabled>
                        <input type="hidden" id="email" name="email" value="<?php echo $user_info['email']; ?>"><br>
                    </div> -->

                     <!--<div> -->
                     <!--<label for="">Address</label> -->
                     <!--The location of the user will appear here automatically. -->
                     <input type="hidden" id="address" name="address"> 
                     <input type="hidden" id="latitude" name="latitude">
                     <input type="hidden" id="longitude" name="longitude">
                     <!--</div> -->
                    <?php if (!empty($user_transactions)) : ?>
                        <div class="homevisit-detail">
                            <div class="even">
                                <span> Reference Number: <strong><?php echo $user_transactions[0]['reference_no']; ?></strong></span>
                                <span>Date: <strong><?php echo
                                                                    $user_transactions[0]['schedule']; ?></strong></span>
                            </div>
                        </div>
                        <div class="adopter-detail homevisit-detail">
                            <h3>Adopter's Detail</h3>
                            <div>
                                <div class="input-detail">
                                    <div class="input-disabled">
                                        <span>Name: </span>
                                        <input type="text" value="<?php echo $user_transactions[0]['fullname']; ?>" readonly>
                                    </div>
                                    <div class="input-disabled">
                                        <span>Email: </span>
                                        <input type="text" value="<?php echo strtolower($user_transactions[0]['email']); ?>" readonly>
                                    </div>
                                    <div class="input-disabled">
                                        <span>Contact: </span>
                                        <input type="text" value="<?php echo $user_transactions[0]['contact']; ?>" readonly>
                                    </div>
                                    <div class="input-disabled">
                                        <span>Address: </span>
                                        <input type="text" value="<?php echo $user_transactions[0]['address']; ?>" readonly>
                                    </div>
                                </div>
                                <!--<div class="img-detail">-->
                                <!--    <img src="../../<?php echo strtolower($user_transactions[0]['1by1_id']); ?>" alt="">-->

                                <!--</div>-->
                            </div>
                        </div>
                        <div class="pet-detail homevisit-detail">
                            <h3>Pet's Detail</h3>
                            <div>
                                <div class="input-detail">
                                    <div class="input-disabled">
                                        <span>Name: </span>
                                        <input type="text" value="<?php echo $user_transactions[0]['pet_name']; ?>" readonly>
                                    </div>
                                    <div class="input-disabled">
                                        <span>Species: </span>
                                        <input type="text" value="<?php echo $user_transactions[0]['pet_species']; ?>" readonly>
                                    </div>
                                    <div class="input-disabled">
                                        <span>Breed: </span>
                                        <input type="text" value="<?php echo $user_transactions[0]['pet_breed']; ?>" readonly>
                                    </div>
                                    <div class="input-disabled">
                                        <span>Sex: </span>
                                        <input type="text" value="<?php echo $user_transactions[0]['pet_gender']; ?>" readonly>
                                    </div>
                                </div>
                                <!--<div class="img-detail">-->
                                <!--    <img src="../../pets_image/<?php echo strtolower($user_transactions[0]['pet_image']); ?>" alt="">-->
                                <!--</div>-->
                            </div>
                        </div>
                        <div class="form-buttons">
                            <a href="homeVisit.php" class="small back">CANCEL</a>

                            <button type="button" name="next" class="btn-primary small next next1">NEXT</button>
                        </div>
                </div>

            </div>


            <div class="report-form form-1 toLeft">
                <div>
                    <!-- <label for="typeOfReport">Type of Report</label>
                    <select name="typeOfReport" id="typeOfReport">
                        <option value="Abused Animal">Abused Animal</option>
                        <option value="Wild Animal">Wild Animal</option>
                    </select> -->

                    <?php
                        if (isset($_GET["type"])) {
                            if ($_GET["type"] === "abused") {
                    ?>

                            <input type="hidden" name="typeOfReport" value="Abused Animal">
                        <?php

                            } else if ($_GET["type"] === "wild") {
                        ?>

                            <input type="hidden" name="typeOfReport" value="Wild Animal">
                    <?php
                            }
                        }
                    ?>
                    <p>
                        <span class="alert-red">Step 1: *</span> Take or Upload a photo of the Visit.
                    </p>
                </div>

                <div class="report-photo">
                    <div class="photo-buttons">
                        <button type="button" class="choosePhoto small btn-primary">Take Photo</button>
                        <button type="button" class="choosePhoto small">Upload Photo</button>
                    </div>

                    <div class="inputPhoto image-take isDisplay">
                        <div>
                            <!-- Note: The size of the camera that can be seen in mobile app.  -->
                            <video id="video" autoplay></video>
                            <!-- Note: The size of the image captured by the camera that can be seen in mobile app.  -->
                            <canvas id="canvas"></canvas>
                        </div>
                        <!-- Click to capture a picture.  -->
                        <input type="button" value="Take a Photo" onclick="takePhoto()">
                        <!-- Use to locate the location of the user.  -->
                    </div>

                    <div class="inputPhoto image-upload">
                        <label for="image_upload" class="upload-file clr-primary">
                            <img id="uploaded_image" src="" alt="Upload Image" style="display:none;">
                            <span>Upload</span>
                        </label>
                        <input type="file" id="image_upload" name="image_upload" class="hidden" accept="image/*">
                        <label id="imgChosen" style="display:block"></label>

                    </div>
                </div>
                <div class="form-buttons">
                    <!-- <button type="button" name="next" class="btn-primary small" onclick="logout()">Log Out</button> -->
                    <!-- <a href="reportIndex.php" class="small back">CANCEL</a> -->
                    <button type="button" name="back" id="back" class="back back1 small">BACK</button>
                    <button type="button" name="next" class="btn-primary small next next2" id="photonext-btn">NEXT</button>
                </div>
            </div>

            <div class="report-form form-2 toLeft">
                
                <p style="margin-bottom: 1rem;">
                    <span class="alert-red">Step 2: *</span> Input the Evaluation
                </p>
              
                <div>
                <div class="invalid-feedback" id="missing-feedbackThird"></div>
                    <!-- <div>
                        <label for="">Email</label>
                        <input type="text" id="email_display" name="email_display" value="<?php echo $user_info['email']; ?>" disabled>
                        <input type="hidden" id="email" name="email" value="<?php echo $user_info['email']; ?>"><br>
                    </div> -->

                    <div>
                        <!-- <label for="">Address</label> -->
                        <!-- The location of the user will appear here automatically. -->
                        <!-- <input type="hidden" id="address" name="address"> -->
                        <!-- <input type="hidden" id="latitude" name="latitude"><br> -->
                        <!-- <input type="hidden" id="longitude" name="longitude"><br> -->
                    </div>

                    <input type="hidden" id="reference_no" name="reference_no" value="<?php echo $user_transactions[0]['reference_no']; ?>" />

                    <div>
                        <label for="">May sapat ba na espasyo para sa alaga? </label>
                        <select name="val1" id="val1" required>
                            <option hidden selected>Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div>
                        <label for="">May maayos ba na tulugan ang alaga?</label>
                        <select name="val2" id="val2" required>
                            <option hidden selected>Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div>
                        <label for="">Malusog ba ang pangangatawan ng alaga? </label>
                        <select name="val3" id="val3" required>
                            <option hidden selected>Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <div>
                        <label for="">Nakikitaan ba nang magandang asal ang alaga?</label>
                        <select name="val4" id="val4" required>
                            <option hidden selected>Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div>
                        <label for="">Nakitaan ba nang pagbuti ang alaga simula nung araw na ito ay naampon?</label>
                        <select name="val5" id="val5" required>
                            <option hidden selected>Select</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                    </div>

                    <div>
                        <label for="">Other comments</label>
                        <textarea name="ci_description" id="ci_description" rows="5" style="resize:none;" required></textarea>
                    </div>

                     <div>
                        <label for="">Remarks</label>
                        <select name="remarks" id="remarks" class="remarks" required>
                            <option hidden selected>Select</option>
                            
                            
                            <option value="passed">Passed</option>
                            <?php
                                if($user_transactions[0]['remarks'] == 'warning'){
                                    ?>
                                    <option value="banned">Ban</option>
                                    <?php
                                }else{
                                    ?>

                                         <option value="warning">Warning</option>
                                    <?php
                                }
                            ?>
                            
                        </select>
                    </div> 

                    <div class="form-buttons">
                        <button type="button" name="back" id="back" class="back back2 small">BACK</button>
                        <button type="submit" name="submit" class="btn-primary small" id="submit-image1">SUBMIT</button>
                    </div>
                </div>
            <?php else : ?>
                <tr>
                    <td colspan="6" class="tx-center">No adoption transactions.</td>
                </tr>
            <?php endif; ?>
            </div>
        </form>
        <!-- Add a design in this form, this is the UI of the mobile app.  -->

    </div>



    <!-- SCRIPTS -->
    <!-- NOTE: No javascripts for error.  -->
    <!-- JQUERY for some animation  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/report.js"></script>
    <script>
        // To open the camera and set the rear camera to default.
        var isFrontCamera = false;
        var video = document.querySelector('video');

        isFrontCamera == isFrontCamera;
        navigator.mediaDevices.getUserMedia({
                video: {
                    facingMode: isFrontCamera ? 'user' : {
                        exact: 'environment'
                    },
                    // you can change the width and height depends on the size and design of the mobile app
                    width: 500,
                    height: 240
                }
            })
            // start video stream on your camera.
            .then(stream => {
                video.srcObject = stream;
            })
            .catch(error => {
                console.log('Error accessing camera: ', error);
            });
        // }
        var canvas = document.getElementById('canvas');
      
      
        function takePhoto() {
            // Create a canvas element and set its dimensions to the same as the video
            canvas.width = video.videoWidth;
            canvas.height = video.videoHeight;
            // Draw the current frame from the video on the canvas
            canvas.getContext('2d').drawImage(video, 0, 0, canvas.width, canvas.height);
            // Get the data URL of the canvas image
            var camera_image = canvas.toDataURL('image/jpeg');
            if (camera_image !== '') {
                // Update the form with the camera image data
                document.querySelector('form').insertAdjacentHTML('beforeend', '<input type="hidden" name="camera_upload" id="camera_upload" value="' + camera_image + '">');
                // Display the captured photo in the canvas
                var context = canvasElement.getContext('2d');
            
                var img = new Image();
                img.src = camera_image;
                img.onload = function () {
                    context.drawImage(img, 0, 0, canvas.width, canvas.height);
                };
            } 
        }
    </script>

    <script>
        // script for automatically fill up the address of the user.
        // script for getting the location of the user realtime.
        var apiKey = '68ff4b65708e49e683e2858c2c88de86';
        var url = 'https://api.opencagedata.com/geocode/v1/json?q=<LATITUDE>,<LONGITUDE>&key=' + apiKey;

        // get user's current position
        navigator.geolocation.getCurrentPosition(function(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;

            // replace '<LATITUDE>' and '<LONGITUDE>' in the URL with the user's latitude and longitude
            url = url.replace('<LATITUDE>', latitude).replace('<LONGITUDE>', longitude);

            // make the API request
            fetch(url)
                .then(response => response.json())
                .then(data => {
                    // get the formatted address from the API response
                    var address = data.results[0].formatted;

                    // set the address value to the input field with id 'address'
                    document.getElementById('address').value = address;

                    // update the latitude and longitude input fields
                    document.getElementById('latitude').value = latitude;
                    document.getElementById('longitude').value = longitude;
                })
                .catch(error => console.error(error));
        });
    </script>

    <script>
        const input = document.querySelector("#image_upload");
        const uploadLabel = document.querySelector(".upload-file");
        const uploadedImage = document.querySelector("#uploaded_image");
 
        input.addEventListener("change", function() {
            const file = input.files[0];
            const reader = new FileReader();
           
            reader.onload = function(e) {
                uploadedImage.src = e.target.result;
                uploadedImage.style.display = "block";
                uploadLabel.querySelector("span").style.display = "none";
            };


            reader.readAsDataURL(file);
        });
    </script>
</body>

</html>