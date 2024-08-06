<?php

declare(strict_types=1);

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class BotSendMessage {

    const TOKEN = "7304580083:AAElYIaMH64ZPgXkFhgPpYGOA_JgWec3pUs";
    const TgAPI = 'https://api.telegram.org/bot' . self::TOKEN . '/';

    private Client $client;

    public function __construct() {
        $this->client = new Client(['base_uri' => self::TgAPI]);
    }

    /**
     * @throws GuzzleException
     */
    public function sendStartMessage(int $chatId = null, string $text1 = null, string $firstName = null, string $username = null, string $text2 = null): void
    {
        $this->client->post('sendMessage', [
            'form_params' => [
                'chat_id' => $chatId,
                'text' => '👋' . "$text1" . ' ' . "<b><i>$firstName</i></b>" . "\n\n" . '😊'."<i>$text2</i>",
                'parse_mode' => 'HTML'
            ]
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function sendAdminMessage(int $chatId, string $text1, string $firstName = null): void
    {
        $this->client->post('sendMessage', [
            'form_params' => [
                'chat_id' => $chatId,
                'text' => '➡️ ' . $text1,
                'parse_mode' => 'HTML'
            ]
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function sendReplayMarkupMessage(int $chatId, string $text): void
    {
        $this->client->post('sendMessage', [
            'form_params' => [
                'chat_id' => $chatId,
                'text' => $text,
                'parse_mode' => 'HTML'
            ]
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function sendMessageAds(int $chatId, string $text): void
    {
        $this->client->post('sendMessage', [
            'form_params' => [
                'chat_id' => $chatId,
                'text' => $text,
                'parse_mode' => 'HTML'
            ]
        ]);
    }

    /**
     * @throws GuzzleException
     */
    public function sendAllMessageAds(int $chatId, array|false $response): void
    {
        foreach ($response as $ads) {
            $this->client->post('copyMessage', [
                'form_params' => [
                    'chat_id' => $chatId,
                    'from_chat_id' => $ads['chatId'],
                    'message_id' => $ads['messageId']
                ]
            ]);
        }
    }
    /**
     * @throws GuzzleException
     */
    public function sendNoneMessage(int $chatId): void
    {
        $this->client->post('sendMessage', [
            'form_params' => [
                'chat_id' => $chatId,
                'text' => "❗️<b>Iltimos berilgan ketma-ketlik bo'yicha,\n amallarni kiriting</b>",
                'parse_mode' => 'HTML'
            ]
        ]);
    }


}