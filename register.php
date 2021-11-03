<?php

// check if script is called from PHP cli
if(php_sapi_name() !== 'cli'){
	exit;
}

// params to edit
const HEROKU_PROJECT = 'YOUR HEROKU PROJECT NAME';
// do not share your Telegram bot token with anyone!!!
const TELEGRAM_BOT_TOKEN = 'YOUR TELEGRAM BOT TOKEN';

// NON APPORTARE MODIFICHE NEL CODICE SEGUENTE
$parameters = array('url' => 'https://' . HEROKU_PROJECT . '.herokuapp.com/execute.php');
$url = 'https://api.telegram.org/bot' . TELEGRAM_BOT_TOKEN .'/setWebhook?' . http_build_query($parameters);
$handle = curl_init($url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($handle, CURLOPT_TIMEOUT, 60);
$result = curl_exec($handle);
print_r($result);
