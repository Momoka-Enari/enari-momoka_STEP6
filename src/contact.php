<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
    <title>お問い合わせフォーム</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="header">
<h2>お問い合わせフォーム</h2>
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
    <form action="confirm.php" method="post" onsubmit="return validateForm()">
<table border = "3">
    <tr>
        <th>お名前</th>
        <th><input type="text" name="name" id="name" size="40"></th>
    </tr>
    <tr>
        <th>会社名</th>
        <th><input type="text" name="companyName" id="companyName" size="40"></th>
    </tr>
    <tr>
        <th>メールアドレス</th>
        <th><input type="text" name="email" id="email" size="40"></th>
    </tr>
    <tr>
        <th>年齢</th>
        <th><input type="text" name="age" id="age" size="40"></th>
    </tr>
    <tr>
        <th>お問い合わせ内容</th>
        <th><textarea name="message" id="message" cols="30" rows="5"></textarea></th>
    </tr>
</table>
<div class="submit-area">
    <input type="submit" value="送信">
    </div>
</form>
</div>
</div>

<div id="footer">
    <p>下のボタンを押すとfooterの背景色が変わります。</p>
    <input type="button" value="押してみてね！" onclick="changeBackground()">
</div>


<script src="style.js"></script>

</body>
</html>