<!DOCTYPE html>
<html>
<head>
  <title>Error</title>
  <style>
    /* Style for the error message and button */
    body {
      font-family: Arial, sans-serif;
      text-align: center;
    }
    h1 {
      font-size: 2rem;
      color: red;
    }
    p {
      font-size: 1.2rem;
      margin-bottom: 2rem;
    }
    button {
      background-color: #4CAF50;
      border: none;
      color: white;
      padding: 1rem 2rem;
      text-align: center;
      text-decoration: none;
      display: inline-block;
      font-size: 1.2rem;
      border-radius: 5px;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <h1>Error</h1>
  <p>"Sorry, an error occurred because you uploaded an invalid file. We only accept JPEG and PNG format images."</p>
  <button onclick="goHome()">Go Home</button>

  <script>
    // Function to redirect to home page
    function goHome() {
      window.location.href = "mobile/index.php";
    }
  </script>
</body>
</html>
