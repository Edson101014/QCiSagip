<?php
include "./db/db_con.php";
session_start();

// Check if the user is logged in
if (!isset($_SESSION["user_id"])) {
    // Redirect to the login page if not logged in
    header("Location: ./mobileSignin.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sel_user_query = "SELECT * FROM `user_details` WHERE user_id = '$user_id'";
$res_user_query = mysqli_query($conn, $sel_user_query);

if (mysqli_num_rows($res_user_query) === 1) {
    $user_info = mysqli_fetch_assoc($res_user_query);
} else {
    // User not found, redirect to error page
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
    <title>Abuse Report Geolocation Tracker</title>
    <link rel="icon" href="../assets/adopt-logo.png">
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="./css/report.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

</head>

<body onload="getLocation()">
    <div class="report">
        <?php
        if (isset($_GET["type"])) {
            if ($_GET["type"] === "abused") {
                echo "<h2>Report Abused Animals</h2>";
            } else if ($_GET["type"] === "wild") {
                echo "<h2>Report Wild Animals</h2>";
            }
        }
        ?>

        <!-- Add a design in this form, this is the UI of the mobile app. -->
        <form class="submitreport" id="submitreport" action="save_location.php" enctype="multipart/form-data"
            method="POST" autocomplete="off">
            <!-- Note: please fetch the email after login. (Don't show the Email in the user side) -->
            <div class="report-form form-1">
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
                        <span class="alert-red">Step 1: *</span> Take or Upload a photo of the scene.
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
                    <a href="reportIndex.php" class="btn-primary small next">CANCEL</a>

                    <button type="button" name="next" class="btn-primary small next" id="photonext-btn">NEXT</button>
                </div>
            </div>

            <div class="report-form form-2 toLeft">
                <p style="margin-bottom: 1rem;">
                    <span class="alert-red">Step 2: *</span> Put a short description of the scene.
                </p>
                <div>
                    <div>
                        <label for="">Email</label>
                        <input type="text" id="email_display" name="email_display"
                            value="<?php echo $user_info['email']; ?>" disabled>
                        <input type="hidden" id="email" name="email" value="<?php echo $user_info['email']; ?>"><br>
                    </div>

                    <div>
                        <label for="">Address</label>
                        <!-- The location of the user will appear here automatically. -->
                        <input type="text" id="address" name="address">
                        <input type="hidden" id="latitude" name="latitude"><br>
                        <input type="hidden" id="longitude" name="longitude"><br>
                    </div>

                    <div>
                        <label for="">Description</label>
                        <textarea name="description" id="description" rows="8" style="resize:none;" required></textarea>
                    </div>
                    <div class="form-buttons">
                        <button type="button" name="back" id="back" class="back small">BACK</button>
                        <button type="submit" name="submit" class="btn-primary small" id="submit-image">SUBMIT</button>
                    </div>
                </div>

            </div>
        </form>
        <!-- Add a design in this form, this is the UI of the mobile app.  -->

    </div>



    <!-- SCRIPTS -->
    <!-- NOTE: No javascripts for error.  -->
    <!-- JQUERY for some animation  -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"
        integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            } else {
                nextBtn.disabled = true;
            }

        }
        $("#photonext-btn").on("click", function () {

            $(".form-1").addClass("toLeft");
            $(".form-2").removeClass("toLeft");
        });
    </script>

    <script>
        // script for automatically fill up the address of the user.
        // script for getting the location of the user realtime.
        var apiKey = '68ff4b65708e49e683e2858c2c88de86';
        var url = 'https://api.opencagedata.com/geocode/v1/json?q=<LATITUDE>,<LONGITUDE>&key=' + apiKey;

        // get user's current position
        navigator.geolocation.getCurrentPosition(function (position) {
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

        input.addEventListener("change", function () {
            const file = input.files[0];
            const reader = new FileReader();
           
            reader.onload = function (e) {
                uploadedImage.src = e.target.result;
                uploadedImage.style.display = "block";
                uploadLabel.querySelector("span").style.display = "none";
            };


            reader.readAsDataURL(file);
        });

        $('#description').on('input', function () {
            var description = $(this).val();
            if (description.trim() === "") {
                $('#description').addClass('is-invalid');
                $("#submit-image").prop("disabled", true);
            } else {
                $('#description').removeClass('is-invalid');
        
                $("#submit-image").prop("disabled", false);
            }
        });
    </script>
</body>

</html>