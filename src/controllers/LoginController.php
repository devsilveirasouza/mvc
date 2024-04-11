<?php
namespace src\controllers;

use \core\Controller;
use \src\handlers\LoginHandler;

class LoginController extends Controller {

    public function signin() {
        $this->render('login');
    }

    public function signinAction() {
        $email      = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password   = filter_input(INPUT_POST, 'password');

        if ($email && $password) {

            $token = LoginHandler::verifyLogin($email, $password);
            if($token) {
                $_SESSION['token'] = $token;
            } else {
                $_SESSION['flash'] = 'E-mail e/ou senha não conferem.';
                
            }

        } else {
            $_SESSION['flash'] = 'Digite os campos de email e/ou senha.';
            $this->redirect('login');
        }

    }

    public function signup() {
        echo 'Cadastro.';
    }

}

// MODULO 12 - AULA 09
// TO BE CONTINUED...