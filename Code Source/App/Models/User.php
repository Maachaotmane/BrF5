<?php

class User
{
    private $bd;

    public function __construct()
    {
        $this->bd = new Database();
    }

    public function register($nom, $email, $password)
    {
        $this->bd->query("INSERT INTO users(nom, email,password) VALUES ('$nom', '$email', '$password')");
        $this->bd->execute();
    }

    public function verifyEmailExist($email)
    {
        $this->bd->query("SELECT * FROM users where email = '$email'");

        return $this->bd->getResults();
    }

    public function login($email, $password)
    {
        $this->bd->query("SELECT * FROM users WHERE email = '$email'");

        $row = $this->bd->single();

        $hashed_password = $row->password;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }
}
