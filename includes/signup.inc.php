<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];
    try {
        require_once 'dbh.inc.php';
        require_once 'signup_m.inc.php';
        require_once 'signup_c.inc.php';

        //error handlers
        if (isEmpty($username, $pwd, $email)) {
        }
        if (isValidE($email)) {
        }
        if (usernameTaken($pdo, $username)) {
        }
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
