<?php
session_start();

$pdo = new PDO('mysql:host=localhost;dbname=user;charset=utf8', 'root', '');
$sql = $pdo->prepare('SELECT * FROM user WHERE username = ?');
$sql->execute([$_POST['username']]);
$result = $sql->fetch(PDO::FETCH_ASSOC);

if ($result && $_POST['pass'] === $result['password']) { 
     $update_sql = $pdo->prepare('UPDATE user SET created_at = NOW() WHERE id = ?');
    $update_sql->execute([$result['id']]);//ログイン時間更新

    $_SESSION['user'] = [
        'id' => $result['id'],
        'name' => $result['username'],
        'created_at' => date('Y-m-d H:i:s')
    ];
     // ✅ ユーザー名をセッションに保存
    $_SESSION['username'] = $result['username'];
    header("Location: form.php");
    exit();
} else {
    echo "ログイン認証に失敗しました。<br>UsernameまたはPasswordが違います。";
}
?>
