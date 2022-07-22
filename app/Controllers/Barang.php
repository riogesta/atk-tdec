<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BarangModel;
use App\Models\SatuanModel;

class Barang extends BaseController
{

    protected $model;
    protected $SatuanModel;

    function __construct(){
        $this->model = new BarangModel();
        $this->SatuanModel = new SatuanModel();
    }

    public function index()
    {      
        $count = $this->model->query("SELECT count('barang') FROM barang")->getRowArray();
        $count = $count["count('barang')"];

        $data = [
            'title' => 'Barang',
            'count' => $count,
            'satuan' => $this->model->getSatuan()->getResultArray(),
            'barang' => $this->model->getBarang()->getResultArray()
        ];

        return view('layout/head.php', $data)
                .view('layout/navbar.php')
                .view('barang/barang', $data)
                .view('layout/footer.php');
    }

    public function tambah() {
        
        $input = [
            'barang' => $this->request->getPost('barang'),
            'id_satuan'=> $this->request->getPost('satuan')
        ];

        $this->model->add($input);
        session()->setFlashdata('msg', $this->flash());
        return redirect()->to('/barang');    

    }

    public function tambahSatuan() {
        $input = [
            'satuan' => $this->request->getPost('satuan')
        ];

        $this->SatuanModel->add($input);
        session()->setFlashdata('msg', $this->flash('success', 'Tersimpan', 'Satuan Tersimpan'));
        return redirect()->to('/barang');    
    }

    // default success flashdata can customize
    protected function flash($color = 'success', $title = 'Tersimpan', $msg = 'Data Tersimpan') {
    
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