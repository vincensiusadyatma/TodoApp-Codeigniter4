<?php

namespace App\Models;

use CodeIgniter\Model;

class TodoModel extends Model
{
    protected $table = 'todolist';
    protected $allowedFields = ['user_id','kegiatan','status'];
    protected $primaryKey = 'idkegiatan';

    public function tambah($nama_kegiatan,$user_id)
    {
        $data = [
            'user_id' => $user_id,
            'kegiatan' => $nama_kegiatan,
            'status' => "aktif"
        ];
        
        return $this->insert($data);
    }

    public function hapus($id){
        
        return $this->delete($id);

    }

    public function ubah($key,$value,$id){
        $data = [
            $key => $value
        ];

        return $this->update($id,$data);
        
    }


    public function getTodo($user_id){
       $data = [
            'daftar_kegiatan' => $this->where('status','aktif')->where('user_id', $user_id)->findAll()
       ];

       return $data;
    }

   
}