<?php
    require ('db.php');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style/main.css">
    <title>About</title>
</head>
<body>
    <div class="container border-dark">
        <h1>About|My Friends System</h1>
        <table>
            <tr>
                <td>Project Owner:</td>
                <td>W.A.N.I.Kularathne</td>
            </tr>
            <tr>
                <td>Database Server:</td>
                <td><?=$conn->host_info?></td>
            </tr>
            <tr>
                <td>Server Name:</td>
                <td><?=$_SERVER['SERVER_NAME']?></td>
            </tr>
        </table>
    </div>
</body>
</html>
