<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
    protected $model;
    protected $session;
    
    function __construct(){
        $this->model = new UserModel();
        $this->session = session();
    }

    public function index()
    {        
        if (empty($_SESSION['USER'])) {
            return redirect()->route('login');
        }

        if ($this->request->getMethod() == 'post') {
            return $this->tambah();
        }
        
        $data = [
            'title' => "Akun",
            'user' => $this->model->user()->getResultArray(),
            'unit_prodi' => $this->model->unitProdi()->getResultArray(),
            'profile' => $this->profile(),
        ];
        

        return view('layout/head', $data)
                .view('layout/sidebar')
                .view('layout/nav')
                .view('akun/akun', $data)
                .view('layout/footer');
    }

    public function tambah() {
        
        $encrypter = \Config\Services::encrypter();
        
        $chipertext = base64_encode($encrypter->encrypt($this->request->getPost('password')));

        $input = [
            'username' => $this->request->getPost('username'),
            'password' => $chipertext,
            'id_unit_prodi' => $this->request->getPost('unit-prodi')
        ];
        
        // var_dump($input);die();
        $this->model->insert($input);
        return redirect()->to('/akun');
    }

    public function edit($arg = ''){

        $encrypter = \Config\Services::encrypter();
        $user = $this->model->user($arg)->getRowArray();

        if($this->request->getMethod() == 'post') {
            $input = [
                'username' => $this->request->getPost('username'),
                'password' => base64_encode($encrypter->encrypt($this->request->getPost('password'))),
                'id_unit_prodi' => $this->request->getPost('unit-prodi'),
                'role' => $this->request->getPost('role')
            ];

            // var_dump($input);die();

            $user = $this->request->getPost('username-old');
            $user = $this->model->query("SELECT * FROM users WHERE username = '$user'")->getRowArray();

            $this->model->update($user, $input);
            // session()->setFlashdata('msg', $this->flash('success', 'Berubah', 'User Berhasil Terubah!'));
            return redirect()->to('/akun');
        }

        $pw_plaintext = $this->model->user($arg)->getRowArray();
        $pw_plaintext = $encrypter->decrypt(base64_decode($pw_plaintext['password']));

        $data = [
            'title' => 'Edit Data',
            'user' => $user,
            'pw' => $pw_plaintext,
            'unit_prodi' =>$this->model->unitProdi()->getResultArray(),
            'profile' => $this->profile()
        ];
        // var_dump();die();

        return view('layout/head', $data)
                .view('layout/sidebar')
                .view('layout/nav')
                .view('akun/edit_akun', $data)
                .view('layout/footer');
    }

    public function hapus() {
        $id = $this->request->getPost("id_user");
        $this->model->delete($id);

        session()->setFlashdata('msg', $this->flash('success', 'Terhapus', 'User Berhasil terhapus!'));
        return redirect()->to('/akun');
    }

    public function profile() {
        $temp = $this->model->user()->getRowArray();
        return $temp['unit_prodi'];
        // var_dump($temp['unit_prodi']);die();
    }

    protected function flash($color = 'success', $title = 'Terkirim', $msg = 'Ajuan Terkirim') {
    
        $icon = 'check';
        if ($color != 'success') {
            $icon = 'x icon';
        }

        $message = "
        <div class='ui icon $color message' id='message'>
            <i class='$icon icon'></i>
            <div class='content'>
                <div class='header'>
                    $title
                </div>
            <p>$msg</p>
            </div>
        </div>
        ";

        return $message;
    }
}