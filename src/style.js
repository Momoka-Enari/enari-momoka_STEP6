function validateForm() {
    let name = document.getElementById('name').value;
    let company = document.getElementById('companyName').value;
    let email = document.getElementById('email').value;
    let age = document.getElementById('age').value;
    let message = document.getElementById('message').value;

    let hasError = false;

    // 一旦エラーメッセージを空にする
    document.getElementById("nameError").innerText = "";
    document.getElementById("companyError").innerText = "";
    document.getElementById("emailError").innerText = "";
    document.getElementById("ageError").innerText = "";
    document.getElementById("messageError").innerText = "";

    //お名前
    if (name.trim() === "") {
        document.getElementById("nameError").innerText =
        ("※お名前の入力は必須です");
        hasError = true;
    }

    // 会社名
    if (company.trim() === "") {
        document.getElementById("companyError").innerText =
        ("※会社名の入力は必須です");
        hasError = true;
    }

    // メール
    if (email.trim() === "") {
        document.getElementById("emailError").innerText =
        ("メールアドレスの入力は必須です");
        hasError = true;
    }

    // 年齢
    if (age.trim() === "") {
        document.getElementById("ageError").innerText =
        ("年齢の入力は必須です");
        hasError = true;
    }

     //お問い合わせ内容
    if (message.trim() === "") {
        document.getElementById("messageError").innerText =
        ("お問い合わせ内容の入力は必須です");
        hasError = true;
    }

    // エラーがあれば送信しない
    if (hasError) {
    alert("必須項目が未入力です。入力内容をご確認ください。");
    return false;
}

    return confirm(
        "確認画面に進みます。よろしいですか？ \n\n" +
        "お名前：" + name + "\n" +
        "会社名：" + company + "\n" +
        "メール：" + email + "\n" +
        "年齢：" + age + "\n" +
        "お問い合わせ内容：" + message
    );
}

    function confirmSubmit() {
    return confirm("入力内容を送信します。よろしいですか？");
}

let colors = ["blue", "red", "yellow", "gray"];
let currentIndex = 0;

function changeBackground() {
    let footer = document.querySelector("#footer");
    
    footer.style.backgroundColor = colors[currentIndex];

    currentIndex++;

    if (currentIndex >= colors.length) {
        currentIndex = 0;
    }
}

document.addEventListener("DOMContentLoaded", function() {
    let button = document.querySelector("#colorButton");
    button.addEventListener("click", changeBackground);
})
