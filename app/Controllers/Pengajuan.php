<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\I18n\Time;
use App\Models\PengajuanModel;
use App\Models\PengaturanModel;
use App\Models\UserModel;

class Pengajuan extends BaseController
{

    protected $model;
    protected $UserModel;
    protected $session;

    function __construct(){
        $this->model = new PengajuanModel;
        $this->UserModel = new UserModel;
        $this->PengaturanModel = new PengaturanModel();
        $this->session = session();
    }

    public function tanggalSekarang() {
        $tanggal = Time::now('Asia/Jakarta', 'en_US');
        return $tanggal; //tahun-bulan-tanggal
    }

    //tampilan untuk merubah status
    public function ubahStatus($id)
    {
        
        if($this->request->getMethod() == 'post')
        {
            $input = [
                'status' => $this->request->getPost('status')
            ]; 
        }

        $pengajuan = $this->model->getPengajuan($id)->getRowArray();
        
        
        $data = [
            'title' => 'Status '.$pengajuan['barang'].'',
            'pengajuan' => $pengajuan
        ];

        // var_dump($pengajuan);die();
        
        return view('layout/head', $data)
                .view('layout/sidebar')
                .view('layout/nav')
                .view('pengajuan/ubah_status', $data)
                .view('layout/footer');
    }

    public function index()
    {
        if (empty($_SESSION['USER'])) {
            return redirect()->route('login');
        }

        if ($this->request->getMethod() == 'post') {
            $this->tambah();
        }

        if ($_SESSION['ROLE'] == '0') {    
            // jika role  nya adalah user
            $id_unit_prodi = $_SESSION['ID-UNIT-PRODI'];
            
            // menampilkan pengajuan yang sedang dalam status ('proses' dan 'proses diapprove')
            $sql_dalam_proses = "
            SELECT barang.* , unit_prodi.*, 
            pengajuan.id_pengajuan, pengajuan.id_barang, pengajuan.id_unit_prodi, pengajuan.jumlah, DATE_FORMAT(pengajuan.tanggal, '%d %M %Y') AS tanggal, pengajuan.status  
            FROM pengajuan
            LEFT JOIN barang ON pengajuan.id_barang = barang.id_barang
            LEFT JOIN unit_prodi ON pengajuan.id_unit_prodi = unit_prodi.id_unit_prodi
            WHERE `pengajuan`.`id_unit_prodi` = $id_unit_prodi AND `pengajuan`.`status` != '3' AND `pengajuan`.`status` != '2' ORDER BY tanggal DESC";

            // menampilkan pengajuan yang sedang dalam status ('dikirim')
            $sql_dikirim = "
            SELECT pengajuan.id_pengajuan, `barang`.`id_barang`, barang.barang, pengajuan.id_unit_prodi, pengajuan.jumlah, DATE_FORMAT(pengajuan.tanggal, '%d %M %Y') AS tanggal, pengajuan.status  
            FROM pengajuan
            LEFT JOIN barang ON pengajuan.id_barang = barang.id_barang
            LEFT JOIN unit_prodi ON pengajuan.id_unit_prodi = unit_prodi.id_unit_prodi
            WHERE `pengajuan`.`id_unit_prodi` = '$id_unit_prodi' AND `pengajuan`.`status` = '2' ORDER BY tanggal DESC";

            $sql_daftar_pengajuan = "
            SELECT pengajuan.id_pengajuan, pengajuan.id_barang, barang.barang, barang.id_satuan , pengajuan.id_unit_prodi, pengajuan.jumlah, DATE_FORMAT(pengajuan.tanggal, '%d %M %Y') AS tanggal, pengajuan.status  
            FROM pengajuan
            LEFT JOIN barang ON pengajuan.id_barang = barang.id_barang
            LEFT JOIN unit_prodi ON pengajuan.id_unit_prodi = unit_prodi.id_unit_prodi
            WHERE  `pengajuan`.`id_unit_prodi` = '$id_unit_prodi' AND `pengajuan`.`status` = '3'
            ORDER BY id_pengajuan ";

            $data = [
                'title' => 'Pengajuan',
                'barang' => $this->model->getBarang()->getResultArray(),
                'pengajuan_user' => $this->model->query($sql_daftar_pengajuan)->getResultArray(),
                'status_belum_selesai' => $this->model->query($sql_dalam_proses)->getResultArray(),
                'status_dikirim' => $this->model->query($sql_dikirim)->getResultArray()
            ];

            return view('layout/head', $data)
                .view('layout/topbar')
                .view('pengajuan/pengajuan_user', $data)
                .view('layout/footer');
        
        } else {
            // jika role adalah admin
            $data = [
                'title' => 'Pengajuan',
                'barang' => $this->model->getBarang()->getResultArray(),
                'pengajuan' => $this->model->getPengajuan()->getResultArray(),
            ];

            return view('layout/head', $data)
                .view('layout/sidebar')
                .view('layout/nav')
                .view('pengajuan/pengajuan', $data)
                .view('layout/footer');
        }
    }

