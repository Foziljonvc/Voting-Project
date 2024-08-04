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

    public function delete(int $id, string $table, string $dynamicHeader = NULL): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM $table WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        header("location: /{$dynamicHeader}");
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
}