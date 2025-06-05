<?php
$pdo = new PDO('mysql:host=localhost;dbname=user;charset=utf8', 'root', '');

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
