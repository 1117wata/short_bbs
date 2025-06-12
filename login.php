<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>ログイン</h1>
   <form action="check.php" method="post">
        ユーザー名: <input type="text" name="username" value="渡部泰輝"><br>
        パスワード: <input type="password" name="pass" value="12345"><br>
    <input type="submit" value="ログイン">
    </form>
</body>
</html>