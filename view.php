<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>一言掲示板 - 投稿一覧</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>📜 投稿一覧</h1>
    <p><a href="form.php">← 投稿フォームへ戻る</a></p>
<link rel="stylesheet" href="css/style.css">
<?php
$pdo = new PDO('mysql:host=mysql304.phy.lolipop.lan;dbname=LAA1602730-php2024;charset=utf8', 'LAA1602730', 'Watabeno1417');

$sql = $pdo->query("
    SELECT comment.content, comment.created_at, user.username
    FROM comment
    JOIN user ON comment.user_id = user.id
    ORDER BY comment.created_at DESC
");

foreach ($sql as $row) {
    echo "<div class='post'>";
    echo "<p><strong>" . htmlspecialchars($row['username']) . "</strong> さん (" . $row['created_at'] . ")</p>";
    echo "<p>" . nl2br(htmlspecialchars($row['content'])) . "</p>";
    echo "</div><hr>";
}
?>
