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
    $sql = "INSERT INTO user_friend VALUES ('{$uid}','{$id}')";
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
    <title>Add Friends</title>
</head>
<body>
<div class="container">
    <h1>Add Friends | My Friends System</h1>
    <table class="table">
        <?php
        $uid = $_SESSION['uid'];

        $not_in_ids = array($uid); // to ignore this user

        // to fetch current friends
        $sql = "SELECT DISTINCT id FROM user_friend WHERE uid = {$uid}";
        $res = $conn->query($sql);
        if ($res->num_rows) {
            while ($r = $res->fetch_array()) {
                $not_in_ids[] = $r['id']; // add current friends
            }
        };

        $not_in_ids_str = $str = implode(", ", $not_in_ids);

        // to count
        $sql = "SELECT COUNT(id) AS count FROM user WHERE id NOT IN ({$not_in_ids_str})";
        $res = $conn->query($sql);
        $count = $res->fetch_array()['count'];
        $num_pages = ceil($count / $limit);


        $sql = "SELECT id,name FROM user WHERE id NOT IN ({$not_in_ids_str}) LIMIT {$start},{$limit}";
        $res = $conn->query($sql);

        if ($res->num_rows) {
            while ($r = $res->fetch_array()) {
                echo "
                       <tr>
                           <td>{$r['name']}</td>
                           <td>
                                <form action='add-friends-view.php'method='post'>
                                    <input type='hidden' name='id' value='{$r['id']}'>
                                    <button type='submit' name='submit'>Add</button>
                                </form>
                            </td>
                        </tr>
                ";
            }
        }
        ?>
    </table>
    <div>
        <?php if ($page != 1): ?>
            <a href="<?= $_SERVER['PHP_SELF'] . "?page=" . ($page - 1) ?>">Previous</a>
        <?php endif; ?>
        <?php for ($i = 1; $i <= $num_pages; $i++): ?>
            <?php if ($page == $i): ?>
                <a href="<?= $_SERVER['PHP_SELF'] . "?page=" . ($i) ?>" class="active"><?= $i ?></a>
            <?php else: ?>
                <a href="<?= $_SERVER['PHP_SELF'] . "?page=" . ($i) ?>" ><?= $i ?></a>
            <?php endif; ?>
        <?php endfor; ?>
        <?php if ($page != $num_pages): ?>
            <a href="<?= $_SERVER['PHP_SELF'] . "?page=" . ($page + 1) ?>">Next</a>
        <?php endif; ?>

    </div>
    <a href="logout.php">Log out</a>
</div>
</body>
</html>
