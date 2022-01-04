function greeter() {
    // テキストボックスの入力値を取得
    var text_box = document.getElementById("name");
    var name = text_box.value;

    // 新たな要素を作成
    var new_element = document.createElement("h3");
    new_element.textContent = "Hello " + name;

    // 親要素の子要素として挿入
    var parent = document.getElementById("body");
    parent.appendChild(new_element);
}
