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
    $pdo = new PDO('mysql:host=mysql304.phy.lolipop.lan;dbname=LAA1602730-php2024;charset=utf8', 'LAA1602730', 'Watabeno1417');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->prepare("INSERT INTO comment (user_id, content) VALUES (?, ?)");
    $stmt->execute([$_SESSION['user_id'], $comment]);

    header("Location: view.php");
    exit;

} catch (PDOException $e) {
    echo "DBエラー: " . htmlspecialchars($e->getMessage());
}
