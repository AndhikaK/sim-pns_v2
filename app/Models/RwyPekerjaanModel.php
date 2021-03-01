<?php

namespace App\Models;

use CodeIgniter\Model;

class RwyPekerjaanModel extends Model
{
    protected $table = 'riwayat_pekerjaan';
    protected $primaryKey = 'id_riwayat_pekerjaan';
    protected $allowedFields = ['nip', 'no_sk', 'id_jabatan', 'id_satker', 'id_bagian', 'id_subbag', 'periode_mulai', 'periode_selesai'];
}
