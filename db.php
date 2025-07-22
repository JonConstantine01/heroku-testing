<?php
$host = "ca8lne8pi75f88.cluster-czrs8kj4isg7.us-east-1.rds.amazonaws.com"; // like: ca8lne8pi75f88.cluster-czrs8kj4isg7.us-east-1.rds.amazonaws.com
$dbname = "dafb852t00hut";
$user = "ue13hmi12qns5b";
$password = "p14b6aa7a346ba4198beb2173c2b0008446e77e1708fd0d8e9373ee908eb7af11";
$port = "5432";

try {
    $pdo = new PDO("pgsql:host=$host;port=$port;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}
?>
