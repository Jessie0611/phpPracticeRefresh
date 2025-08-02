<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    try {
        require_once "dbh.inc.php";
        $query = "INSERT INTO users (username, password, email) VALUES ( ?, ?, ?);";

        $stmt = $pdo->prepare($query);
        $options = [
            'cost' => 12
        ];
        $hashedPwd = password_hash($password, PASSWORD_BCRYPT, $options);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $hashedPwd);
        $stmt->bindParam(":email", $email);
        $stmt->execute([$username, $password, $email]);
        $pdo = null;
        $stmt = null;
        header("Loocation: index.php");

        die();
    } catch (PDOException $e) {

        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Loocation: ../index.php");
}
