<?php
$conn = new mysqli("database-1.cozka4i8kv1n.us-east-1.rds.amazonaws.com", "admin", "priyanka", "mydb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$name = $_POST['name'];

$conn->query("INSERT INTO users (name) VALUES ('$name')");

// Redirect to index.php with success message
header("Location: index.php?success=1");
exit();
?>
