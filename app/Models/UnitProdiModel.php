<?php

namespace App\Models;

use CodeIgniter\Model;

class UnitProdiModel extends Model
{
    protected $table            = 'unit_prodi';
    protected $primaryKey       = 'id_unit_prodi';
    protected $allowedFields    = ['unit_prodi'];
    
    public function getUnitProdi() {
        return $this->findAll();
    }
}