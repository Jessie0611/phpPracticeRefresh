<?php

$sensitiveData = "username";
$salt = bin2hex(random_bytes(16)); //gen randon str
$pepper = "ASecretPepperStr";

$dataToHash = $sensitiveData . $salt . $pepper;
$hash = hash("sha256", $dataToHash);

echo "<br>" . $hash;

//password hashing

$password = "example";
$options = [
    'cost' => 12
];
$hashedPwd = password_hash($password, PASSWORD_BCRYPT, $options);
$passwordLogin = "example";
password_verify($passwordLogin, $hashedPwd);

if (password_verify($passwordLogin, $hashedPwd)) {
    echo "The passwords are the same.";
}
