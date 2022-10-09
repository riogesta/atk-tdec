<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanModel extends Model
{
    
    protected $table = 'pengajuan';
    protected $primaryKey = 'id_pengajuan';
    protected $allowedFields = ['id_barang', 'id_unit_prodi', 'id_satuan', 'jumlah', 'tanggal', 'status','id_tahun_akademik', 'jumlah_approve'];

    public function getPengajuan($id = null) {

        if ($id == null) {
            return $this->db->query("
                SELECT barang.* , unit_prodi.*, 
                pengajuan.id_pengajuan, pengajuan.id_barang, pengajuan.id_unit_prodi, pengajuan.jumlah, DATE_FORMAT(pengajuan.tanggal, '%d %M %Y') AS tanggal, pengajuan.status  
                FROM pengajuan
                LEFT JOIN barang ON pengajuan.id_barang = barang.id_barang
                LEFT JOIN unit_prodi ON pengajuan.id_unit_prodi = unit_prodi.id_unit_prodi
                ORDER BY id_pengajuan DESC
            ");
        } else {
            return $this->perPengajuan($id);
        }

        return $this->db->query("SELECT * FROM pengajuan WHERE id_unit_prodi='$id'");

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
            LEFT JOIN satuan ON barang.id_satuan = satuan.id_satuan");
    }

    public function getUnitProdi($id = null){
        if ($id == null) {
            return $this->db->query("SELECT * FROM unit_prodi");
        }

        return $this->db->query("SELECT * FROM unit_prodi WHERE id_unit_prodi='$id'");
    }

    public function query($sql){
        return $this->db->query($sql);
    }

    public function ubah($id, $input){
        return $this->update($id, $input);
    }
}