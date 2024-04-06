<?php
$servername = "localhost:3307";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=policestationdatabase", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// storing values of form feild in variable by post method
$a = $_POST['q1'];
$b = $_POST['q2'];
$c = $_POST['q3'];
$d = $_POST['q4'];
$e = $_POST['q5'];
$f = $_POST['q6'];
$g = $_POST['q7'];
$h = $_POST['q8'];
$i = $_POST['q9'];
$j = $_POST['q10'];
  $sql = "INSERT INTO `fir`(`name`, `parent_name`, `age`, `address`, `gender`, `inc_datetime`, `reg_datetime`, `complaint`, `section`, `category`) 
  VALUES ('$a','$b','$c','$d','$e','$f','$g','$h','$i','$j')";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}


$conn = null;
header('location:../home.html');
?>