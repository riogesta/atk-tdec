<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\PengajuanModel;

class Pengajuan extends BaseController
{

    protected $model;

    function __construct(){
        $this->model = new PengajuanModel;
    }

    public function index()
    {
        //session_start();
        // check if session is not empty
        //if (empty($_SESSION['level'])) {
        //    return redirect()->to('/');
        //}

        $data = [
            'title' => 'Beranda',
            'ajuan' => $this->model->getPengajuan()->getResultArray()
        ];

        // var_dump($data['barang']);die();

        return view('layout/head.php', $data)
                .view('layout/navbar.php')
                .view('index.php', $data)
                .view('layout/footer.php');
    }

    public function tambah(){

        if ($this->request->getMethod() == 'post') {

            $input = [
                'id_barang' => $this->request->getPost('barang'),
                'id_unit_prodi' => $this->request->getPost('unit-prodi'),
                'id_satuan' => $this->request->getPost('satuan'),
                'jumlah' => $this->request->getPost('jumlah')
            ];

            $id = $this->model->getPengajuan($input['id_unit_prodi'])->getRowArray();

            if ($id) {
                
                // to get id pengajuan
                $this->model->edit($id['id_pengajuan'], $input);
                session()->setFlashdata('msg', $this->flash());
                return redirect()->to('/');           
            }
            
            
            if ($this->model->add($input)) {
                session()->setFlashdata('msg', $this->flash());
                return redirect()->to('/');           
            } else {
                session()->setFlashdata('msg', $this->flash('red', 'Tidak Terkirim', 'Ajuan tidak terkirim'));
                return redirect()->to('/'); 
            };         

        } else {
            $data = [
                'title' => 'pengajuan barang',
                'barang' => $this->model->getBarang()->getResultArray(),
                'unit' => $this->model->getUnitProdi()->getResultArray(),
                'satuan' => $this->model->getSatuan()->getResultArray()
            ];
    
            return view('layout/head.php', $data)
                    .view('layout/navbar.php')
                    .view('pengajuan/tambah_pengajuan', $data)
                    .view('layout/footer.php');
        }
    }


    // default success flashdata can customize
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