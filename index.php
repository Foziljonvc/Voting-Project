<?php

declare(strict_types=1);

use GuzzleHttp\Exception\GuzzleException;

session_start();

$update = json_decode(file_get_contents('php://input'));

date_default_timezone_set('Asia/Tashkent');

require "vendor/autoload.php";

if ((new Admin())->checkCron()) {
    try {
        (new Admin())->sendUserAds();
    } catch (GuzzleException $e) {
    }
} elseif ($update !== NULL) {
    require 'bot.php';
} else {
    require 'router.php';
}