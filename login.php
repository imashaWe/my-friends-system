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
        $_SESSION['uid'] = $res->fetch_array()['id'];
        $_SESSION['name'] = $res->fetch_array()['name'];
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
    <title>Login</title>
</head>
<body>
<div class="container">
    <form action="login.php" method="post">
        <?php if (isset($_SESSION['error'])): ?>
            <span style="color: red"><?= $_SESSION['error'] ?></span>
            <br>
        <?php endif; ?>
        <table>
            <tr>
                <td>Email:</td>
                <td><input type="text" name="email"></td>
            </tr>

            <tr>
                <td>Password:</td>
                <td><input type="password" name="password"></td>
            </tr>
        </table>
        <button type="submit" name="submit">Login</button>
    </form>
</div>
</body>
</html>