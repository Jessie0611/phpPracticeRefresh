<?php
require_once 'includes/config.php';
require_once 'includes/signup_v.inc.php';
require_once 'includes/login_v.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h3>LOGIN</h3> <br>
    <form accept="includes/login.inc.php" method="POST">
        <input type="text" name="username" placeholder="Username"> <br>
        <input type="password" name="password" placeholder="Password"> <br>
        <br>
        <button>LOGIN</button>
    </form>
    <br>
    <?php checkLoginErrors(); ?>
    <br>
    <H3>SIGN UP</H3>
    <form action="includes/signup.inc.php" method="post">
        <?php signupInputs(); ?>
        <br>
        <button>SIGN UP</button>
    </form>
    <br>
    <?php checkSignupErrors(); ?>

    <h3>LOGOUT</h3> <br>
    <form accept="includes/logout.inc.php" method="POST">
        <br>
        <button>LOGOUT</button>
    </form>
</body>

</html>