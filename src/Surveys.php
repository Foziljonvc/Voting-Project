<?php

declare(strict_types=1);

use JetBrains\PhpStorm\NoReturn;

class Surveys extends DB
{

    #[NoReturn] public function addSurveys(string $name, string $description): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO surveys (name, description) VALUES (:name, :description)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":description", $description);
        $stmt->execute();

        header('location: /home');
        exit();
    }
    #[NoReturn] public function addSurveryVariants (string $name, int $id): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO survey_variants (survey_id, name) VALUES (:survey_id, :name)");
        $stmt->bindParam(":survey_id", $id);
        $stmt->bindParam(":name", $name);
        $stmt->execute();

        header('location: /insert?id=' . $_SESSION['id']);
        exit();
    }
    #[NoReturn] public function addChannelsId (string $channelId): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO channels (channel_id) VALUES (:channel_id)");
        $stmt->bindParam(":channel_id", $channelId);
        $stmt->execute();

        header('location: /channels');
        exit();
    }
    public function addNewAdmin (string $username, string $password, int $userId): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO admin (username, password, userId) VALUES (:username, :password, :userId)");
        $stmt->bindParam(":username", $username);
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bindParam(":password", $hash);
        $stmt->bindParam(":userId", $userId);
        $stmt->execute();

        header('location: /admin');
    }

    public function getSurveys (): false|array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM surveys");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function  getSurveyInsert (int $id): false|array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM survey_variants WHERE survey_id = :survey_id");
        $stmt->bindParam(":survey_id", $id);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getSurveyName (int $id)
    {
        $stmt = $this->pdo->prepare("SELECT * FROM surveys WHERE id = :id");
        $stmt->bindParam(":id", $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getChannelsId (): false|array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM channels");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getUsersInfo (): false|array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM admin");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

}