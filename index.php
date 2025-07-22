<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Users from PostgreSQL DB</title>
    <style>
        body { font-family: Arial; }
        table { border-collapse: collapse; width: 50%; margin: 20px auto; }
        th, td { border: 1px solid #ccc; padding: 8px 12px; text-align: left; }
    </style>
</head>
<body>
<h2 style="text-align:center;">User List</h2>
<table>
    <thead>
    <tr><th>ID</th><th>Name</th><th>Email</th></tr>
    </thead>
    <tbody>
    <?php
    $stmt = $pdo->query("SELECT * FROM users");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr><td>{$row['id']}</td><td>{$row['name']}</td><td>{$row['email']}</td></tr>";
    }
    ?>
    </tbody>
</table>
</body>
</html>
