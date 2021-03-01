<?php

namespace App\Models;

use CodeIgniter\Model;

class RwyPendidikanModel extends Model
{
    protected $table = 'riwayat_pendidikan';
    protected $primaryKey = 'id_riwayat_pendidikan';
    protected $allowedFields = ['nip', 'jenjang'];
}
