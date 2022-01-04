<?php
require_once('config.php');
date_default_timezone_set('Asia/Tokyo');

// Slackから最新メッセージの取得
$_ = function($s){return $s;};
$url = "https://slack.com/api/conversations.history?channel={$_(CHANNEL_ID)}&limit=1";
$data = array(
    'token' => SLACK_MESSAGE_TOKEN,
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
$message = $res["messages"][0]["text"];

// オウム返し
$url = "https://slack.com/api/chat.postMessage";
$data = array(
    'token' => SLACK_MESSAGE_TOKEN,
    'channel' => CHANNEL_ID,
    'text' => $message
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
    return;
}
echo 'post succeed!';