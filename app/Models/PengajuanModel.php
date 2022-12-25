<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanModel extends Model
{
    
    protected $table = 'pengajuan';
    protected $primaryKey = 'id_pengajuan';
    protected $allowedFields = ['id_barang', 'id_unit_prodi', 'id_satuan', 'jumlah', 'tanggal', 'status','id_tahun_akademik', 'jumlah_approve'];


    // admin

    public function pengajuanProses($limit = null, $offset = null){ // pengajuan status diproses
        return $this->table("pengajuan")
                ->select("barang.* , unit_prodi.*, pengajuan.id_pengajuan, pengajuan.id_barang, pengajuan.id_unit_prodi, pengajuan.jumlah, DATE_FORMAT(pengajuan.tanggal, '%d %M %Y') AS tanggal, pengajuan.status")
                ->join("barang", "barang.id_barang = pengajuan.id_barang", "left")
                ->join("unit_prodi", "unit_prodi.id_unit_prodi = pengajuan.id_unit_prodi", "left")
                ->where("pengajuan.status", "0")
                // ->orderBy("tanggal", "DESC")
                ->limit($limit, $offset)
                ->get();
    }

    public function jumlahPengajuanProses(){
        return $this->table("pengajuan")
                ->selectCount("id_pengajuan")
                ->where("status", "0")
                ->get();
    }

    public function FilterUnitProdi($akademik) {
        $sql = "
        SELECT 
                pengajuan.id_unit_prodi,
                unit_prodi.unit_prodi,
                pengajuan.id_tahun_akademik
        FROM pengajuan
        LEFT JOIN unit_prodi ON pengajuan.id_unit_prodi = unit_prodi.id_unit_prodi
        WHERE id_tahun_akademik = '$akademik'
        GROUP BY pengajuan.id_unit_prodi
        ";

        return $this->query($sql);
    }

    public function getPengajuan($akademik = null, $id_unit_prodi = null) {

        if ($akademik) {
            return $this->db->query("
            SELECT barang.* , unit_prodi.*, 
                    pengajuan.id_pengajuan,
                    pengajuan.id_barang,
                    pengajuan.id_unit_prodi,
                    pengajuan.jumlah,
                    DATE_FORMAT(pengajuan.tanggal, '%d %M %Y') AS tanggal,
                    pengajuan.status,
                    pengajuan.id_tahun_akademik
            FROM pengajuan
            LEFT JOIN barang ON pengajuan.id_barang = barang.id_barang
            LEFT JOIN unit_prodi ON pengajuan.id_unit_prodi = unit_prodi.id_unit_prodi
            WHERE id_tahun_akademik = '$akademik'
            ORDER BY id_pengajuan DESC
            ");
        } else {
            echo "tidak ada akadmik";
        }

    }

    public function perPengajuan($id){
        $sql = "
            SELECT barang.* , unit_prodi.*, 
            pengajuan.id_pengajuan, pengajuan.id_barang, pengajuan.id_unit_prodi, pengajuan.jumlah, pengajuan.jumlah_approve,DATE_FORMAT(pengajuan.tanggal, '%d %M %Y') AS tanggal, pengajuan.status  
            FROM pengajuan
            LEFT JOIN barang ON pengajuan.id_barang = barang.id_barang
            LEFT JOIN unit_prodi ON pengajuan.id_unit_prodi = unit_prodi.id_unit_prodi
            
            WHERE id_pengajuan=$id
            ORDER BY id_pengajuan DESC
        ";

        return $this->query($sql);
    }

    public function getBarang(){
        return $this->db->query("
            SELECT * 
            FROM barang
            LEFT JOIN satuan ON barang.id_satuan = satuan.id_satuan")->getResultArray();
    }

    public function getUnitProdi($id = null){
        if ($id == null) {
            return $this->db->query("SELECT * FROM unit_prodi");
        }

        return $this->db->query("SELECT * FROM unit_prodi WHERE id_unit_prodi='$id'");
    }

    public function stokPerPengajuan($id_pengajuan){
        $sql = "
        SELECT 
            barang.*
        FROM pengajuan
        INNER JOIN barang ON barang.id_barang = pengajuan.id_barang
        WHERE id_pengajuan = '$id_pengajuan'
        ";

        $stok = $this->query($sql)->getRowArray();
        $stok = $stok['stok'];

        return $stok;
    }

    public function query($sql){
        return $this->db->query($sql);
    }

    public function ubah($id, $input){
        return $this->update($id, $input);
    }
}