<?php
$servername = "localhost:3307";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=policestationdatabase", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "insert into carsinfo set
  carid = '".$_POST['carid']."'  ,
  carplate  = '".$_POST['noplate']."'  ,
  carcompany = '".$_POST['brand']."'  ,
  carRegistration  = '".$_POST['registration']."'";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
?>