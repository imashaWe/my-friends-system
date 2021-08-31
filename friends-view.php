<?php
require("db.php");
session_start();
if (!isset($_SESSION['uid'])) {
    header("location:login.php");
    die();
}

if (isset($_REQUEST['submit'])) {
    $uid = $_SESSION['uid'];
    $id = $_REQUEST['id'];
    $sql = "DELETE FROM user_friend WHERE uid = '{$uid}' AND id = '{$id}'";

    $res = $conn->query($sql);
    if ($res) {
        header("location:friends-view.php");
    }
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

    <title>Friends</title>
</head>
<body>
<div class="container">
    <h1>My Friends | My Friends System</h1>
    <table class="table">
        <?php
        $uid = $_SESSION['uid'];
        $sql = "SELECT user.id AS id,name FROM user_friend INNER JOIN user ON user_friend.id = user.id WHERE uid = {$uid}";
        $res = $conn->query($sql);
        if ($res->num_rows) {
            while ($r = $res->fetch_array()) {
                echo "
                       <tr>
                           <td>{$r['name']}</td>
                           <td>
                                <form action='friends-view.php'method='post'>
                                    <input type='hidden' name='id' value='{$r['id']}'>
                                    <button type='submit' name='submit'>Remove</button>
                                </form>
                            </td>
                        </tr>
                ";
            }
        }
        ?>
    </table>
    <a href="add-friends-view.php">Add Friends</a>
</div>
</body>
</html>
