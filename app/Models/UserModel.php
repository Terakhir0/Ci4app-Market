<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model {
    protected $table = 'user';
    protected $allowedFields = ['gambar', 'nama', 'username', 'password', 'email', 'hp', 'alamat', 'uang'];

    public function getUser($id = false)
    
    {
        if($id == false){
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function log_in($username, $password)
    {

        $user = $this->where(['username' => $username])->first();
        $pass = $user->get('password');
        if(password_verify($password,$pass)){
            $this->get()->getRowArray();
        }
      
    }

    public function daftar($data)
    {
        $this->insert($data);
    }
    
}