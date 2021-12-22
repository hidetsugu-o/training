<?php
$response = file_get_contents('https://weather.tsukumijima.net/api/forecast/city/140010');
$weather = json_decode($response, true);

echo date("Y/m/d"), "\n";
echo $weather['title'], "\n";
echo $weather['forecasts'][0]['telop'], "\n";