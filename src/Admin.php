<?php

declare(strict_types=1);

global $error;

class Admin extends DB 
{
    public function login (string $username, string $password): bool
    {
        $stmt = $this->pdo->prepare("SELECT * FROM admin WHERE username = :username AND password = :password");
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $password);
        $stmt->execute();
        if ($stmt->fetch(PDO::FETCH_OBJ)) {
            header('Location: /admin');
            $_SESSION['username'] = $username;
        } else {
//            $error = "Hello";
            header('Location: /login');
        }
    }

    public function saveAdminRegistration (string $email, string $password, string $name, string $surname): bool
    {
        $stmt = $this->pdo->prepare("INSERT INTO admin (name, surname, email, password) VALUES (:name, :surname, :email, :password)");
        $stmt->bindParam(':name', $surname);
        $stmt->bindParam(':surname', $surname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
    }

    public function get(string $path, $collback): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_SERVER['REQUEST_URI'] === $path) {
            $collback();
        }
    }

    public function post(string $path, $collback): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_SERVER['REQUEST_URI'] === $path) {
            $collback();
        }
    }

//    public function checkAdmin (string $email, string $password): bool
//    {
//        $stmt = $this->pdo->prepare("SELECT * FROM admin WHERE email = :email AND password = :password");
//        $stmt->bindParam(':email', $email);
//        $stmt->bindParam(':password', $password);
//        $stmt->execute();
//
//        $result = $stmt->fetch(PDO::FETCH_ASSOC);
//
//        if (count($result) == 0) {
//            return $this->saveInfo($email, $password);
//        } else {
//            header('Location: home.php');
//        }
//    }
}