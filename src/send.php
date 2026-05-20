<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
header('Location: contact.php');
exit;
}

function h($s) {
    return htmlspecialchars($s, ENT_QUOTES, 'UTF-8');
}

$send_result = false;
$error_msg = '';

$name        = $_POST['name'] ?? '';
$companyName = $_POST['companyName'] ?? '';
$email       = $_POST['email'] ?? '';
$age         = $_POST['age'] ?? '';
$message     = $_POST['message'] ?? '';

if ($name === '' ||
    $companyName === '' ||
    $email === '' ||
    $age === '' ||
    $message === ''
    ) {
$error_msg = '必須項目が不足しています。';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$error_msg = 'メールアドレスの形式が正しくありません。';
} else {

    mb_language("Japanese");
    mb_internal_encoding("UTF-8");

    $to = "momopichu01@gmail.com";

    $subject = "【お問い合わせ】フォームから受信";

    $body =
        "お名前：" . $name . "\n" .
        "会社名：" . $companyName . "\n" .
        "メール：" . $email . "\n" .
        "年齢：" . $age . "\n" .
        "----------------------\n" .
        "お問い合わせ内容\n" .
        $message;

    $send_result = mb_send_mail($to, $subject, $body);

    if (!$send_result) {
        $error_msg = 'メール送信に失敗しました。';
    $error_msg = 'ログ保存に失敗しました（権限の可能性があります）。';
} else {
    $send_result = true;
}
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
    <title>お問い合わせフォーム - 送信完了画面</title>
</head>
<body>
<h1>お問い合わせフォーム - 送信完了画面</h1><br>

<?php if ($send_result): ?>
<p>お問い合わせが送信されました。ありがとうございます！</p>
<?php else: ?>
<p>送信に失敗しました。</p>
<pre><?= h($error_msg ?: 'unknown error') ?></pre>
<?php endif; ?>

<p><a href="contact.php">お問い合わせフォームに戻る</a></p>
</body>
</html>