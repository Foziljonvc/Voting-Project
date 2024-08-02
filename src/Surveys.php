<?php

declare(strict_types=1);

class Surveys extends DB
{
    public function addSurveys (string $name, string $description)
    {
        $stmt = $this->pdo->prepare("INSERT INTO surveys (name, description) VALUES (:name, :description)");
        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":description", $description);
        $stmt->execute();
    }

    public function getSurveys ()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM surveys");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

//CREATE TABLE surveys (
//    id INT AUTO_INCREMENT PRIMARY KEY,
//    name VARCHAR(255),
//    description TEXT
//);