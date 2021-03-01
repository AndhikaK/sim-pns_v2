<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Detailpegawai extends BaseController
{
    public function index($nip)
    {
        $data = [
            'title' => 'Detail Pegawai',
            'navItem' => 2,
            'nip' => $nip
        ];

        return view('admin/detail_pegawai', $data);
    }
}
