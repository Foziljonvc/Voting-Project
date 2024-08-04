<?php

declare(strict_types=1);

session_start();

$update = json_decode(file_get_contents('php://input'));

date_default_timezone_set('Asia/Tashkent');

require "vendor/autoload.php";

if (isset($update)) {
    require 'bot.php';
}

require 'router.php';

//
//// Telegram bot tokeningiz
//$botToken = '';
//
//// Chat ID (shaxsiy ID, guruh ID yoki kanal ID)
//$chatId = 'CHAT_ID';
//
//// getChat URL
//$url = "https://api.telegram.org/bot$botToken/getChat?chat_id=$chatId";
//
//// cURL sessiyasini boshlash
//$ch = curl_init();
//
//// cURL parametrlarini o'rnatish
//curl_setopt($ch, CURLOPT_URL, $url);
//curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
//
//// So'rovni bajarish va javobni olish
//$response = curl_exec($ch);
//
//// Xato bo'lganini tekshirish
//if (curl_errno($ch)) {
//    echo 'Error:' . curl_error($ch);
//} else {
//    // Javobni JSON'dan PHP arrayiga o'zgartirish
//    $responseData = json_decode($response, true);
//
//    // Chat ma'lumotlarini chiqarish
//    if ($responseData['ok']) {
//        $chat = $responseData['result'];
//        echo "Chat nomi: " . $chat['title'] . "\n";
//        echo "Chat ID: " . $chat['id'] . "\n";
//        echo "Chat turi: " . $chat['type'] . "\n";
//        echo "Chat description: " . ($chat['description'] ?? 'No description') . "\n";
//    } else {
//        echo "Xato: " . $responseData['description'] . "\n";
//    }
//}
//
//// cURL sessiyasini yopish
//curl_close($ch);

//$data = json_decode(file_get_contents("php://input"), true);
//
//if (isset($data['message'])) {
//    header("location: /{$_GET}");
//}
//
//echo json_encode(['status' => 'success']);
//
//if (isset($_SERVER['HTTP_REFERER'])) {
//    $_SESSION['previous_page'] = parse_url($_SERVER['HTTP_REFERER'], PHP_URL_PATH);
//    var_dump($_SESSION['previous_page']);
//}
