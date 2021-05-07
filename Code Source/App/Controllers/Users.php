<?php

class Users extends Controller
{
    public function __construct()
    {
        $this->register = $this->model('User');
    }

    public function register()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'nom' => $_POST['nom'],
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'passwordRepeat' => $_POST['passwordRepeat'],
                'address' => $_POST['address'],
                'city' => $_POST['city'],
                'nom_error' => '',
                'email_error' => '',
                'password_error' => '',
                'passwordRepeat_error' => '',
                'address_error' => '',
                'city_error' => '',
            ];
            if ($data['nom'] == null) {
                $data['nom_error'] = 'le champs nom est vide';
            }
            if ($data['email'] == null) {
                $data['email_error'] = 'le champs email est vide';
            } else {
                if (!empty($this->register->verifyEmailExist($data['email']))) {
                    $data['email_error'] = 'email exist';
                }
            }
            if ($data['address'] == null) {
                $data['address_error'] = 'le champs address est vide';
            }
            if ($data['city'] == null) {
                $data['city_error'] = 'le champs city est vide';
            }
            if (empty($data['password'])) {
                $data['password_error'] = 'Please enter a password';
            } elseif (strlen($data['password']) < 8) {
                $data['password_error'] = 'Password must be at least 8';
            }
            //repeat password validation
            if (empty($data['passwordRepeat'])) {
                $data['passwordRepeat_error'] = 'Please repeat a password';
            } elseif ($data['password'] !== $data['passwordRepeat']) {
                $data['passwordRepeat_error'] = "Password doesn't much";
            }
            if (
                empty($data['nom_error']) && empty($data['email_error'])
                && empty($data['address_error']) && empty($data['city_error'])
                && empty($data['password_error']) && empty($data['passwordRepeat_error'])
            ) {
                $password = password_hash($data['password'], PASSWORD_DEFAULT);
                $this->register->register($_POST['nom'], $_POST['email'], $password);
                $this->view('Pages/login', [
                    'success' => 'This is a success alert—check it out!',
                ]);
            } else {
                $this->view('Pages/register', [
                    'data' => $data,
                ]);
            }
        } else {
            die('nothing');
        }
    }

    public function login()
    {
        if (isset($_POST['submit'])) {
            $data = [
                'email' => $_POST['email'],
                'password' => $_POST['password'],
                'email_error' => '',
                'password_error' => '',
            ];

            if ($data['email'] == null) {
                $data['email_error'] = 'le champs email est vide';
            } else {
                if (empty($this->register->verifyEmailExist($data['email']))) {
                    $data['email_error'] = 'email does not exist';
                }
            }
            if (empty($data['password'])) {
                $data['password_error'] = 'Please enter a password';
            } elseif (strlen($data['password']) < 8) {
                $data['password_error'] = 'Password must be at least 8';
            }

            if (empty($data['email_error']) && empty($data['password_error'])) {
                $results = $this->register->login($_POST['email'], $_POST['password']);
                if ($results) {
                    $this->createUserSession($results);
                } else {
                    $data['password_error'] = 'Password incorrect';
                    $this->view('Pages/login', [
                        'data' => $data,
                    ]);
                }
            } else {
                $this->view('Pages/login', [
                    'data' => $data,
                ]);
            }
        } else {
            die('nothing');
        }
    }

    public function createUserSession($user)
    {
        session_start();
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_nom'] = $user->nom;
        $_SESSION['user_type'] = $user->type;
        if ($user->type == 'client') {
            header('location:'.URLROOT.'pages/reserve');
        } elseif ($user->type == 'admin') {
            header('location:'.URLROOT.'tarifs/tarif');
        } else {
            header('location:'.URLROOT);
        }
    }

    public function logout()
    {
        session_start();
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_nom']);
        unset($_SESSION['user_type']);
        session_destroy();
        header('location:'.URLROOT);
    }
}
