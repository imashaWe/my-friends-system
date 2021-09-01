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

$page = isset($_GET['page']) ? $_GET['page'] : 1;
$limit = 5;
$start = ($page - 1) * $limit

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
<div class="container border-dark">
    <h1>My Friends | My Friends System</h1>
    <?php
    $uid = $_SESSION['uid'];

    // to count
    $sql = "SELECT COUNT(id) AS count FROM user_friend WHERE uid = {$uid}";
    $res = $conn->query($sql);
    $count = $res->fetch_array()['count'];
    $num_pages = ceil($count / $limit);

    $sql = "SELECT user.id AS id,name FROM user_friend INNER JOIN user ON user_friend.id = user.id WHERE uid = {$uid} LIMIT {$start},{$limit}";
    $res = $conn->query($sql);
    ?>
    <p>User Name:<b><?=$_SESSION['name']?></b></p>
    <p>Total Number of Friends:<b><?=$count?></b></p>
    <table class="table">
        <?php

        if ($res->num_rows) {
            while ($r = $res->fetch_array()) {
                echo "
                       <tr>
                           <td>{$r['name']}</td>
                           <td width='30'>
                                <form action='friends-view.php'method='post'>
                                    <input type='hidden' name='id' value='{$r['id']}'>
                                    <button type='submit' name='submit'>Unfriend</button>
                                </form>
                            </td>
                        </tr>
                ";
            }
        }
        ?>
    </table>
    <div class="pagination">
        <?php if ($page != 1): ?>
            <a href="<?= $_SERVER['PHP_SELF'] . "?page=" . ($page - 1) ?>">Previous</a>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $num_pages; $i++): ?>
            <?php if ($page == $i): ?>
                <a href="<?= $_SERVER['PHP_SELF'] . "?page=" . ($i) ?>" class="active"><?= $i ?></a>
            <?php else: ?>
                <a href="<?= $_SERVER['PHP_SELF'] . "?page=" . ($i) ?>"><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>
        <?php if ($page != $num_pages): ?>
            <a href="<?= $_SERVER['PHP_SELF'] . "?page=" . ($page + 1) ?>">Next</a>
        <?php endif; ?>

    </div>
    <a href="add-friends-view.php">Add Friends</a>
    <a href="logout.php" style="float: right">Log out</a>
</div>
</body>
</html>
