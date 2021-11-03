<?php

/**
* Usage: php register.php HEROKU_PROJECT TELEGRAM_BOT_TOKEN
*/

// check if script is called from PHP cli, otherwise block execution
if(php_sapi_name() !== 'cli'){
	header("HTTP/1.1 404 Not Found");
	exit;
}

// check if cli args are present
if(count($argv) < 3){
	exit(sprintf("Arguments not provided, usage:\nphp %s HEROKU_PROJECT TELEGRAM_BOT_TOKEN \n\n", basename(__FILE__)));
}

// bind telegram bot to heroku project
$parameters = array('url' => 'https://' . $argv[1] . '.herokuapp.com/execute.php');
$url = 'https://api.telegram.org/bot' . $argv[2] .'/setWebhook?' . http_build_query($parameters);
$handle = curl_init($url);
curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);
curl_setopt($handle, CURLOPT_CONNECTTIMEOUT, 5);
curl_setopt($handle, CURLOPT_TIMEOUT, 60);
$result = curl_exec($handle);
print_r($result);
