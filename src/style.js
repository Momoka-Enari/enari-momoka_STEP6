function validateForm() {

    let name = document.getElementById('name').value;
    let company = document.getElementById('companyName').value;
    let email = document.getElementById('email').value;
    let age = document.getElementById('age').value;
    let message = document.getElementById('message').value;

    if (name === "" || company === "" || email === "" || age === "" || message === "") {
        alert("必須項目が未入力です。入力内容をご確認ください。");
        return false;
    }

    return confirm(
        "確認画面に進みます。よろしいですか？ \n\n" +
        "お名前：" + name + "\n" +
        "会社名：" + company + "\n" +
        "メール：" + email + "\n" +
        "年齢：" + age + "\n" +
        "お問い合わせ内容：" + message + "\n"
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
