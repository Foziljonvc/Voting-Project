<?php

declare(strict_types=1);

use GuzzleHttp\Client;

class BotSendMessage {

    const TOKEN = "7304580083:AAElYIaMH64ZPgXkFhgPpYGOA_JgWec3pUs";
    const TgAPI = 'https://api.telegram.org/bot' . self::TOKEN . '/';

    private Client $client;

    public function __construct() {
        $this->client = new Client(['base_uri' => self::TgAPI]);
    }

    public function sendMessage(int $chatId, string $text, $username): void
    {
        $this->client->post('sendMessage', [
            'form_params' => [
                'chat_id' => $chatId,
                'text' => $text . ' ' . $username
            ]
        ]);
    }

    public function getChat(int $chatId): \Psr\Http\Message\ResponseInterface
    {
        return $this->client->post('getChat', [
           'form_params' => [
               'chat_id' => $chatId
           ]
       ]);
    }
}