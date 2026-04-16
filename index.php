<?php
$conn = new mysqli("database-1.cozka4i8kv1n.us-east-1.rds.amazonaws.com", "admin", "priyanka", "mydb");

$result = $conn->query("SELECT * FROM users");

while($row = $result->fetch_assoc()) {
    echo $row['name'] . "<br>";
}
?>
