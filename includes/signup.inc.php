<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        require_once "dbh.inc.php";
        $query = "INSERT INTO users (username, pwd, email) VALUES ( ?, ?, ?);";

        $stmt = $pdo->prepare($query);
        $options = [
            'cost' => 12
        ];
        $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $hashedPwd);
        $stmt->bindParam(":email", $email);
        $stmt->execute([$username, $pwd, $email]);
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

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];
    try {
        require_once 'dbh.inc.php';
        require_once 'singup_m.inc.php';
        require_once 'signup_c.inc.php';
        require_once 'signup_v.inc.php';

        //error handlers
        $errors = [];

        if (isEmpty($username, $pwd, $email)) {
            $errors["empty_input"] = "Fill in all fields!";
        }
        if (isValidE($email)) {
            $errors["invalid_email"] = "Please enter a valid E-Mail!";
        }
        if (usernameTaken($pdo, $username)) {
            $errors["username_taken"] = "This username is already taken!";
        }
        if (isEmailRegistered($pdo, $email)) {
            $errors["email_used"] = "E-Mail already registered!";
        }

        require_once 'config.php';

        if ($errors) {
            $_SESSION["errors_signup"] = $errors;
            header("Location: ../index.php");
        }
        createUser();
    } catch (PDOException $e) {
        die("Query Failed: " . $e->getMessage());
    }
} else {
    header("Location: ../index.php");
    die();
}
