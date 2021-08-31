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
    echo $sql;
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
    <title>Add Friends</title>
</head>
<body>
<div class="container">
    <table>
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

        $sql = "SELECT id,name FROM user WHERE id NOT IN ({$not_in_ids_str})";
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
</div>
</body>
</html>
