<?php
//session_start();
//
//$pdo = new PDO('mysql:host=localhost;dbname=time', 'foziljonvc', '1220');
//
//$username = 'shohjahon';
//$password = 1220;
//
//// Foydalanuvchini olish
//$stmt = $pdo->prepare("SELECT * FROM users WHERE username = :username");
//$stmt->bind_param(":username", $username);
//$stmt->execute();
//$result = $stmt->get_result();
//$user = $result->fetch_assoc();
//
//if ($user) {
//    $current_time = new DateTime();
//
//    // Agar foydalanuvchi bloklangan bo'lsa
//    if ($user['is_blocked']) {
//        $blocked_until = new DateTime($user['blocked_until']);
//        if ($current_time < $blocked_until) {
//            echo "Siz bloklangansiz. Iltimos, " . $blocked_until->format('Y-m-d H:i:s') . " soatgacha kuting.";
//            exit;
//        } else {
//            // Bloklashni olib tashlash
//            $stmt = $conn->prepare("UPDATE users SET is_blocked = FALSE, failed_attempts = 0, blocked_until = NULL WHERE id = ?");
//            $stmt->bind_param("i", $user['id']);
//            $stmt->execute();
//        }
//    }
//
//    // Parolni tekshirish
//    if (password_verify($password, $user['password_hash'])) {
//        // Login muvaffaqiyatli
//        $_SESSION['username'] = $username;
//        echo "Xush kelibsiz, " . $username . "!";
//    } else {
//        // Noto'g'ri parol
//        $failed_attempts = $user['failed_attempts'] + 1;
//        $stmt = $conn->prepare("UPDATE users SET failed_attempts = ?, last_attempt_time = ? WHERE id = ?");
//        $stmt->bind_param("isi", $failed_attempts, $current_time->format('Y-m-d H:i:s'), $user['id']);
//        $stmt->execute();
//
//        // Agar xato urinishlar soni 3 tadan oshsa, bloklash
//        if ($failed_attempts >= 3) {
//            $block_duration = new DateInterval('PT1H'); // 1 soat bloklash
//            $blocked_until = $current_time->add($block_duration);
//            $stmt = $conn->prepare("UPDATE users SET is_blocked = TRUE, blocked_until = ? WHERE id = ?");
//            $stmt->bind_param("si", $blocked_until->format('Y-m-d H:i:s'), $user['id']);
//            $stmt->execute();
//
//            echo "Ko'p urinishlar uchun bloklandingiz. Iltimos, " . $blocked_until->format('Y-m-d H:i:s') . " soatgacha kuting.";
//        } else {
//            echo "Noto'g'ri parol. Qayta urinib ko'ring.";
//        }
//    }
//} else {
//    echo "Foydalanuvchi topilmadi.";
//}
//?>
