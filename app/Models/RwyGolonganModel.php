<?php

namespace App\Models;

use CodeIgniter\Model;

class RwyGolonganModel extends Model
{
    protected $table = 'riwayat_golongan';
    protected $primaryKey = 'id_riwayat_golongan';
    protected $allowedFields = ['nip', 'no_sk', 'id_golongan', 'periode_mulai', 'periode_selesai'];
}
