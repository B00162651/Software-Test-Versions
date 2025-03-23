<?php
// Database connection using PDO
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "MyDatabase"; // Update with your actual database name

try {
    // Create a PDO instance and set error mode to exception
    $connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    exit;  // Stop execution if connection fails
}
?>
