<?php

namespace App;

class User
{
    private $id;
    private $username;
    private $passwordHash;
    private $firstName;
    private $otherNames;
    private $email;
    
    public function setId(string $id) {
        $this->id = $id;
    }

    public function getId() {
        return $this->id;
    }

    public function setUsername(string $username) {
        $this->username = $username;
    }

    public function getUsername() {
        return $this->username;
    }

    public function setPasswordHash(string $passwordHash) {
        $this->passwordHash = $passwordHash;
    }

    public function getPasswordHash() {
        return $this->passwordHash;
    }

    public function setFirstName(string $firstName) {
        $this->firstName = $firstName;
    }

    public function getFirstName() {
        return $this->firstName;
    }

    public function setOtherNames(string $otherNames) {
        $this->otherNames = $otherNames;
    }

    public function getOtherNames() {
        return $this->otherNames;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }

    public function getEmail() {
        return $this->email;
    }
}