    public function tambah(){

        $tahun_akademik = $this->PengaturanModel->getPengaturan()->getRowArray();

        $input = [
            'id_barang' => $this->request->getPost('barang'),
            'id_unit_prodi' => $_SESSION['ID-UNIT-PRODI'],
            // 'id_satuan' => $this->request->getPost('satuan'),
            'jumlah' => $this->request->getPost('jumlah'),
            'tanggal' => $this->tanggalSekarang(),
            'id_tahun_akademik' => $tahun_akademik['id_tahun_akademik']
        ];
        
        if ($this->model->save($input)) {
            return redirect()->to('/pengajuan');           
        } else {
            return redirect()->to('/'); 
        };         
    }

    public function riwayatPengajuan(){
        $id_unit_prodi = $_SESSION['ID-UNIT-PRODI'];
        $sql = "
        SELECT pengajuan.id_pengajuan, pengajuan.id_barang, barang.barang, barang.id_satuan , pengajuan.id_unit_prodi, pengajuan.jumlah, DATE_FORMAT(pengajuan.tanggal, '%d %M %Y') AS tanggal, pengajuan.status  
        FROM pengajuan
        LEFT JOIN barang ON pengajuan.id_barang = barang.id_barang
        LEFT JOIN unit_prodi ON pengajuan.id_unit_prodi = unit_prodi.id_unit_prodi
        WHERE  `pengajuan`.`id_unit_prodi` = '$id_unit_prodi' AND `pengajuan`.`status` = '3'
        ORDER BY id_pengajuan DESC
        ";

        $data = $this->model->query($sql)->getResultObject();
        return json_encode($data);
    }

    public function tampilStatusDalamProses(){
        $id_unit_prodi = $_SESSION['ID-UNIT-PRODI'];
        $sql = "
            SELECT barang.* , unit_prodi.*, 
            pengajuan.id_pengajuan, pengajuan.id_barang, pengajuan.id_unit_prodi, pengajuan.jumlah, DATE_FORMAT(pengajuan.tanggal, '%d %M %Y') AS tanggal, pengajuan.status  
            FROM pengajuan
            LEFT JOIN barang ON pengajuan.id_barang = barang.id_barang
            LEFT JOIN unit_prodi ON pengajuan.id_unit_prodi = unit_prodi.id_unit_prodi
            WHERE `pengajuan`.`id_unit_prodi` = $id_unit_prodi AND `pengajuan`.`status` != '3' AND `pengajuan`.`status` != '2' ORDER BY tanggal DESC";

        $data = $this->model->query($sql)->getResultArray();
        return json_encode($data);
    }

    public function statusDikirim(){
        $id_unit_prodi = $_SESSION['ID-UNIT-PRODI'];
        $sql_dikirim = "
        SELECT pengajuan.id_pengajuan, `barang`.`id_barang`, barang.barang, pengajuan.id_unit_prodi, pengajuan.jumlah, DATE_FORMAT(pengajuan.tanggal, '%d %M %Y') AS tanggal, pengajuan.status  
        FROM pengajuan
        LEFT JOIN barang ON pengajuan.id_barang = barang.id_barang
        LEFT JOIN unit_prodi ON pengajuan.id_unit_prodi = unit_prodi.id_unit_prodi
        WHERE `pengajuan`.`id_unit_prodi` = $id_unit_prodi AND `pengajuan`.`status` = '2' ORDER BY tanggal DESC";

        $data = $this->model->query($sql_dikirim)->getResultArray();
        return json_encode($data);
    }

    public function approve() {
        $id = $this->request->getPost('id');
        $data['status'] = '3';

        $this->model->update($id, $data);
        session()->setFlashdata('msg', 'Berhasil Diterima');
    }

    public function editStatus() {
        
        $id = $this->request->getPost('id');
        $input['status'] = $this->request->getPost('status');
        $input['jumlah_approve'] = $this->request->getPost('jumlah-approve');

        // var_dump($id, $input);die();
        $this->model->ubah($id, $input);
        return redirect()->route('pengajuan');
    }

}