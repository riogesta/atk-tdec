<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengajuanModel;

class Pengajuan extends BaseController
{
    public function index()
    {
        //session_start();
        // check if session is not empty
        //if (empty($_SESSION['level'])) {
        //    return redirect()->to('/');
        //}

        $model = new PengajuanModel();

        $data = [
            'title' => 'Barang',
            'ajuan' => $model->getPengajuan()->getResultArray()
        ];

        // var_dump($data['barang']);die();

        return view('layout/head.php', $data)
                .view('layout/navbar.php')
                .view('index.php', $data)
                .view('layout/footer.php');
    }

    public function tambah(){

        $model = new PengajuanModel();

        if ($this->request->getMethod() == 'post') {
            $input = [
                'id_barang' => $this->request->getPost('barang'),
                'id_unit_prodi' => $this->request->getPost('unit-prodi'),
                'id_satuan' => $this->request->getPost('satuan'),
                'jumlah' => $this->request->getPost('jumlah')
            ];

            if ($model->add($input)) {
                session()->setFlashdata('msg', $this->flash());
                return redirect()->to('/');           
            } else {
                session()->setFlashdata('msg', $this->flash('red', 'Tidak Terkirim', 'Ajuan tidak terkirim'));
                return redirect()->to('/'); 
            };



        } else {
            $data = [
                'title' => 'pengajuan barang',
                'barang' => $model->getBarang()->getResultArray(),
                'unit' => $model->getUnitProdi()->getResultArray(),
                'satuan' => $model->getSatuan()->getResultArray()
            ];
    
            return view('layout/head.php', $data)
                    .view('layout/navbar.php')
                    .view('pengajuan/tambah_pengajuan', $data)
                    .view('layout/footer.php');
        }
    }


    // default success flashdata can customize
    private function flash($color = 'success', $title = 'Terkirim', $msg = 'Ajuan Terkirim') {
        

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