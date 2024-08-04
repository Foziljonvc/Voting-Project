<?php

$sendMessage = new BotSendMessage();

$update = json_decode(file_get_contents('php://input'));

if (isset($update->message)) {
    $message = $update->message->text;
    $chat_id = $update->message->chat->id;
    $text = $update->message->text;

    $response = $sendMessage->getChat($chat_id);
    $chat = json_decode($response->getBody());
    $username = $chat->result->username;

    if ($text === '/start') {
        $sendMessage->sendMessage($chat_id, "Welcome my Sound bot", $username);
    }

    if ($text === '/admin') {
        $sendMessage->sendMessage($chat_id, "Enter the advertising", $username);
    }
}