<?php
$content = file_get_contents("php://input");
/*$content = '{"update_id":534691111,"message":{"message_id":246,"from":{"id":30343769,"is_bot":false,"first_name":"Daniele","username":"Wuzzifuzz","language_code":"it"},"chat":{"id":30343769,"first_name":"Daniele","username":"Wuzzifuzz","type":"private"},"date":1516969830,"text":"Deh"}}';*/
$update = json_decode($content, true);

if(!$update){
  exit;
}

$message = isset($update['message']) ? $update['message'] : "";
$messageId = isset($message['message_id']) ? $message['message_id'] : "";
$chatId = isset($message['chat']['id']) ? $message['chat']['id'] : "";
$firstname = isset($message['chat']['first_name']) ? $message['chat']['first_name'] : "";
$lastname = isset($message['chat']['last_name']) ? $message['chat']['last_name'] : "";
$username = isset($message['chat']['username']) ? $message['chat']['username'] : "";
$date = isset($message['date']) ? $message['date'] : "";
$text = isset($message['text']) ? $message['text'] : "";

//$text = trim($text);
//$text = strtolower($text);

header("Content-Type: application/json");
$parameters = array('chat_id' => $chatId, "text" => $content);
$parameters["method"] = "sendMessage";

//$parameters["reply_markup"] = '{ "keyboard": [["uno", "due"], ["tre", "quattro"], ["cinque"]], "resize_keyboard": true, "one_time_keyboard": false}';

echo json_encode($parameters);
