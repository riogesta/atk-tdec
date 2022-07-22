<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanModel extends Model
{
    
    protected $table = 'pengajuan';
    protected $primaryKey = 'id_pengajuan';
    protected $allowedFields = ['id_barang', 'id_unit_prodi', 'id_satuan', 'jumlah'];

    public function getPengajuan($id = null) {

        if ($id == null) {
            return $this->db->query("
            SELECT barang.* , satuan.*, unit_prodi.*, pengajuan.*
            FROM pengajuan
            LEFT JOIN barang ON pengajuan.id_barang = barang.id_barang
            LEFT JOIN satuan ON pengajuan.id_satuan = satuan.id_satuan
            LEFT JOIN unit_prodi ON pengajuan.id_unit_prodi = unit_prodi.id_unit_prodi
            ORDER BY id_pengajuan DESC");
        }

        return $this->db->query("SELECT * FROM pengajuan WHERE id_unit_prodi='$id'");
    }

    public function getBarang(){
        return $this->db->query("SELECT * FROM barang");
    }

    public function getUnitProdi($id = null){
        if ($id == null) {
            return $this->db->query("SELECT * FROM unit_prodi");
        }

        return $this->db->query("SELECT * FROM unit_prodi WHERE id_unit_prodi='$id'");
    }

    public function getSatuan(){
        return $this->db->query("SELECT * FROM satuan");
    }

    public function add($input = null){
        return $this->save($input);
    }

    public function edit($id, $input){
        return $this->update($id, $input);
    }
}