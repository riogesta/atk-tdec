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

        if ($_SESSION['ROLE'] == '0') {
            return redirect()->route('pengajuan');
        }

        $data = [
            'title'=> 'Beranda',
        ];

        return view('layout/head', $data)
                .view('layout/sidebar')
                .view('layout/nav')
                .view('index', $data)
                .view('layout/footer');
    }

}