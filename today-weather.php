<?php
require_once('config.php');
date_default_timezone_set('Asia/Tokyo');

// 今日の天気を取得して整形
$response = file_get_contents('https://weather.tsukumijima.net/api/forecast/city/140010');
$weather = json_decode($response, true);

$text = array(
    date("Y/m/d"),
    $weather['title'],
    get_weather($weather, 0),
    "最高気温：".$weather['forecasts'][0]['temperature']['max']['celsius']."度",
    "----",
    date("Y/m/d", strtotime("+1 day")),
    get_weather($weather, 1),
    "最高気温：".$weather['forecasts'][1]['temperature']['max']['celsius']."度",
    "最低気温：".$weather['forecasts'][1]['temperature']['min']['celsius']."度",
);

// SlackにPOSTリクエスト送信
$url = "https://slack.com/api/chat.postMessage";
$data = array(
    'token' => SLACK_API_TOKEN,
    'channel' => CHANNEL_ID,
    'text' => implode("\r\n", $text)
);

$context = array(
    'http' => array(
        'method' => 'POST',
        'header' => implode("\r\n", array(
            'Content-Type: application/x-www-form-urlencoded',
        )),
        'content' => http_build_query($data)
    )
);

$html = file_get_contents($url, false, stream_context_create($context));

$res = json_decode($html, true);
if (!$res['ok']) {
    echo 'post failed...';
}
echo 'post succeed!';

/**
 * 天気を返す ex:晴れのち曇
 * 
 * @param array $weather 天気APIからの返り値
 * @param int $index 添え字 ex：今日=0、明日=1、明後日=2
 * @return string 添え字で指定した日の天気
 */
function get_weather($weather, $index) {
    if ($index > 3) {
        return null;
    }

    return $weather['forecasts'][$index]['telop'];
}