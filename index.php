<?php
    session_start();
    unset($_SESSION['error']);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/main.css">
    <title>My Friends System</title>
</head>
<body>
    <div class="container">
        <h1>My Friends System</h1>
        <a href="sign-up.php">Sign up</a>
        <a href="login.php">Login</a>
    </div>
</body>
</html>