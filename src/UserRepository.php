<?php

namespace App;

class UserRepository
{
    private $pdo;

    public function __construct(\PDO $pdo) {
        $this->pdo = $pdo;
    }

    function findById(int $id) {
        $query = "SELECT username, password, first_name, other_names, email FROM User WHERE user_id = :id";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (empty($row)) {
            return null;
        }

        $user = new User();
        $user->setId($id);
        $user->setUsername($row['username']);
        $user->setPasswordHash($row['password']);
        $user->setFirstName($row['first_name']);
        $user->setOtherNames($row['other_names']);
        $user->setEmail($row['email']);

        return $user;
    }

    function findByUsername(string $username) {
        $query = "SELECT user_id, password, first_name, other_names, email FROM User WHERE username = :username";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $row = $stmt->fetch(\PDO::FETCH_ASSOC);

        if (empty($row)) {
            return null;
        }

        $user = new User();
        $user->setId($row['user_id']);
        $user->setUsername($username);
        $user->setPasswordHash($row['password']);
        $user->setFirstName($row['first_name']);
        $user->setOtherNames($row['other_names']);
        $user->setEmail($row['email']);

        return $user;
    }

    function save(User $user) {
        $query = "INSERT INTO User(username, password, first_name, other_names, email) VALUES(:username, :password, :first_name, :other_names, :email)";

        $stmt = $this->pdo->prepare($query);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':first_name', $firstName);
        $stmt->bindParam(':other_names', $otherNames);
        $stmt->bindParam(':email', $email);

        $username = $user->getUsername();
        $password = $user->getPasswordHash();
        $firstName = $user->getFirstName();
        $otherNames = $user->getOtherNames();
        $email = $user->getEmail();

        $stmt->execute();

        $user->setId($this->pdo->lastInsertId());

        return $user;
    }
}
