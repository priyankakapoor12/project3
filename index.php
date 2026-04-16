<?php
$conn = new mysqli("database-1.cozka4i8kv1n.us-east-1.rds.amazonaws.com", "admin", "priyanka", "mydb");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$result = $conn->query("SELECT * FROM users");
?>

<!DOCTYPE html>
<html>
<head>
    <title>User Dashboard</title>
    <style>
        body {
            font-family: Arial;
            margin: 0;
            background: linear-gradient(135deg, #36d1dc, #5b86e5);
        }

        .container {
            width: 70%;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0px 10px 30px rgba(0,0,0,0.2);
            text-align: center;
        }

        h1 {
            color: #333;
        }

        .success {
            background: #d4edda;
            color: #155724;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #5b86e5;
            color: white;
            padding: 10px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }

        tr:hover {
            background: #f2f2f2;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #36d1dc;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .btn:hover {
            background: #2bb3c0;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>🚀 User Dashboard</h1>

    <!-- Success Message -->
    <?php if(isset($_GET['success'])) { ?>
        <div class="success">
            ✅ User added successfully!
        </div>
    <?php } ?>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
        </tr>

        <?php
        if ($result && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                      </tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No users found</td></tr>";
        }
        ?>
    </table>

    <a href="index.html" class="btn">➕ Add New User</a>
</div>

</body>
</html>

<?php
$conn->close();
?>
