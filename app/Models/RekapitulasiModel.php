<?php

namespace App\Models;

use CodeIgniter\Model;

class RekapitulasiModel extends Model
{
    public function query($sql) {
        return $this->db->query($sql);
    }
}