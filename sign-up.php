<?php
require("db.php");

session_start();

if (isset($_REQUEST['submit'])) {

    $name = $_REQUEST['name'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $confirm_password = $_REQUEST['confirm_password'];

    unset($_SESSION['error']);

    if (empty($name)) {
        set_error("Please enter your full name!");
    }

    if (empty($email)) {
        set_error("Please enter your email!");
    }

    if (empty($password)) {
        set_error("Please enter valid password!");
    }

    if (empty($confirm_password) || $password != $confirm_password) {
        set_error("The password and confirmation password does not match!");
    }

    // to check whether the email exist
    $sql ="SELECT id FROM user WHERE email = '{$email}'";
    if ($conn->query($sql)->num_rows) {
        set_error("This email is already exist");
    }
    // encrypt the password
    $password = md5($password);
    $sql = "INSERT INTO user (name,email,password) VALUES ('{$name}','{$email}','{$password}')";
    $res = $conn->query($sql);

    if ($res) {
        header("location:index.php");
    } else {
        set_error("Database error!");
    }
}

function set_error($error) {
    $_SESSION['error'] = $error;
    header("location:sign-up.php");
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
    <title>Sign Up</title>
</head>
<body>

<div class="container">
    <form action="" method="post">
        <?php if (isset($_SESSION['error'])): ?>
            <span style="color: red"><?= $_SESSION['error'] ?></span>
            <br>
        <?php endif; ?>
        <table>
            <tr>
                <td>Full Name:</td>
                <td><input type="text" name="name"></td>
            </tr>

            <tr>
                <td>Email:</td>
                <td><input type="text" name="email"></td>
            </tr>

            <tr>
                <td>Password:</td>
                <td><input type="password" name="password"></td>
            </tr>

            <tr>
                <td>Confirm Password:</td>
                <td><input type="password" name="confirm_password"></td>
            </tr>

        </table>

        <br>
        <button type="submit" name="submit">Create a account</button>

    </form>
</div>
</body>
</html>
