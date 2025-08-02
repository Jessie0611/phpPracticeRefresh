<?php  //database handler . includes . php

$dsn = "mysql:host=localhost;dbname=PRdb";
$dbusername = "root";
$dbpassword = "";

try { //PDO php data objects - flexible for using various types of db
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection Failed: " . $e->getMessage();
}
