<?php
session_start();

$pdo = new PDO('mysql:host=localhost;dbname=user;charset=utf8', 'root', '');
$sql = $pdo->prepare('SELECT * FROM user WHERE username = ?');
$sql->execute([$_POST['username']]);
$result = $sql->fetch(PDO::FETCH_ASSOC);

if ($result && $_POST['pass'] === $result['password']) { 
    $_SESSION['user'] = [
        'id' => $result['id'],
        'name' => $result['username']
    ];
    header("Location: form.php");
    exit();
} else {
    echo "ログイン認証に失敗しました。<br>UsernameまたはPasswordが違います。";
}
?>
