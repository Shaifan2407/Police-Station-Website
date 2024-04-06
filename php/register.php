<?php
$servername = "localhost:3307";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=policestationdatabase", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $sql = "insert into register set
  firstname = '".$_POST['q1']."'  ,
  lastname  = '".$_POST['q2']."'  ,
  username  = '".$_POST['q3']."'  ,
  dob  = '".$_POST['q4']."'  ,
  gender  = '".$_POST['q5']."'  ,             
  email   = '".$_POST['q6']."'  ,
  mobileno  = '".$_POST['q7']."'  ,
  password  = '".$_POST['q8']."'  ,
  repeatpassword  = '".$_POST['q9']."'";
  // use exec() because no results are returned
  $conn->exec($sql);
  echo "New record created successfully";
} catch(PDOException $e) {
  echo $sql . "<br>" . $e->getMessage();
}

$conn = null;
header('location:../login.html')
?>