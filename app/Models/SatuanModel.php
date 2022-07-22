<?php

namespace App\Models;

use CodeIgniter\Model;

class SatuanModel extends Model
{
    protected $table            = 'satuan';
    protected $primaryKey       = 'id_satuan';
    protected $allowedFields    = ['satuan'];

    public function add($input){
        return $this->save($input);
    }
}