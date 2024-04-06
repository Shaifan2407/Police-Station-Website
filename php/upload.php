<?php
// Database credentials
$host = "localhost:3307";
$username = "root";
$password = "";
$dbname = "policestationdatabase";

// Connect to database
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if file is uploaded without errors
    if (isset($_FILES["imageFile"]) && $_FILES["imageFile"]["error"] == 0) {
        // Read image file
        $image = file_get_contents($_FILES["imageFile"]["tmp_name"]);

        // Prepare SQL statement
        $sql = "INSERT INTO images (name, image) VALUES (:name, :image)";
        $stmt = $pdo->prepare($sql);

        // Bind parameters
        $stmt->bindParam(':name', $_FILES["imageFile"]["name"]);
        $stmt->bindParam(':image', $image, PDO::PARAM_LOB);

        // Execute statement
        try {
            $stmt->execute();
            echo "Image uploaded successfully";
        } catch (PDOException $e) {
            die("Error uploading image: " . $e->getMessage());
        }
    } else {
        echo "Error: Please select a valid image file";
    }
}
?>
