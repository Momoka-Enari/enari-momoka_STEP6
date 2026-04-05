<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
header('Location: contact.php');
exit;
}

$send_result = false;
$error_msg = '';

$name        = $_POST['name'] ?? '';
$companyName = $_POST['companyName'] ?? '';
$email       = $_POST['email'] ?? '';
$age         = $_POST['age'] ?? '';
$message     = $_POST['message'] ?? '';

if ($name === '' || $email === '' || $message === '') {
$error_msg = '必須項目が不足しています。';
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$error_msg = 'メールアドレスの形式が正しくありません。';
} else {
  // ========= 疑似送信（ログ保存）=========
$logDir = __DIR__ . '/logs';
if (!is_dir($logDir)) {
    mkdir($logDir, 0777, true);
}

$subject = "【お問い合わせ】フォームから受信";
$body =
    "お名前: {$name}\n" .
    "会社名: {$companyName}\n" .
    "メール: {$email}\n" .
    "年齢: {$age}\n" .
    "----------------------\n" .
    "{$message}\n";

$log = "---- " . date('Y-m-d H:i:s') . " ----\n"
    . "SUBJECT: {$subject}\n"
    . $body
    . "\n";

$logFile = $logDir . '/mail.log';
$written = file_put_contents($logFile, $log, FILE_APPEND | LOCK_EX);

  // ログ保存できたら「送信成功扱い」
if ($written === false) {
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
<p>送信が完了しました。ありがとうございました！</p>
<?php else: ?>
<p>送信に失敗しました。</p>
<pre><?php echo htmlspecialchars($error_msg ?? 'unknown error', ENT_QUOTES, 'UTF-8'); ?></pre>
<?php endif; ?>

<p><a href="contact.php">お問い合わせフォームに戻る</a></p>
</body>
</html>