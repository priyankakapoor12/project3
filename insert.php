sudo apt install mysql-client -y

mysql -h database-1.cozka4i8kv1n.us-east-1.rds.amazonaws.com -u admin -p

<?php
$conn = new mysqli("database-1.cozka4i8kv1n.us-east-1.rds.amazonaws.com", "admin", "priyanka", "mydb");

$name = $_POST['name'];
$conn->query("INSERT INTO users (name) VALUES ('$name')");

echo "User added";
?>
