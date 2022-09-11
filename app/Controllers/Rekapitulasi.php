<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UnitProdiModel;
use App\Models\BarangModel;
use App\Models\RekapitulasiModel;
use Dompdf\Dompdf;
use CodeIgniter\I18n\Time;

class Rekapitulasi extends BaseController
{
    protected $session;
    protected $model; 
    protected $UnitProdiModel;
    protected $BarangModel;

    function __construct() {
        $this->session = session();
        $this->model = new RekapitulasiModel();
        $this->UnitProdiModel = new UnitProdiModel();
        $this->BarangModel = new BarangModel();
    }

    public function index()
    {
        $data = [
            'title' => 'rekapitulasi',
            'total' => $this->totalBarangPengajuan()->getResultArray(),
            'rekap' => $this->rekapitulasiData()->getResultArray()
        ];

        return view('layout/head', $data)
                .view('layout/sidebar')
                .view('layout/nav')
                .view('rekapitulasi/rekapitulasi', $data)
                .view('layout/footer');
    }

    public function rekapitulasiData(){
        $sql = "
        SELECT
            barang.barang,
            satuan.satuan,
            unit_prodi.unit_prodi,
            pengajuan.status,
            sum(pengajuan.jumlah) jumlah
            

        FROM pengajuan
        LEFT JOIN barang ON barang.id_barang = pengajuan.id_barang
        LEFT JOIN satuan ON satuan.id_satuan = barang.id_satuan
        LEFT JOIN unit_prodi ON unit_prodi.id_unit_prodi = pengajuan.id_unit_prodi

        WHERE status = '0'
        GROUP BY barang.barang, unit_prodi.unit_prodi
        ";

        return $this->model->query($sql);
    }

    public function totalBarangPengajuan() {
        $sql = "
        SELECT
            barang.barang,
            satuan.satuan,
            unit_prodi.unit_prodi,
            pengajuan.status,
            sum(pengajuan.jumlah) total

        FROM pengajuan
        LEFT JOIN barang ON barang.id_barang = pengajuan.id_barang
        LEFT JOIN satuan ON satuan.id_satuan = barang.id_satuan
        LEFT JOIN unit_prodi ON unit_prodi.id_unit_prodi = pengajuan.id_unit_prodi

        WHERE status = '0'
        GROUP BY barang.barang
        ";
        return $this->model->query($sql);
    }

    public function dataTesting() {
        $sql = "
        SELECT
            barang.barang,
            satuan.satuan,
            unit_prodi.unit_prodi,
            pengajuan.status,
            sum(pengajuan.jumlah) total
        
        FROM pengajuan
        LEFT JOIN barang ON barang.id_barang = pengajuan.id_barang
        LEFT JOIN satuan ON satuan.id_satuan = barang.id_satuan
        LEFT JOIN unit_prodi ON unit_prodi.id_unit_prodi = pengajuan.id_unit_prodi
        
        WHERE status = '0'
        GROUP BY barang.barang
        ";

        $data = $this->model->query($sql)->getResultArray();

        $unit_prodi = [];
        $barang = [];
        $satuan = [];
        $jumlah = [];

        foreach($data as $val) {

                array_push($unit_prodi, $val['unit_prodi']);
                array_push($barang, $val['barang']);
                array_push($satuan, $val['satuan']);
                array_push($jumlah, $val['total']);
        }

        $unit_prodi = array_unique($unit_prodi);

        var_dump($unit_prodi);

        $data = [
            'barang' => $barang,
            'unit_prodi' => $unit_prodi,
            'satuan' => $satuan,
            'jumlah' => $jumlah,
        ];

        return view('rekapitulasi/dataTest', $data);

    }

    public function generateExcel () {
        $data = [
            'rekap' => $this->rekapitulasiData()->getResultArray()
        ];

        return view('rekapitulasi/inExcel.php', $data);
    }

    public function generatePdf() {

        $date = new Time('now', 'Asia/Jakarta', 'en_US');
        $date = $date->toLocalizedString('dd - MMMM - yyyy');

        // var_dump($date);die();

        $filename = $date.' - rekapitulasi';
        $data = [
            'rekap' => $this->rekapitulasiData()->getResultArray(),
            'date' => $date
        ];

        // return view('rekapitulasi/inPdf', $data);

        // /*

        $dompdf = new Dompdf();
        $dompdf->loadHtml(view('rekapitulasi/inPdf', $data));
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream($filename);

        // */
    }
}