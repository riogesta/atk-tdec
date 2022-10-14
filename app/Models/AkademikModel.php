<?php

namespace App\Models;

use CodeIgniter\Model;

class AkademikModel extends Model
{
    
    protected $table            = 'tahun_akademik';
    protected $primaryKey       = 'id_tahun_akademik';
    protected $allowedFields    = ['tahun_akademik'];

    public function getTahunAkademik() {
        return $this->findAll();
    }

    public function simpan($data){
        return $this->save($data);
    }

    public function edit($id, $data){
        return $this->update($id, $data);
    }

    public function hapus($id){
        return $this->delete($id);
    }
}