<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajuanModel extends Model
{
    
    protected $table = 'ajuan';
    protected $allowedFields = ['id_barang', 'id_unit_prodi', 'id_satuan', 'jumlah'];

    public function getPengajuan() {
        return $this->db->query("
        SELECT barang.* , satuan.*, unit_prodi.*, ajuan.jumlah
        FROM ajuan
        LEFT JOIN barang ON ajuan.id_barang = barang.id_barang
        LEFT JOIN satuan ON ajuan.id_satuan = satuan.id_satuan
        LEFT JOIN unit_prodi ON ajuan.id_unit_prodi = unit_prodi.id_unit_prodi
        ");
    }

    public function getBarang(){
        return $this->db->query("SELECT * FROM barang");
    }

    public function getUnitProdi(){
        return $this->db->query("SELECT * FROM unit_prodi");
    }

    public function getSatuan(){
        return $this->db->query("SELECT * FROM satuan");
    }

    public function add($input = null){
        return $this->save($input);
    }
}