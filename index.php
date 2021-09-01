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
        <h1>Home|My Friends System</h1>
        <table>
            <tr>
                <td>Name:</td>
                <td>W.A.N.I.Kularathne</td>
            </tr>
            <tr>
                <td>Student ID:</td>
                <td>SE/2018/025</td>
            </tr>
        </table>
        <a href="sign-up.php">Sign up</a>&nbsp
        <a href="login.php">Login</a>&nbsp
        <a href="about.php">About</a>
    </div>
</body>
</html>