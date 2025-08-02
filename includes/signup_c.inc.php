<?php //Processes user input, communicates with Model & View

declare(strict_types=1);

function isEmpty(string $username, string $pwd, string $email)
{ {
        if (empty($username) || empty($pwd) || empty($email)) {
            return true;
        } else {
            return false;
        }
    }
}

function isValidE(string $email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function usernameTaken(object $pdo, string $username)
{
    if (getUsername($pdo, $username)) {
        return true;
    } else {
        return false;
    }
}
