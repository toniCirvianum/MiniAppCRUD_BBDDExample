<?php

namespace App\Controllers;

use App\Core\Controller;

class LoginController extends Controller
{
    public function index()
    {
        $this->render('login/index', ['title' => 'Login']);
    }
    public function authenticate()
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';
        $message = ($username === 'admin' && $password === '1234') ? 'Login correcte' : 'Credencials incorrectes';
        $this->render('login/result', ['title' => 'Resultat del login', 'message' => $message]);
    }
}
