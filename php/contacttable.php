<?php
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "policestationdatabase";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $firstname = $_POST["firstname"];
  $email = $_POST['Email'];
  $address = $_POST['address'];
  $subject = $_POST['subject'];
  $lastname = $_POST['lastname'];

  $sql = "INSERT INTO `contacttable`(`first name`, `lastname`, `email`, `address`, `comments`) 
  VALUES ('$firstname','$lastname','$email','$address','$subject')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
header("location:../home.html")
?>