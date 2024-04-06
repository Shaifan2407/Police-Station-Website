<!DOCTYPE html>
<html>
<head>
	<style>
		/* Reset styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
  }
  
  /* Global styles */
  body {
    font-family: Arial, sans-serif;
    font-size: 16px;
    line-height: 1.5;
    background-color: #f5f5f5;
  }
  
  header {
    background-color: #333;
    color: #fff;
    padding: 20px;
  }
  
  nav ul {
    list-style: none;
    margin: 0;
    padding: 0;
  }
  
  nav li {
    display: inline-block;
    margin-right: 20px;
  }
  
  nav li:last-child {
    margin-right: 0;
  }
  
  nav a {
    color: #fff;
    text-decoration: none;
    padding: 10px;
    border-radius: 3px;
  }
  
  nav a:hover {
    background-color: #555;
  }
</style>
	<title>Administrative</title>
</head>
<body>

<header>
		<h1>Administrative</h1>
		<nav>
			<ul>
				<li><a href="../home.html">Home</a></li>
				<li><a href="firreport.php">FIR Report</a></li>
				<li><a href="stolen.html">Stolen Car Entry</a></li>
        <li><a href="imageUpload.html">Upload Image</a></li>
				<li><a href="#">Registered User</a></li>
				<li><a href="admin.php">Logout</a></li>
			</ul>
		</nav>
	</header>
</body>
</html>


<?php
// Establish a database connection
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "policestationdatabase";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Fetch data from the database
$sql = "SELECT * FROM fir";
$result = mysqli_query($conn, $sql);

// Check if any data is returned
if (mysqli_num_rows($result) > 0) {
  // Output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo "ID : " . $row["s_no"] . "<br>";
    echo "Name : " . $row["name"] . "<br>";
    echo "Father's Name : " . $row["parent_name"] . "<br>";
    echo "Age : " . $row["age"] . "<br>";
    echo "complaint : " . $row["complaint"] . "<br><br>";
  }
} else {
  echo "No results found";
}

// Close the database connection
mysqli_close($conn);
?>
