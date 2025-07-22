<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Users Table</title>
    <style>
        table { border-collapse: collapse; width: 50%; margin-top: 20px; }
        th, td { border: 1px solid #333; padding: 8px; text-align: left; }
        body { font-family: Arial, sans-serif; padding: 20px; }
    </style>
</head>
<body>
<h1>Users Table</h1>
<table>
    <thead>
    <tr><th>ID</th><th>Name</th><th>Email</th></tr>
    </thead>
    <tbody>
    <?php foreach ($users as $user): ?>
        <tr>
            <td><?= htmlspecialchars($user['id']) ?></td>
            <td><?= htmlspecialchars($user['name']) ?></td>
            <td><?= htmlspecialchars($user['email']) ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>
</html>
