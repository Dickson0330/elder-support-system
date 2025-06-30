<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>タスクの作成</title>
  <style>
    body {
      font-family: 'Segoe UI', sans-serif;
      background: linear-gradient(-45deg, #ff9a9e, #fad0c4, #fbc2eb, #a18cd1);
      background-size:400% 400%;
      margin: 10px;
      padding: 10px;
      text-align: center;
    }
    h1 {
  margin-bottom: 40px;
  font-size: 48px;
  color: #ffffff;
  text-shadow: 0 0 10px #ff6699, 0 0 20px #ff99cc, 0 0 30px #ff6699;
  animation: glow 5s ease-in-out infinite alternate;
}
  </style>
</head>

  <h1>ログイン</h1>
<?php
session_start();

if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

$correct_username = "abc";
$correct_password = "123";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"] ?? "";
    $password = $_POST["password"] ?? "";

    if ($username === $correct_username && $password === $correct_password) {
        $_SESSION["logged_in"] = true;
        header("Location: index.php");
        exit;
    } else {
        $error = "ユーザー名またはパスワードが間違っています";
    }
}
?>

<form method="post">
    <input type="text" name="username" placeholder="ユーザー名" required><br>
    <input type="password" name="password" placeholder="パスワード" required><br>
    <button type="submit">ログイン</button>
    <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
</form>

