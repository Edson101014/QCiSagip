<?php
session_start();

// Create a connection to the database (assuming MySQL)
$mysqli = new mysqli("localhost", "u679900105_root", "Rectibyte101014", "u679900105_cap_pas");
// $mysqli = new mysqli("localhost", "root", "", "cap-pas");

// Check if the connection was successful
if ($mysqli->connect_errno) {
  die("Failed to connect to MySQL: " . $mysqli->connect_error);
}

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  // Set the value of email to an empty string
  $email = '';
} else {
  $userID = $_SESSION['user_id'];

  // Prepare the SQL query
  $stmt1 = $mysqli->prepare("SELECT email FROM user_details WHERE user_id = ?");

  // Bind the user ID parameter to the query
  $stmt1->bind_param("s", $userID);

  // Execute the query
  $stmt1->execute();

  // Get the result set
  $result = $stmt1->get_result();

  // Check if there are any rows returned
  if ($result->num_rows > 0) {
    // Get the first row
    $row = $result->fetch_assoc();

    // Get the email from the row
    $email = $row['email'];
  }

  // Close the prepared statement
  $stmt1->close();
}

// Close the database connection
$mysqli->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include_once('head.php');
  ?>
  <link rel="stylesheet" href="css/contact.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="./js/contact.js"></script>
</head>

<body>
  <?php
  include_once('navigation.php');
  ?>
  <div class="contact-us">
    <div class="information">
      <h3>CONTACT US</h3>
      <div>
        <i class="fas fa-map-marker-alt"></i>
        <p>P485+FM9, Clemente, Quezon City, Metro Manila</p>
      </div>
      <div>
        <i class="fas fa-phone"></i>
        <p>(02) 8988 4242</p>
      </div>
      <div>
        <i class="fas fa-at"></i>
        <p>qc.animalcareandadoption@gmail.com</p>
      </div>
      <div>
        <i class="fas fa-globe"></i>
        <p>Quezon City Animal Care and Adoption Center</p>
      </div>
      <div>
        <i class="fas fa-clock"></i>
        <p><span class="red">OPEN:</span> Monday-Friday, 8:00 AM - 5:00 PM</p>
      </div>
    </div>
    <div class="map">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3858.9368028074305!2d121.1070366152512!3d14.716164989728998!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397bbb12c9d8d0b%3A0x84260512bc0ab2a8!2sQuezon%20City%20Animal%20Care%20and%20Adoption%20center!5e0!3m2!1sen!2sph!4v1679064683658!5m2!1sen!2sph" width="500" height="400" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
  </div>
  <div class="form">
    <div class="header">
      <h3>GET IN TOUCH WITH US</h3>
      <p>Any personal question or remarks? Just write us a message!</p>
    </div>
    <div class="contact-form">
      <div>
        <img src="assets/about-2.jpg" alt="Contact Us" />
      </div>
      <form method="POST">

        <div class="valid-feedback" id="success-message" style="display: none;">
          <div style="background-color: #cfc ; padding: 10px; border: 5px solid green;"><span>Message Sent Successfully.</span></div>
        </div>
        <div class="invalid-feedback" id="error-message" style="display: none;"></div>

        <div><span>Email</span><input type="email" name="email" id="email-inquiry" value="<?php echo $email; ?>" /></div>
        <div>
          <span>Message</span>
          <textarea name="message" id="message-inquiry" cols="30" rows="7"></textarea>
        </div>
        <button type="submit" name="submit" id="submit-inquiry">Send us a message</button>
      </form>
    </div>
  </div>
  <?php
  include_once('footer.php')
  ?>
</body>

</html>