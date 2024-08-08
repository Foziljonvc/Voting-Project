<?php

use GuzzleHttp\Exception\GuzzleException;

$sendMessage = new BotSendMessage();
$admin = new Admin();

if (isset($update->message)) {
    $message = $update->message;
    $chat_id = $message->chat->id;
    $user_id = $message->from->id;
    $text = $message->text;
    $username = $message->from->username;
    $first_name = $message->from->first_name;

    if ($text === '/start') {
        $admin->deleteStatus($user_id);
        try {
            $sendMessage->sendStartMessage((int)$chat_id, "Assalomu aleykum", $first_name, $username, "Ovoz berish botimizga <b>Xush kelibsiz</b>");
        } catch (GuzzleException $e) {
        }
        if (!(new Admin())->UserId($user_id)) {
            (new Admin())->saveUserId($user_id);
        }
        return;
    }

    if ($text === '/admin') {
        $admin->deleteStatus($user_id);
        if ($admin->checkUserId($chat_id)) {
            try {
                $sendMessage->sendAdminMessage((int)$chat_id, "<i>$first_name</i>\n <b>Admin</b> panel bo'limiga xush kelibsiz");
            } catch (GuzzleException $e) {
            }
        }
        return;
    }

    if ($text === '/ads') {
        $admin->deleteStatus($user_id);
        if ($admin->checkUserId($chat_id)) {
            $admin->saveStatus("ads", $user_id);
            try {
                $sendMessage->sendMessageAds((int)$chat_id, "<b>Reklama</b> uchun kerakli ma'lumotni kiriting:");
            } catch (GuzzleException $e) {
            }
        }
        return;
    }

    if ($text === '/documentation') {
        $admin->deleteStatus($user_id);
        if ($admin->checkUserId($chat_id)) {
            try {
                $sendMessage->sendMessageAds($chat_id, "<i><b>Assalomu aleykum!</b></i>
Barcha <b>hujjatlar</b> royxatini olish uchun shu linkni bosing!");
            } catch (GuzzleException $e) {
            }
        }
        return;
    }

//    $response = $admin->getStatus("ads");
//
//    if ($response['status'] === 'ads') {
//        $admin->deleteStatus();
//        $admin->saveAds($chat_id, $update->message->message_id);
//        $admin->deleteStatus();
//        try {
//            $sendMessage->sendMessageAds((int)$chat_id, "<b>Reklama</b> muvaffaqiyatli saqlandi:");
//        } catch (GuzzleException $e) {
//        }
//        return;
//    }

    if ($text === '/sendAds') {
        $admin->deleteStatus($user_id);
        if ($admin->checkUserId($chat_id)) {
            try {
                $admin->sendUserAds();
            } catch (GuzzleException $e) {
            }
        }
        return;
    }


    if (!$admin->getStatus('ads')) {
        try {
            $sendMessage->sendNoneMessage($chat_id);
        } catch (GuzzleException $e) {
        }
    }

    $response = $admin->getStatus("ads");
    if ($response['status'] === 'ads') {
        $admin->saveAds($chat_id, $update->message->message_id);
        $admin->deleteStatus($user_id);
        try {
            $sendMessage->sendMessageAds((int)$chat_id, "<b>Reklama</b> muvaffaqiyatli saqlandi:");
        } catch (GuzzleException $e) {
        }
        return;
    }

    return;
}


if (isset($update->callback_query)) {
    $callback_query = $update->callback_query;
    $chat_id        = $callback_query->message->chat->id;
    $callback_data  = $callback_query->data;
    $text           = $callback_query->text;


    if ($callback_data === 'btn1') {
        try {
            $sendMessage->sendReplayMarkupMessage($chat_id, "<b>User</b> larga yubormoqchi bolgan matinni kiriting:");
        } catch (GuzzleException $e) {
        }
    } elseif ($callback_data === 'btn2') {
        try {
            $sendMessage->sendReplayMarkupMessage($chat_id, "<b>Rasim</b> yuboring\n❗️ <b>Iltimos</b> <b><u>Caption</u></b> qo'shib yuboring:");
        } catch (GuzzleException $e) {
        }
    } elseif ($callback_data === 'btn3') {
        try {
            $sendMessage->sendReplayMarkupMessage($chat_id, "<b>Video</b> yuboring\n❗️ <b>Iltimos</b> <b><u>Caption</u></b> qo'shib yuboring:");
        } catch (GuzzleException $e) {
        }
    }
}