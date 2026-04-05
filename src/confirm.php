<?php
// POSTメソッドでアクセスされた場合のみ値を受け取る
if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: contact.php");
    exit;
}

$name    = $_POST["name"]        ?? "";
$company = $_POST["companyName"] ?? "";
$email   = $_POST["email"]       ?? "";
$age     = $_POST["age"]         ?? "";
$message = $_POST["message"]     ?? "";

function h($s) { return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
?>

<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>お問い合わせフォーム - 確認画面</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="header">
    <h2>お問い合わせフォーム - 確認画面</h2>
    </div>
<div id="container">
    <div id="aside">
    <nav>
    <ul>
    <li><a href="https://recruit.ysinc.co.jp/blog/7-8/">トップページ</a></li>
    <li><a href="https://recruit.ysinc.co.jp/blog/7-8/">人気投稿</a></li>
    <li><a href="https://recruit.ysinc.co.jp/blog/7-8/">エンジニアおすすめ商品</a></li>
    <li><a href="https://recruit.ysinc.co.jp/blog/7-8/">エンジニアおすすめ記事</a></li>
    <li><a href="https://recruit.ysinc.co.jp/blog/7-8/">投稿ページ</a></li>
    </ul>
    </nav>
    </div>
    <div id="main">
    <form action="send.php" method="post" onsubmit="return confirmSubmit()">
<table border = "3">
    <tr><th>お名前</th><td id="name"><?= $name ?></td></tr>
    <tr><th>会社名</th><td id="company"><?= $company ?></td></tr>
    <tr><th>メールアドレス</th><td id="email"><?= $email ?></td></tr>
    <tr><th>年齢</th><td id="age"><?= $age ?></td></tr>
    <tr><th>お問い合わせ内容</th><td id="message"><?= nl2br($message) ?></td></tr>
</table>

    <input type="hidden" name="name" value="<?= htmlspecialchars($name) ?>">
    <input type="hidden" name="companyName" value="<?= htmlspecialchars($company) ?>">
    <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
    <input type="hidden" name="age" value="<?= htmlspecialchars($age) ?>">
    <input type="hidden" name="message" value="<?= htmlspecialchars($message) ?>">
<br>
<div class="button-area">
    <input type="button" value="戻る" onclick="history.back()">
    <input type="submit" value="送信">
</div>
</form>
</div>
</div>
<div id="footer">
</div>


<script src="style.js"></script>
<script>
function confirmSubmit() {
    let name = document.getElementById("name").innerText;
    let company = document.getElementById("company").innerText;
    let email = document.getElementById("email").innerText;
    let age = document.getElementById("age").innerText;
    let message = document.getElementById("message").innerText;

    return confirm(
    "下記の内容を本当に送信しますか? \n\n" +
    "お名前：" + name + "\n" +
    "会社名：" + company + "\n" +
    "メール：" + email + "\n" +
    "年齢：" + age + "\n" +
    "お問い合わせ内容：" + message + "\n"
    );
}
</script>

</body>
</html>