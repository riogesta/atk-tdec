<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AkademikModel;
use App\Models\PengaturanModel;

class Akademik extends BaseController
{
    function __construct(){
        $this->model = new AkademikModel();
        $this->PengaturanModel = new PengaturanModel();
        $this->session = session();
    }

    public function index()
    {
        if($this->request->getMethod() == 'post'){
            return $this->tambah();
        }

        $data = [
            'title' => 'Kelola Tahun Akademik',
            'tahun_akademik' => $this->model->getTahunAkademik(),
            'pengaturan' => $this->getTahunAkademikAktif()
        ];

        return view('layout/head', $data)
                .view('layout/sidebar')
                .view('layout/nav')
                .view('akademik', $data)
                .view('layout/footer');
    }

    // ambil tahun akademik aktif
    public function getTahunAkademikAktif() {
        return $this->PengaturanModel->getPengaturan()->getRowArray();
    }
    // ganti tahun akademik
    public function gantiTahunAkademikAktif() {
        $id = $this->request->getPost('id-tahun-akademik-aktif');
        $input['id_tahun_akademik'] = $this->request->getPost('tahun-akademik-aktif');

        // var_dump($id,$input);die();
        $this->PengaturanModel->edit($id, $input);
        return redirect()->to('/tahun-akademik');
    }

    // tambah tahun akademik
    public function tambah(){
        $input['tahun_akademik'] = $this->request->getPost('tahun-akademik');

        $this->model->simpan($input);

        return redirect()->to('/tahun-akademik');
    }

    // edit tahun akademik
    public function edit() {
        $id = $this->request->getPost('id-tahun-akademik');
        $input['tahun_akademik'] = $this->request->getPost('tahun-akademik');

        $this->model->edit($id, $input);

        return redirect()->to('/tahun-akademik');
    }

    // hapus tahun akademik
    public function hapus() {
        $id = $this->request->getPost('id');

        $this->model->hapus($id);
    }
}