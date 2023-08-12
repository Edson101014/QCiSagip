<?php

ini_set('upload_max_filesize', '50M');
ini_set('post_max_size', '50M');

include "./includes/db_con.php";

// Check if the form has been submitted
if (isset($_POST['cms_announcement_btn_submit'])) {

    // Get the title and video file from the form
    $content_id = strtoupper(substr(uniqid(), 0, 13) . bin2hex(random_bytes(1)));
    $title = $_POST['announcement-title'];
    $video_file = $_FILES['video'];

    // Check if the video file was uploaded successfully
    if ($video_file['error'] == UPLOAD_ERR_OK) {

        $target_dir = "../../contents";
        $target_file = "./contents/" . basename($video_file["name"]);
        $video_path = "./contents/" . $content_id . '.mp4';

        if (move_uploaded_file($video_file["tmp_name"], $target_file)) {
            // Rename the file to the content ID
            rename($target_file, $video_path);

            // Escape special characters in the title to prevent SQL injection attacks
            $id = mysqli_real_escape_string($conn, $content_id);
            $title = mysqli_real_escape_string($conn, $title);
            $video_path = mysqli_real_escape_string($conn, $video_path);

            // Construct the SQL query to insert the video into the database
            $query = "INSERT INTO cms_content (content_id, video_title, video_content) VALUES ('$id', '$title', '$video_path')";

            // Execute the SQL query
            if (mysqli_query($conn, $query)) {

                echo "Video uploaded successfully.";
                header('Location: ./admin/index.php');
                
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "Error uploading video file.";
        }

    } else {
        echo "Error uploading video file.";
    }
}

// Close the database connection
mysqli_close($conn);

?>