<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Home extends BaseController
{
    protected $session;
    protected $UserModel;

    function __construct(){
        $this->session = session();
        $this->UserModel = new UserModel();
    }

    public function index()
    {

        if (empty($_SESSION['USER'])) {
            return redirect()->to('/login');
        }

        $data = [
            'title'=> 'Beranda',
            'profile' => $this->profile()
        ];

        return view('layout/head', $data)
                .view('layout/sidebar')
                .view('layout/nav')
                .view('index', $data)
                .view('layout/footer');
    }

    public function profile() {
        $temp = $this->UserModel->user()->getRowArray();
        return $temp['unit_prodi'];
        // var_dump($temp['unit_prodi']);die();
    }
}