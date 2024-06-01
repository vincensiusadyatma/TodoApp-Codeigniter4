<?php

namespace App\Controllers;

use App\Models\TodoModel;
use App\Models\UserModel;
class TodoController extends BaseController
{
    public function index(): string
    {
        helper('session');
        $id_user = session()->get('user_id');
    
        
        $user = new UserModel();
        $todo_model = new TodoModel();

        $user_data = $user->getUser($id_user);
        $todo_data = $todo_model->getTodo($id_user);

        return view('todo_view', ['user_data' => $user_data,'todo_data'=>$todo_data]);
    }


    public function simpanKegiatan(){
        helper('session');
        $id_user = session()->get('user_id');
        
        $model = new TodoModel();
        $nama_kegiatan = $this->request->getGet('nama_kegiatan');

        if ($model->tambah($nama_kegiatan,$id_user)) {
            session()->set('success', 'Berhasil menambah kegiatan.');
            return redirect()->to('/todolist');
        } else {
            session()->setFlashdata('error', 'Gagal menambahkan kegiatan.');
            return redirect()->to('/todolist');
        }
    }

    public function selesaiKegiatan(){
        $uri = $this->request->getUri();
        $id_user = $uri->getSegment(3); //mengambil array path ke 3

        $model = new TodoModel();
        if ($model->ubah('status','selesai',$id_user)) {
            session()->set('success', 'Berhasil menyelesaikan kegiatan.');
            return redirect()->to('/todolist');
        } else {
           
            session()->set('error', 'Gagal menyelesaikan kegiatan.');
            return redirect()->to('/todolist');
        }
    }

    public function hapusKegiatan(){
        $uri = $this->request->getUri();
        $id_user = $uri->getSegment(3); //mengambil array path ke 3

        $model = new TodoModel();
        
      

        if ($model->hapus($id_user)) {
            session()->set('success', 'Berhasil menghapus kegiatan.');
            return redirect()->to('/todolist');
        } else {
            session()->setFlashdata('error', 'Gagal menghapus kegiatan.');
            return redirect()->to('/todolist');
        }


    }
}
