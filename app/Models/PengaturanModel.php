<?php

namespace App\Models;

use CodeIgniter\Model;

class PengaturanModel extends Model
{
    protected $table            = 'pengaturan';
    protected $primaryKey       = 'id_pengaturan';
    protected $allowedFields    = ['id_tahun_akademik'];
    
    public function getPengaturan() {
        $sql = "SELECT * FROM pengaturan";
        return $this->query($sql);
    }

    public function tambah($data) {
        return $this->save($data);
    }

    public function edit($id, $data) {
        return $this->update($id, $data);
    }
}