<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get the username and password from the form
    $username = $_POST['shaifan'];
    $password = $_POST['123'];
  
    // Check if the username and password are correct
    if ($username === 'admin' && $password === 'password') {
        // If the credentials are correct, redirect the user to the admin dashboard
        header('Location: admin-dashboard.php');
        exit;
    } else {
        // If the credentials are incorrect, show an error message
        $error = 'Invalid username or password';
    }
	header("location:stolen.html");
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Login</title>
	<link rel="stylesheet" type="text/css" href="admin.css">
</head>
<body>
	<main>
		<form action="" method="post">
			<h1>Admin Login</h1>
			<?php if (isset($error)): ?>
			    <p style="color: red;"><?php echo $error; ?></p>
			<?php endif; ?>
			<label for="username">Username</label>
			<input type="text" id="username" name="username" required>
			<label for="password">Password</label>
			<input type="password" id="password" name="password" required>
			<input type="submit" value="Login">
		</form>
	</main>
</body>
</html>
