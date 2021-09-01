<?php
require("db.php");
session_start();
if (isset($_REQUEST['submit'])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];

    if (empty($email)) {
        set_error("Please enter your email!");
    }

    if (empty($password)) {
        set_error("Please enter valid password!");
    }
    // encrypt the password for matching
    $password = md5($password);

    $sql = "SELECT * FROM user WHERE email ='${email}' AND password = '{$password}'";

    $res = $conn->query($sql);

    if ($res->num_rows) {
        unset($_SESSION['error']);
        $data = $res->fetch_array();
        $_SESSION['uid'] = $data['id'];
        $_SESSION['name'] = $data['name'];
        header("location:friends-view.php");

    } else {
        set_error("Invalid login details!");
    }
}
function set_error($error)
{
    $_SESSION['error'] = $error;
    header("location:login.php");
    die();
}

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/main.css">
    <title>Login</title>
</head>
<body>
<div class="container border-dark">
    <h1 style="text-align:center">Login | My Friends System</h1>

    <form action="login.php" method="post">
        <?php if (isset($_SESSION['error'])): ?>
            <div class="center error"><span><?= $_SESSION['error'] ?></span></div>
            <br>
        <?php endif; ?>

        <table width="40%" class="center">
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email"></td>
            </tr>

            <tr>
                <td>Password:</td>
                <td><input type="password" name="password"></td>
            </tr>
        </table>

        <br>
        <button class="center" type="submit" name="submit">Login</button>
        <p style="text-align: center">Doesn't have an account? <a href="sign-up.php">Sign up</a></p>
    </form>
</div>
</body>
</html>