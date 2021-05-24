<?php
namespace sarassoroberto\usm\entity; //PSR-4 - autoloading
 // namespace app\usm\entity;
// namespace src\entity;

class User {

    private $userId;
    private $firstName;
    private $lastName;
    private $email;
    private $birthday;
    private $hobby;
    private $password;

    public function __construct($firstName,$lastName,$email,$birthday,$hobby,$password) {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->birthday = $birthday;
        $this->hobby = $hobby;
        $this->password = $password;
    }

    public function getUserId()
    {
        return $this->userId;
    }

    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }
    
    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getBirthday()
    {
        return $this->birthday;
    }
 
    public function setBirthday($birthday)
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getHobby()
    {
        return $this->hobby;
    }
 
    public function setHobby($hobby)
    {
        $this->hobby = $hobby;

        return $this;
    }
 
    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
}

 