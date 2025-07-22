<?php
// db.php

$databaseUrl = "postgres://u7l905rdi53lk7:pdc54f22b5fedea8d894d6f5453cc38c74518c2a51175cfa90b3882030aa14105@c2fbt7u7f4htth.cluster-czz5s0kz4scl.eu-west-1.rds.amazonaws.com:5432/d4lcrdsoc0k8hr";

// Parse database URL
$db = parse_url($databaseUrl);

$host = $db['host'] ?? 'localhost';
$port = $db['port'] ?? 5432;
$user = $db['user'] ?? '';
$pass = $db['pass'] ?? '';
$dbname = ltrim($db['path'] ?? '', '/');

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Create table
    $pdo->exec("
        CREATE TABLE IF NOT EXISTS users (
            id SERIAL PRIMARY KEY,
            name VARCHAR(100),
            email VARCHAR(100) UNIQUE
        )
    ");

    // Insert sample data only if table is empty
    $count = $pdo->query("SELECT COUNT(*) FROM users")->fetchColumn();
    if ($count == 0) {
        $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
        $stmt->execute(["John Doe", "john@example.com"]);
        $stmt->execute(["Jane Smith", "jane@example.com"]);
    }

    // Fetch users
    $users = $pdo->query("SELECT * FROM users")->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    die("Database error: " . $e->getMessage());
}
