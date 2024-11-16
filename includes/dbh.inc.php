<?php
$host = 'localhost'; // Your database host
$db = 'chat_db'; // Your database name
$user = 'root'; // Your database username
$pass = ''; // Your database password
$charset = 'utf8mb4'; // Charset to use

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
   $pdo=new PDO($dsn,$user,$pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
if(!$pdo){
    die();
}else{
    header("Location: ../index.php");
}
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

