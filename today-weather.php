<?php
date_default_timezone_set('Asia/Tokyo');

$response = file_get_contents('https://weather.tsukumijima.net/api/forecast/city/140010');
$weather = json_decode($response, true);

echo date("Y/m/d"), "\n";
echo $weather['title'], "\n";
echo $weather['forecasts'][0]['telop'], "\n";
echo "予想最高気温：", $weather['forecasts'][0]['temperature']['max']['celsius'], "度";