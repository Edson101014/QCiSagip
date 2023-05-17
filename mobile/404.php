<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page Not Found</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
      }
      .container {
        max-width: 500px;
        margin: 0 auto;
        padding: 50px;
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        text-align: center;
      }
      h1 {
        font-size: 36px;
        color: #e74c3c;
      }
      p {
        font-size: 24px;
        color: #333;
        margin: 20px 0;
      }
      a {
        display: inline-block;
        padding: 10px 20px;
        background-color: #e74c3c;
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        transition: background-color 0.3s;
      }
      a:hover {
        background-color: #c0392b;
      }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="./js/404.js"></script>
  </head>
  <body>
    <div class="container">
      <h1>Page Not Found</h1>
      <p>We're sorry, but the page you requested could not be found.</p>
      <a href="index.php" onclick="logout()">Go to Home Page</a>
    </div>
  </body>
</html>