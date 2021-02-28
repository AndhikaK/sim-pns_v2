<?php

namespace App\Controllers;

use App\Models\UserModel;

class Test extends BaseController
{
    public function index()
    {
        session()->setFlashData('success-delete', 'Hapus data berhasil');

        return view('layout/asset/notification');
    }

    public function template()
    {
        return view('layout/admin-template');
    }
}
