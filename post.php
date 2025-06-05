<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    die("ログインしていません。");
}

$comment = trim($_POST['comment'] ?? '');
if ($comment === '') {
    header("Location: form.php");
    exit;
}

try {
    $pdo = new PDO('mysql:host=localhost;dbname=user;charset=utf8', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("INSERT INTO comment (user_id, content) VALUES (?, ?)");
    $stmt->execute([$_SESSION['user_id'], $comment]);

    header("Location: view.php");
    exit;

} catch (PDOException $e) {
    echo "DBエラー: " . htmlspecialchars($e->getMessage());
}
