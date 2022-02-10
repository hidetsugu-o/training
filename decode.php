<?php

$total = 500;
$multiplesOf2 = [];

// sumの中に含まれる2の倍数を大きい順に列挙する
for ($i = 1; $i <= $total; $i *= 2) {
    array_unshift($multiplesOf2, $i);
}

// 回答となる2の倍数の組み合わせを得る
$answers = [];
foreach ($multiplesOf2 as $value) {

    // 回答の候補値を足し算
    $sum = array_sum($answers) + $value;

    // 合計値を超えてしまった場合何もせず次の候補値へ
    if ($sum > $total) {
        continue;
    }

    // 回答に追加
    array_unshift($answers, $value);

    // 合計値と一致した場合は処理を終了
    if ($sum == $total) {
        break;
    }
}

var_dump($answers);

// foreach ($multiplesOf2 as $value) {

//     $sum = array_sum($answers) + $value;

//     if ($sum == $total) {
//         array_unshift($answers, $value);
//         break;
//     } elseif ($sum < $total) {
//         array_unshift($answers, $value);
//     }

// }

// foreach ($multiplesOf2 as $value) {

//     $sum = array_sum($answers) + $value;

//     // 合計値を超えてしまう場合は何もせず次へ
//     if ($sum > $total) {
//         continue;
//     }

//     // 合計値に満たない場合は回答に加える
//     if ($sum < $total) {
//         array_unshift($answers, $value);
//         continue;
//     }

//     // 合計値と一致した場合は回答に加えてループから出る
//     if ($sum == $total) {
//         array_unshift($answers, $value);
//         break;
//     }
// }