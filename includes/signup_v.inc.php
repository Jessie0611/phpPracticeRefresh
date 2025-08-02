<?php //Displays data, user interface (HTML/CSS/JS)

declare(strict_types=1);

function checkSignupErrors()
{
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup'];
        foreach ($errors as $error) {
            echo '<p class ="formError">' . $error . '</p>';
        }
        unset($_SESSION['errors_signup']);
    }
}
