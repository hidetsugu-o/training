/* --- 変数・関数定義 --- */
var trapCard = function() {
    console.log('トラップカード発動！');
};

var sacrificeCard = function(sacrificeName) {
    console.log(sacrificeName + 'を生贄にするぜ！');
};

// 俺のターン！と表示してから、引数を実行する関数
var myTurn = function(callback) {
    console.log('俺のターン！');
    callback();
}

/* 呼び出し */
myTurn(trapCard);

/* --- コールバック関数自体に引数を渡す場合の記法 */
/* function()を噛ませる */
myTurn(function() {
    sacrificeCard('ハネクリボー');
});

/* .bind()を使用する */
myTurn(sacrificeCard.bind(null, 'ブルーアイズホワイトドラゴン'));