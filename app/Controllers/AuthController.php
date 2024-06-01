<?php

namespace App\Controllers;
use App\Models\UserModel;
class AuthController extends BaseController
{
    public function view_login(): string
    {
        return view('auth/login_view');
    }

    public function view_register(){
        return view('auth/register_view');
    }

    public function proses_login()
    {
        $userModel = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $userModel->validate_user($username, $password);

        if ($user) {
            // Password is correct
            session()->set('user_id', $user['id']);
            return redirect()->to('/todolist');
        } else {
            // Invalid credentials
            return redirect()->back()->with('error', 'Invalid username or password');
        }
    }

    public function proses_logout(){
        session()->remove('user_id');

        return redirect()->to('/');
    }
}
