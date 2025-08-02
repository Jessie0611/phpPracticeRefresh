<?php //handles data, database interaction, business logic

declare(strict_types=1); //type declarations


function getUsername(object $pdo, string $username)
{
    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query); //prevent sql injection
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC); //fetch first result from associative array
    return $result;
}
