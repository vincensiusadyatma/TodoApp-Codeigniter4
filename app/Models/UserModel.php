<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['username','email','password'];
    protected $primaryKey = 'id';

    public function tambah($data)
    {
        return $this->insert($data);
    }


    public function getUser($id){
        $user = $this->where('id', $id)->first();
        return $user;
    }

    public function validate_user($username, $password)
    {
        $user = $this->where('username', $username)->first();
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}