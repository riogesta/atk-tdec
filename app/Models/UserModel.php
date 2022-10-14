<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    
    protected $table            = 'users';
    protected $primaryKey       = 'id_user';
    protected $allowedFields    = ['username','password','id_unit_prodi','role'];

    public function user($arg = ''){

        if (!empty($arg)) {
            return $this->db->query("SELECT * FROM users WHERE username = '$arg'");
        }

        return $this->db->query("
            SELECT * 
            FROM users
            LEFT JOIN unit_prodi ON users.id_unit_prodi = unit_prodi.id_unit_prodi;
        ");
    }

    public function query($sql) {
        return $this->db->query($sql);
    }

    public function unitProdi() {
        return $this->db->query("SELECT * FROM unit_prodi");
    }
}