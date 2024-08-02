<?php

declare(strict_types=1);

$admin = new Admin();
$surveys = new Surveys();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['surveys']) && isset($_POST['desc'])) {
        $surveys->addSurveys($_POST['surveys'], $_POST['desc']);
        header('location: /home');
    }
    exit();
}

$admin->get('/admin', fn() => require "pages/adminPanel.php");
$admin->get('/login', fn() => require 'pages/auth/login.php');
$admin->get('/adminPanel', fn() => require 'pages/adminPanel.php');
$admin->get('/home', fn() => require 'pages/home.php');
$admin->get('/reklama', fn() => require 'pages/reklama.php');
$admin->get('/votes', fn() => require 'pages/votes.php');
$admin->get('/channels', fn() => require 'pages/channels.php');

$admin->post('/login', fn() => (new Admin())->login($_POST['username'], $_POST['password']));