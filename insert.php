<?php
$host = 'localhost'; // サーバー名
$db   = 'my_database'; // データベース名
$user = 'root'; // ユーザー名（XAMPPではroot）
$pass = ''; // パスワード（XAMPPでは空）
$charset = 'utf8mb4';

try {
    // データベース接続
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass);

    // SQL実行
    $stmt = $pdo->prepare("INSERT INTO users (name, email) VALUES (?, ?)");
    $stmt->execute([$_POST['name'], $_POST['email']]);

    echo "登録しました！";
} catch (PDOException $e) {
    echo "接続失敗: " . $e->getMessage();
}
?>
