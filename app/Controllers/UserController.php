<?php

namespace App\Controllers;

use App\Models\UserModel;

class UserController extends BaseController
{
    public function index(): string
    {
        return view('auth/register_view');
    }

    public function tambah()
    {
        helper('form');

        $model = new UserModel();

        $username = $this->request->getPost('username');
        $email = $this->request->getPost('email');
        $password = strval($this->request->getPost('password'));
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

        $data = [
            'username' => $username,
            'email' => $email,
            'password' => $hashed_password
        ];

        if ($model->tambah($data)) {
            return redirect()->to('/todolist');
        } else {
           
        }
    }
}
