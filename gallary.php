<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rajkot Gujarat Police</title>
    <link rel="stylesheet" href="css/gallary.css">
</head>
<body>
    <nav id="navbar">
        <div id="logo">
            <img src="images/logo.jpg" alt="Rajkot Police">
        </div>
        <ul>
            <li class="item"><a href="home.html">Home</a></li>
            <li class="item"><a href="aboutus.html">About Us</a></li>
            <li class="item"><a href="gallary.php">Gallery</a></li>
            <li class="item"><a href="php/carsInfo.php">CarsInfo</a></li>
            <li class="item"><a href="E-FIR.html">E-FIR</a></li>
            <li class="item"><a href="contactus.html">Contact Us</a></li>
        </ul>
    </nav>

    <h2>Gallery</h2>
    <section class="gallery">
      <?php
      try {
          // Connect to your database
          $host = "localhost:3307";
          $username = "root";
          $password = "";
          $dbname = "policestationdatabase";
          $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
          $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          // Fetch images from database
          $stmt = $pdo->query("SELECT * FROM images");
          while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
              echo '<div class="gallery-item">';
              echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" alt="'.$row['name'].'">';
              echo '</div>';
          }
      } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
      }
      ?>
    </section>
      
</body>
</html>
