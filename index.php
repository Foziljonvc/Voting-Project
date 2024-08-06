<?php

declare(strict_types=1);

session_start();

$update = json_decode(file_get_contents('php://input'));

date_default_timezone_set('Asia/Tashkent');

require "vendor/autoload.php";

if ($update !== NULL) {
    require 'bot.php';
} else {
    require 'router.php';
}