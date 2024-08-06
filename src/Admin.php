<?php

declare(strict_types=1);

use JetBrains\PhpStorm\NoReturn;

class Admin extends DB
{
    #[NoReturn] public function login(string $username, string $password): void
    {
        $stmt = $this->pdo->prepare("SELECT * FROM admin WHERE username = :username");
        $stmt->bindParam(":username", $username);
        $stmt->execute();

        $result = $stmt->fetch();

        if ($result && password_verify($password, $result['password']) && $result['username'] === $username) {
            $_SESSION['username'] = $username;
            $_SESSION['check'] = 1;
            unset($_SESSION['error']);
            header('Location: /admin');
        } else {
            $_SESSION['error'] = "Password or username is incorrect";
            header('Location: /login');
        }
        exit();
    }
    #[NoReturn] public function checkAvailability(): void
    {
        if (!isset($_SESSION['username'])) {
            $_SESSION['check'] = 1;
            header('Location: /login');
            exit();
        }
//        } elseif ($_SESSION['check'] === 1) {
//            unset($_SESSION['check']);
//            require 'pages/adminPanel.php';
//            exit();
//        }
    }
    #[NoReturn] public function logout(): void
    {
        session_destroy();

        header('Location: /login');
        exit();
    }
    public function get(string $path, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === $path) {
            $callback();
            exit();
        }
    }

    public function post(string $path, $callback): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) === $path) {
            $callback();
            exit();
        }
    }

    #[NoReturn] public function delete(int $id, string $table, string $dynamicHeader = NULL): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM $table WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        header("location: /{$dynamicHeader}");
        exit();
    }

    #[NoReturn] public function edit(int $id, string $table, string $name, string $dynamicHeader): void
    {
        $stmt = $this->pdo->prepare("UPDATE $table SET name = :name WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->execute();

        header("location: /{$dynamicHeader}");
        exit();
    }

    #[NoReturn] public function notFount(): void
    {
        http_response_code(response_code: 404);
        require 'pages/partials/errors.php';
        exit();
    }

    public function checkUserId(int $chatId): bool
    {
        $stmt = $this->pdo->prepare("SELECT userId FROM admin WHERE userId = :chatId");
        $stmt->bindParam(":chatId", $chatId);
        $stmt->execute();

        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result !== false;
    }

    public function saveAds(int $chatId, int $messageId): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO ads (chatId, messageId) VALUES (:chatID, :messageId)");
        $stmt->bindParam(":chatID", $chatId);
        $stmt->bindParam(":messageId", $messageId);
        $stmt->execute();
    }

    public function saveStatus(string $status): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO user (status) VALUES (:status)");
        $stmt->bindParam(":status", $status);
        $stmt->execute();
    }

    public function getStatus(string $status)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM user WHERE status = :status");
        $stmt->bindParam(":status", $status);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC) ?? false;
    }

    public function deleteStatus(): void
    {
        $stmt = $this->pdo->prepare("TRUNCATE TABLE user");
        $stmt->execute();
    }

    public function getAllAds(int $chatId): false|array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM ads WHERE chatId = :chatId");
        $stmt->bindParam(":chatId", $chatId);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?? false;
    }
}

//CREATE TABLE user (
//    id INT AUTO_INCREMENT PRIMARY KEY,
//    status VARCHAR(32)
//);